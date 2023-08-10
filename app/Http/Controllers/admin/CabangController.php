<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $provinces = Province::all();
            $cities = City::all();
            $districts = District::all();
            $village = Village::all();
            $cabangs = DB::table('cabangs as c')
                ->join('indonesia_provinces as ip', 'c.provinsi_code', '=', 'ip.code')
                ->join('indonesia_cities as ic', 'c.kota_code', '=', 'ic.code')
                ->join('indonesia_districts as id', 'c.kecamatan_code', '=', 'id.code')
                ->join('indonesia_villages as iv', 'c.desa_code', '=', 'iv.code')
                ->select('c.*', 'ip.name as province', 'ic.name as city', 'id.name as district', 'iv.name as village')
                ->get();
            // dd($cabangs);
            return view('content.web-pages.cabang.index', compact('cabangs', 'provinces', 'cities', 'districts', 'village'));
        } catch (\Exception $e) {
            Session::flash('error', 'Error please inform administrator immediately: ' . $e->getMessage());
            return view('content.web-pages.cabang.index');
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
                'provinsi_code' => ['required'],
                'kota_code' => ['required'],
                'kecamatan_code' => ['required'],
                'desa_code' => ['required'],
                'nama' => ['required'],
                'alamat' => ['required'],
                'foto' => ['required', 'max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $imageEXT   = $request->file('foto')->getClientOriginalName();
            $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
            $EXT        = $request->file('foto')->getClientOriginalExtension();
            $fileimage  = $filename . '_' . time() . '.' . $EXT;

            $path       = $request->file('foto')->move(public_path('file/cabang/foto'), $fileimage);

            $cabang = new Cabang;
            $cabang->provinsi_code = $request->provinsi_code;
            $cabang->kota_code = $request->kota_code;
            $cabang->kecamatan_code = $request->kecamatan_code;
            $cabang->desa_code = $request->desa_code;
            $cabang->nama = $request->nama;
            $cabang->alamat = $request->alamat;
            $cabang->foto = $fileimage;
            $cabang->save();

            Session::flash('success', 'Berhasil Tambah Data Cabang');
            return redirect('cabang');
        } catch (\Exception $e) {
            Session::flash('error', 'Error please inform administrator immediately: ' . $e->getMessage());
            return redirect('cabang');
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

            Session::flash('success', 'Berhasil Update Data Cabang');
            return redirect('cabang');
        } catch (\Exception $e) {
            Session::flash('error', 'Error please inform administrator immediately: ' . $e->getMessage());
            return redirect('cabang');
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
            $cabang = Cabang::findOrfail($id);
            if ($cabang->foto && File::exists(public_path('file/cabang/foto/' . $cabang->foto))) {
                File::delete(public_path('file/cabang/foto/' . $cabang->foto));
            }
            $cabang->delete();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect('cabang');
        } catch (\Exception $e) {
            Session::flash('error', 'Error please inform administrator immediately: ' . $e->getMessage());
            return redirect('cabang');
        }
    }
}
