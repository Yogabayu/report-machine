<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
// Use Alert;


class MachineController extends Controller
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
            $machinesQuery = DB::table('machines as m')
                ->join('cabangs as c', 'm.cabang_id', '=', 'c.id')
                ->select('m.*', 'c.nama as nama_cabang','c.id as cabang_id');

            if ($user->profile->level != 1) {
                $machinesQuery = $machinesQuery->where('m.cabang_id', $user->profile->cabang_id);
            }

            $machines =  $machinesQuery->get();
            $cabangs = Cabang::all();
            return view('content.web-pages.machine.index', compact('machines', 'cabangs'));
        } catch (\Exception $e) {
            return back()->with('error', 'gagal memuat halaman user' . $e->getMessage());
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
                'cabang_id'         => 'required',
                'nama'      => 'required',
                'foto'          => ['required', 'max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $imageEXT   = $request->file('foto')->getClientOriginalName();
            $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
            $EXT        = $request->file('foto')->getClientOriginalExtension();
            $fileimage  = $filename . '_' . time() . '.' . $EXT;
            $path       = $request->file('foto')->move(public_path('file/machine/foto'), $fileimage);

            $machine   = new Machine();
            $machine->cabang_id = $request->cabang_id;
            $machine->nama = $request->nama;
            $machine->photo = $fileimage;
            $machine->save();

            return redirect('machine')->with('success','Sukses !! berhasil menambah mesin');
        } catch (\Exception $e) {
            return redirect('machine')->with('error', $e->getMessage());;
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
                'cabang_id'         => 'required',
                'nama'      => 'required',
                'foto'          => ['max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $machine = Machine::findOrFail($id);
            if ($request->hasFile('foto')) {
                $imageEXT   = $request->file('foto')->getClientOriginalName();
                $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT        = $request->file('foto')->getClientOriginalExtension();
                $fileimage  = $filename . '_' . time() . '.' . $EXT;
                $path       = $request->file('foto')->move(public_path('file/machine/foto'), $fileimage);

                $machine->photo = $fileimage;
            }

            $machine->cabang_id = $request->cabang_id;
            $machine->nama = $request->nama;
            $machine->save();

            return redirect('machine')->with('success', 'Sukses !! berhasil Update mesin');
        } catch (\Exception $e) {
            return redirect('machine')->with('error', $e->getMessage());
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
            $machine = Machine::findOrfail($id);
            if ($machine->photo && File::exists(public_path('file/machine/foto/' . $machine->photo))) {
                File::delete(public_path('file/machine/foto/' . $machine->photo));
            }
            $machine->delete();
            return redirect('machine')->with('success', 'Berhasil menghapus mesin');
        } catch (\Exception $e) {
            return redirect('machine')->with('error', 'Error please inform administrator immediately: ' . $e->getMessage());
        }
    }
}
