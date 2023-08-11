<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function pageIndex()
    {
        return view('content.authentications.auth-login');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->is_verified) {
                    $isActive = Profile::where('user_id', $user->id)->where('status', 1)->first();

                    if ($isActive) {
                        return redirect('dashboard');
                    } else {
                        return redirect('login')->with('error', 'User status nonaktif, silahkan kontak admin terlebih dahulu');
                    }
                } else {
                    return redirect('login')->with('error', 'User belum verifikasi email');
                }
            } else {
                return redirect('login')->with('error', 'Email atau Password salah');
            }
        } catch (\Exception $e) {
            return redirect('login')->with('error', $e->getMessage());
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
