<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function cetak_pdf()
    {
        try {
            $user = auth()->user();
            $detail = DB::table('spareparts as s')
                ->join('machines as m', 'm.id', '=', 's.machine_id')
                ->join('cabangs as c', 'c.id', '=', 's.cabang_id')
                ->select('s.*', 'c.nama as nama_cabang', 'c.id as cabang_id', 'm.nama as nama_mesin', 'm.id as machine_id')
                ->where('s.id', $id)
                ->first();
            $riwayatsQuery = DB::table('reports')
                ->join('users', 'users.id', '=', 'reports.user_id')
                ->join('profiles', 'profiles.user_id', '=', 'users.id')
                ->select('reports.*', 'profiles.nama as nama_user');

            if ($user->profile->level != 1) {
                $riwayatsQuery->where('reports.cabang_id', $user->profile->cabang_id);
            }
            $riwayatsQuery->where('reports.spareparts_id', $id);
            $riwayats = $riwayatsQuery->get();
            // return view('content.web-pages.sparepart.report.index', compact('detail', 'riwayats'));
            $pdf = Pdf::loadview('content.web-pages.sparepart.report.pdf',['detail'=>$detail,'riwayats'=>$riwayats]);
            return $pdf->download('laporan-kerusakan.pdf');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function index($id)
    {
        try {
            $user = auth()->user();
            $detail = DB::table('spareparts as s')
                ->join('machines as m', 'm.id', '=', 's.machine_id')
                ->join('cabangs as c', 'c.id', '=', 's.cabang_id')
                ->select('s.*', 'c.nama as nama_cabang', 'c.id as cabang_id', 'm.nama as nama_mesin', 'm.id as machine_id')
                ->where('s.id', $id)
                ->first();
            $riwayatsQuery = DB::table('reports')
                ->join('users', 'users.id', '=', 'reports.user_id')
                ->join('profiles', 'profiles.user_id', '=', 'users.id')
                ->select('reports.*', 'profiles.nama as nama_user');

            if ($user->profile->level != 1) {
                $riwayatsQuery->where('reports.cabang_id', $user->profile->cabang_id);
            }
            $riwayatsQuery->where('reports.spareparts_id', $id);
            $riwayats = $riwayatsQuery->get();
            return view('content.web-pages.sparepart.report.index', compact('detail', 'riwayats'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'spareparts_id' => 'required',
                'judul'         => 'required',
                'desc'          => 'required',
                'foto'          => ['required', 'max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $imageEXT   = $request->file('foto')->getClientOriginalName();
            $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
            $EXT        = $request->file('foto')->getClientOriginalExtension();
            $fileimage  = $filename . '_' . time() . '.' . $EXT;
            $path       = $request->file('foto')->move(public_path('file/report/foto'), $fileimage);

            $sparepart = Sparepart::findOrFail($request->spareparts_id);
            $user      = auth()->user();

            $report                 = new Report();
            $report->user_id        = $user->id;
            $report->cabang_id      = $sparepart->cabang_id;
            $report->machine_id     = $sparepart->machine_id;
            $report->spareparts_id  = $request->spareparts_id;
            $report->judul          = $request->judul;
            $report->desc           = $request->desc;
            $report->foto           = $fileimage;
            $report->save();

            return back()->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id'            => 'required',
                'user_id'       => 'required',
                'cabang_id'     => 'required',
                'machine_id'    => 'required',
                'spareparts_id' => 'required',
                'judul'         => 'required',
                'desc'          => 'required',
                'foto'          => ['max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $report = Report::findOrFail($request->id);

            if ($request->hasFile('foto')) {
                $oldFile = $report->foto;
                if ($oldFile && File::exists(public_path('file/report/foto/' . $oldFile))) {
                    File::delete(public_path('file/report/foto/' . $oldFile));
                }

                $imageEXT   = $request->file('foto')->getClientOriginalName();
                $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT        = $request->file('foto')->getClientOriginalExtension();
                $fileimage  = $filename . '_' . time() . '.' . $EXT;
                $path       = $request->file('foto')->move(public_path('file/report/foto'), $fileimage);
                $report->foto = $fileimage;
            }

            $report->user_id        = $request->user_id;
            $report->cabang_id      = $request->cabang_id;
            $report->machine_id     = $request->machine_id;
            $report->spareparts_id  = $request->spareparts_id;
            $report->judul          = $request->judul;
            $report->desc           = $request->desc;
            $report->save();

            return back()->with('success', 'Berhasil update data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $report = Report::findOrFail($id);
            if ($report->foto && File::exists(public_path('file/report/foto/' . $report->foto))) {
                File::delete(public_path('file/report/foto/' . $report->foto));
            }
            $report->delete();
            return back()->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return back()->with('error', 'Error' . $e->getMessage());
        }
    }
}
