<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
            $users = DB::table('users')
                ->leftJoin('profiles as p', 'p.user_id', '=', 'users.id')
                ->leftJoin('cabangs as c', 'c.id', '=', 'p.cabang_id')
                ->select('users.*', 'p.cabang_id', 'p.nama', 'p.level', 'p.status', 'p.alamat', 'p.umur', 'p.pendidikan', 'p.jenis_kelamin', 'p.telp', 'p.mariage', 'p.foto', 'c.nama as nama_cabang')
                ->get();
            $cabangs = Cabang::all();
            return view('content.web-pages.user.index', compact('users', 'cabangs'));
        } catch (\Exception $e) {
            Session::flash('error', 'gagal memuat halaman user' . $e->getMessage());
            return back();
            // return view('content.web-pages.user.index');
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
                'umur'          => 'required',
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
            $user->remember_token = Str::random(40);
            $user->save();

            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->cabang_id = $request->cabang_id;
            $profile->nama = $request->nama;
            $profile->level = $request->level;
            $profile->status = $request->status;
            $profile->alamat = $request->alamat;
            $profile->umur = $request->umur;
            $profile->pendidikan = $request->pendidikan;
            $profile->jenis_kelamin = $request->jenis_kelamin;
            $profile->telp = $request->telp;
            $profile->mariage = $request->mariage;
            $profile->foto = $fileimage;
            $profile->save();

            Session::flash('success', 'Sukses !! berhasil menambahkan user');
            return redirect('user');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
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
        try {
            $request->validate([
                'email'         => 'required|email',
                'cabang_id'     => 'required',
                'nama'          => 'required',
                'level'         => 'required',
                'status'        => 'required',
                'alamat'        => 'required',
                'umur'          => 'required',
                'pendidikan'    => 'required',
                'jenis_kelamin' => 'required',
                'telp'          => 'required',
                'mariage'       => 'required',
            ]);

            $user = User::findOrFail($id);
            $profile = Profile::where('user_id', $id)->first();

            if ($request->hasFile('foto')) {
                $oldPhoto = $profile->foto;

                if ($oldPhoto && File::exists(public_path('file/profile/foto/' . $oldPhoto))) {
                    File::delete(public_path('file/profile/foto/' . $oldPhoto));
                }

                $imageEXT   = $request->file('foto')->getClientOriginalName();
                $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT        = $request->file('foto')->getClientOriginalExtension();
                $fileimage  = $filename . '_' . time() . '.' . $EXT;
                $path       = $request->file('foto')->move(public_path('file/profile/foto'), $fileimage);
                $profile->foto = $fileimage;
            }
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            $user->email = $request->email;
            $user->save();

            $profile->user_id = $user->id;
            $profile->cabang_id = $request->cabang_id;
            $profile->nama = $request->nama;
            $profile->level = $request->level;
            $profile->status = $request->status;
            $profile->alamat = $request->alamat;
            $profile->umur = $request->umur;
            $profile->pendidikan = $request->pendidikan;
            $profile->jenis_kelamin = $request->jenis_kelamin;
            $profile->telp = $request->telp;
            $profile->mariage = $request->mariage;
            $profile->save();

            Session::flash('success', 'Sukses !! berhasil update user');
            return redirect('user');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $profile = Profile::where('user_id', $id)->first();
            if ($profile->foto && File::exists(public_path('file/profile/foto/' . $profile->foto))) {
                File::delete(public_path('file/profile/foto/' . $profile->foto));
            }
            $profile->delete();
            $user->delete();

            Session::flash('success', 'Sukses menghapus account');
            return redirect('user');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('user');
        }
    }
}
