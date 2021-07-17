<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\MPenggajian;
use App\Models\MPresensi;
use App\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (!$request->session()->has('login') && $request->session()->get('TIPE_AKUN') != 'ADMIN') {
                return redirect('/');
            }
            return $next($request);
        });
    }
    public function rekappresensi()
    {
        $tdy = date('Y-m');
        // $hariini = Helper::hari_ini();
        $id_pegawai = 'semua';
        $history = MPresensi::selectRaw("MONTH(TANGGAL) as bulan,YEAR(TANGGAL) as tahun")
            ->groupBy(DB::raw("YEAR(TANGGAL),MONTH(TANGGAL)"))->get();


        $data = pegawai::whereRaw("(presensi.TANGGAL like '%$tdy%' ) and pegawai.TIPE_AKUN='PEGAWAI'")
        ->leftjoin('presensi', 'pegawai.ID_PEGAWAI', 'presensi.ID_PEGAWAI')
        ->selectRaw('pegawai.NAMA_PEGAWAI, SUM(presensi.TOTAL_TUNJANGAN) as TOTAL_TUNJANGAN,
        COUNT(IF(presensi.STATUS_MASUK = "Hadir",1,NULL)) as Hadirmasuk,
        COUNT(IF(presensi.STATUS_KELUAR = "Hadir",1,NULL)) as Hadirkeluar,
        COUNT(IF(presensi.STATUS_MASUK = "Sakit",1,NULL)) as Sakitmasuk,
        COUNT(IF(presensi.STATUS_KELUAR = "Sakit",1,NULL)) as Sakitkeluar,
        COUNT(IF(presensi.STATUS_MASUK = "Izin",1,NULL)) as Izinmasuk,
        COUNT(IF(presensi.STATUS_KELUAR = "Izin",1,NULL)) as Izinkeluar,
        COUNT(IF(presensi.STATUS_MASUK = "Telat",1,NULL)) as Telatmasuk,
        COUNT(IF(presensi.STATUS_KELUAR = "Telat",1,NULL)) as Telatkeluar
        ')
        ->groupBy(DB::raw("pegawai.ID_PEGAWAI"))
        ->orderBy('pegawai.NAMA_PEGAWAI', 'ASC')->get();
        // return $data;
        $title = "Rekap Presensi Bulan Ini";
        return view('konten/admin/rekappresensi/presensi', compact('data', 'history', 'title', 'id_pegawai', 'tdy'));
    }
    public function rekapabsensiexcel($id)
    {
        $data = pegawai::whereRaw("(presensi.TANGGAL like '%$id%' or pegawai.ID_PEGAWAI IS NOT NULL) and pegawai.TIPE_AKUN='PEGAWAI'")
        ->leftjoin('presensi', 'pegawai.ID_PEGAWAI', 'presensi.ID_PEGAWAI')
        ->selectRaw('pegawai.NAMA_PEGAWAI, SUM(presensi.TOTAL_TUNJANGAN) as TOTAL_TUNJANGAN,
        COUNT(IF(presensi.STATUS_MASUK = "Hadir",1,NULL)) as Hadirmasuk,
        COUNT(IF(presensi.STATUS_KELUAR = "Hadir",1,NULL)) as Hadirkeluar,
        COUNT(IF(presensi.STATUS_MASUK = "Sakit",1,NULL)) as Sakitmasuk,
        COUNT(IF(presensi.STATUS_KELUAR = "Sakit",1,NULL)) as Sakitkeluar,
        COUNT(IF(presensi.STATUS_MASUK = "Izin",1,NULL)) as Izinmasuk,
        COUNT(IF(presensi.STATUS_KELUAR = "Izin",1,NULL)) as Izinkeluar,
        COUNT(IF(presensi.STATUS_MASUK = "Telat",1,NULL)) as Telatmasuk,
        COUNT(IF(presensi.STATUS_KELUAR = "Telat",1,NULL)) as Telatkeluar
        ')
        ->groupBy(DB::raw("pegawai.ID_PEGAWAI"))
        ->orderBy('pegawai.NAMA_PEGAWAI', 'ASC')->get();
        // return $data;
        $title = "Rekap Presensi Bulan ". Helper::bulantahun($id);
        return view('konten/admin/rekappresensi/excel_presensi', compact('data', 'title', 'id'));
    }
    
}
