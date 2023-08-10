<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
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
        // dd($request->all());
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $credential = $request->only('email', 'password');
            if (Auth::attempt($credential)) {
                $user = Auth::user();
                if ($user->is_verified) {
                    return redirect('dashboard');
                } else {
                    Session::flash('error', 'User belum verifikasi email');
                    return redirect('login');
                }
            } else {
                Session::flash('error', 'Email atau Password salah');
                return redirect('login');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
