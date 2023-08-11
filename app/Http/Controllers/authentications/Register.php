<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class Register extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-register');
    }
    public function register(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ]);
            
            $cekEmail = User::where('email',$request->email)->first();
            if ($cekEmail) {
                Session::flash('error','Email sudah terdaftar sebelumnya');
                return redirect('register');
            }

            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->verification_token = Str::random(40);
            $user->api_token = now()->addMinute(30);
            $user->remember_token = Str::random(40);
            $user->save();
            $this->sendVerificationEmail($user);

            Session::flash('success', 'Register Berhasil. Silahkan cek inbox email untuk mengaktifkan akun');
            return redirect('register');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('register');
        }
    }

    private function sendVerificationEmail(User $user)
    {
        $verificationLink = route('verify-email', ['token' => $user->verification_token]);

        Mail::send('emails.verify', ['user' => $user, 'verificationLink' => $verificationLink], function ($message) use ($user) {
            $message->from('reporting_machine@yogabayuap.com', 'Administrator Report');
            $message->to($user->email, 'Admin');
            $message->subject('Verifikasi Email');
        });
    }

    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            Session::flash('error', 'token tidak valid');
            return redirect('login');
        }

        if ($user->api_token < now()) {
            Session::flash('error','Token sudah kadaluwarsa');
            return redirect('login');
        }

        // Mark the user as verified
        $user->is_verified = true;
        $user->verification_token = null;
        $user->api_token = null;
        $user->save();

        Session::flash('success', 'Berhasil ! selamat akun anda sudah aktif');
        return redirect('login');
    }

    public function forgot()
    {
        return view('content.authentications.auth-forgot-password');
    }

    public function forgotaction(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);
            
            $cekEmail = User::where('email',$request->email)->first();
            if (!$cekEmail) {
                Session::flash('error','Email tidak terdaftar');
                return redirect('forgot');
            }
            
            $cekEmail->api_token = Str::random(40);
            $cekEmail->save();

            $this->sendForgotEmail($cekEmail);

            Session::flash('success', 'Link reset berhasil dibuat, silahkan cek inbox/spam di email anda');
            return redirect('forgot');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('forgot');
        }
    }

    private function sendForgotEmail(User $user)
    {
        $verificationLink = route('forgot-email', ['token' => $user->remember_token]);

        Mail::send('emails.forgot', ['user' => $user, 'verificationLink' => $verificationLink], function ($message) use ($user) {
            $message->from('reporting_machine@yogabayuap.com', 'Administrator Report');
            $message->to($user->email, 'Admin');
            $message->subject('Forgot Email');
        });
    }

    public function verifyForgot($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            Session::flash('error', 'token tidak valid');
            return redirect('login');
        }

        if ($user->api_token < now()) {
            Session::flash('error','Token sudah kadaluwarsa');
            return redirect('login');
        }

        // Mark the user as verified
        $user->remember_token = Str::random(40);
        $user->api_token = null;
        $user->password = Hash::make('12345678');
        $user->save();

        Session::flash('success', 'Berhasil ! selamat reset password berhasil');
        return redirect('login');
    }
}
