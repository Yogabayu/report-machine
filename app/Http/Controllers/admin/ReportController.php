<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index($id)
    {
        try {
            $user = auth()->user();
            $detail = DB::table('spareparts as s')
                    ->join('machines as m', 'm.id', '=', 's.machine_id')
                    ->join('cabangs as c', 'c.id', '=', 's.cabang_id')
                    ->select('s.*', 'c.nama as nama_cabang', 'c.id as cabang_id', 'm.nama as nama_mesin', 'm.id as machine_id')
                    ->where('s.id',$id)
                    ->first();
            $riwayatsQuery = DB::table('reports')
                    ->join('users','users.id','=','reports.user_id')
                    ->join('profiles','profiles.user_id','=','users.id')
                    ->select('reports.*','profiles.nama as nama_user');

            if ($user->profile->level!=1) {
                $riwayatsQuery->where('reports.cabang_id',$user->profile->cabang_id);
            }
            $riwayats = $riwayatsQuery->get();
            // dd($riwayats);
            return view('content.web-pages.sparepart.report.index',compact('detail','riwayats'));
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }
}
