<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = Site::where('id',1)->first();
        return view('welcome',compact('data'));
    }
}
