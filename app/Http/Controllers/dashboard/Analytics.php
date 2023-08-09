<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Analytics extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth()->user();
            $profile = Profile::where('user_id',$user->id)->first();
            return view('content.dashboard.dashboards-analytics',compact('user','profile'));
        } else {
            Session::flash('error', 'You are not login yet');
            return redirect('login');
        }
    }
}
