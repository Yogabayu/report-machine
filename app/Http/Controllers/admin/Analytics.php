<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Machine;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Analytics extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth()->user();
            $profile = Profile::where('user_id',$user->id)->first();
            $totalUser = User::count();
            $totalCabang = Cabang::count();
            $totalMachine = Machine::count();
            return view('content.dashboard.dashboards-analytics',compact('user','profile','totalUser','totalCabang','totalMachine'));
        } else {
            Session::flash('error', 'You are not login yet');
            return redirect('login');
        }
    }
}
