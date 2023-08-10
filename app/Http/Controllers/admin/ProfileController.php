<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = auth()->user();
        $user = User::where('id',$idUser->id)->first();

        $cabang = Cabang::all();
        $profile = Profile::where('id',$user->id)->first();
        // dd($profile->cabang_id);
        return view('content.web-pages.profile.settings',compact('user','cabang','profile'));
    }

    public function authUpdate(Request $request)
    {
        try {
            $request->validate([
                'id'=>['required'],
                'email' => ['required'],
                'password' => ['required'],
            ]);

            $cekEmail = User::where('email',$request->email)->first();
            if ($cekEmail) {
                Session::flash('error','Email sudah terdaftar sebelumnya');
                return redirect('profile');
            }

            $user = User::findOrFail($request->id);
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            Session::flash('success', 'Update Autentikasi berhasil');
            return redirect('profile');
        } catch (\Exception $e) {
            Session::flash('error', 'Error please inform administrator immediately: ' . $e->getMessage());
            return redirect('profile');
        }
    }

    public function profileUpdate(Request $request)
    {
        dd($request->all());
        try {
            $request->validate([
                'provinsi_code' => ['required'],
                'kota_code' => ['required'],
                'kecamatan_code' => ['required'],
                'desa_code' => ['required'],
                'nama' => ['required'],
                'alamat' => ['required'],
                'foto' => ['max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $cabang = Cabang::findOrFail($id);

            if ($request->hasFile('foto')) {
                $oldPhoto = $cabang->foto;

                if ($oldPhoto && File::exists(public_path('file/cabang/foto/' . $oldPhoto))) {
                    File::delete(public_path('file/cabang/foto/' . $oldPhoto));
                }

                $imageEXT   = $request->file('foto')->getClientOriginalName();
                $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT        = $request->file('foto')->getClientOriginalExtension();
                $fileimage  = $filename . '_' . time() . '.' . $EXT;

                $path       = $request->file('foto')->move(public_path('file/cabang/foto'), $fileimage);
                $cabang->foto = $fileimage;
            }

            $cabang->provinsi_code = $request->provinsi_code;
            $cabang->kota_code = $request->kota_code;
            $cabang->kecamatan_code = $request->kecamatan_code;
            $cabang->desa_code = $request->desa_code;
            $cabang->nama = $request->nama;
            $cabang->alamat = $request->alamat;
            $cabang->save();

            Session::flash('success', 'Berhasil Update Data Profile');
            return redirect('profile');
        } catch (\Exception $e) {
            Session::flash('error', 'Error please inform administrator immediately: ' . $e->getMessage());
            return redirect('profile');
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
        //
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

    public function delete()
    {
        try {
            $user = auth()->user();
            $user->delete();

            Session::flash('success', 'Sukses menghapus account');
            return redirect('login');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return back();
        }
    }
}
