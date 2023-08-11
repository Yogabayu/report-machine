<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('content.web-pages.user.index');
        } catch (\Exception $e) {
            Session::flash('error',$e->getMessage());
            return view('content.web-pages.user.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email'         => 'required|email|unique:users',
                'password'      => 'required|min:8',
                'cabang_id'     => 'required',
                'nama'          => 'required',
                'level'         => 'required',
                'status'        => 'required',
                'alamat'        => 'required',
                'umur'          => 'required|number',
                'pendidikan'    => 'required',
                'jenis_kelamin' => 'required',
                'telp'          => 'required',
                'mariage'       => 'required',
                'foto'          => ['required', 'max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $imageEXT   = $request->file('foto')->getClientOriginalName();
            $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
            $EXT        = $request->file('foto')->getClientOriginalExtension();
            $fileimage  = $filename . '_' . time() . '.' . $EXT;
            $path       = $request->file('foto')->move(public_path('file/profile/foto'), $fileimage);

            $user   = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->is_verified = 1;
            $user->api_token = now()->addMinute(30);
            $user->remember_token = Str::random(40);
            $user->save();

        } catch (\Exception $e) {
            Session::flash('error',$e->getMessage());
            return redirect('user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
