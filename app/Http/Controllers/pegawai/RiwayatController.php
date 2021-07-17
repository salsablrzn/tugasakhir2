<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\MPenggajian;
use App\Models\MPresensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (!$request->session()->has('login')) {
                return redirect('/');
            }
            return $next($request);
        });
    }
    public function presensi()
    {
        $tdy = date('Y-m');
        // $hariini = Helper::hari_ini();
        $id_pegawai = session()->get('ID_PEGAWAI');
        $history = MPresensi::where(['ID_PEGAWAI' => $id_pegawai])
            ->selectRaw("MONTH(TANGGAL) as bulan,YEAR(TANGGAL) as tahun")
            ->groupBy(DB::raw("YEAR(TANGGAL),MONTH(TANGGAL)"))->get();
        $data = MPresensi::whereRaw("ID_PEGAWAI='$id_pegawai' and TANGGAL like '%$tdy%'")->orderBy('TANGGAL', 'ASC')->get();
        // $harikerja = MHarikerja::where(['NAMA_HARI' => $hariini])->first();
        // return $data;
        $title = "Riwayat Presensi Bulan Ini";
        return view('konten/pegawai/presensi', compact('data', 'history', 'title', 'id_pegawai'));
    }
    public function penggajian()
    {
        $id_pegawai = session()->get('ID_PEGAWAI');
        $data = MPenggajian::where('ID_PEGAWAI',"$id_pegawai")->orderBy('CREATE_AT', 'ASC')->get();
        
        $title = "Riwayat Penggajian";
        // return $data;
        return view('konten/pegawai/penggajian', compact('data', 'title'));
    }

}
