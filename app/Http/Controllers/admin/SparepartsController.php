<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Machine;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SparepartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = auth()->user();
            $sparepartQuery = DB::table('spareparts as s')
                ->join('machines as m', 'm.id', '=', 's.machine_id')
                ->join('cabangs as c', 'c.id', '=', 's.cabang_id')
                ->select('s.*', 'c.nama as nama_cabang', 'c.id as cabang_id', 'm.nama as nama_mesin', 'm.id as machine_id');

            if ($user->profile->level != 1) {
                $sparepartQuery = $sparepartQuery->where('m.cabang_id', $user->profile->cabang_id);
            }

            $spareparts =  $sparepartQuery->get();
            $cabangs = Cabang::all();
            $machines = Machine::all();

            return view('content.web-pages.sparepart.index', compact('spareparts', 'machines', 'cabangs'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
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
                'machine_id'        => 'required',
                'cabang_id'         => 'required',
                'nama'              => 'required',
                'photo'             => 'required'
            ]);

            $imageEXT   = $request->file('photo')->getClientOriginalName();
            $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
            $EXT        = $request->file('photo')->getClientOriginalExtension();
            $fileimage  = $filename . '_' . time() . '.' . $EXT;
            $path       = $request->file('photo')->move(public_path('file/sparepart/foto'), $fileimage);

            $sparepart = new Sparepart();
            $sparepart->machine_id = $request->machine_id;
            $sparepart->cabang_id = $request->cabang_id;
            $sparepart->nama = $request->nama;
            $sparepart->harga = $request->harga;
            $sparepart->photo = $fileimage;
            $sparepart->save();

            return redirect('sparepart')->with('success', 'Sukses !! berhasil menambahkan sparepart');
        } catch (\Exception $e) {
            return redirect('sparepart')->with('error', $e->getMessage());
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
                'machine_id'        => 'required',
                'cabang_id'         => 'required',
                'nama'              => 'required',
                'photo'             => ['max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $sparepart = Sparepart::findOrFail($id);
            if ($request->hasFile('photo')) {
                $oldImage = $sparepart->photo;
                if ($oldImage && File::exists(public_path('file/sparepart/foto/' . $oldImage))) {
                    File::delete(public_path('file/sparepart/foto/' . $oldImage));
                }

                $imageEXT   = $request->file('photo')->getClientOriginalName();
                $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT        = $request->file('photo')->getClientOriginalExtension();
                $fileimage  = $filename . '_' . time() . '.' . $EXT;
                $path       = $request->file('photo')->move(public_path('file/sparepart/foto'), $fileimage);

                $sparepart->photo = $fileimage;
            }
            if ($request->harga) {
                $sparepart->harga = $request->harga;
            }

            $sparepart->machine_id = $request->machine_id;
            $sparepart->cabang_id = $request->cabang_id;
            $sparepart->nama = $request->nama;
            $sparepart->save();

            return redirect('sparepart')->with('success', 'Sukses !! berhasil update sparepart');
        } catch (\Exception $e) {
            return redirect('sparepart')->with('error', $e->getMessage());
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
            $sparepart = Sparepart::findOrFail($id);
            if ($sparepart->photo && File::exists(public_path('file/sparepart/foto/' . $sparepart->photo))) {
                File::delete(public_path('file/sparepart/foto/' . $sparepart->photo));
            }
            $sparepart->delete();
            return redirect('sparepart')->with('success', 'Berhasil menghapus sparepart');
        } catch (\Exception $e) {
            return redirect('sparepart')->with('error','Error'.$e->getMessage());
        }
    }
}
