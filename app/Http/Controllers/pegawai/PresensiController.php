<?php

namespace App\Http\Controllers\pegawai;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\MHarikerja;
use App\Models\MPresensi;
use App\pegawai;
use App\presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
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
    public function hariini()
    {
        $tdy = date('Y-m-d');
        $hariini = Helper::hari_ini();
        $id_pegawai = session()->get('ID_PEGAWAI');
        $data = MPresensi::where(['ID_PEGAWAI' => $id_pegawai, 'TANGGAL' => $tdy])->first();
        $harikerja = MHarikerja::where(['NAMA_HARI' => $hariini])->first();
        // return $harikerja;
        return view('konten/pegawai/hariini',compact('data','harikerja'));
    }

    public function formpresensi()
    {
        $tdy = date('Y-m-d');
        $hariini = Helper::hari_ini();
        $tipe = "Absensi Masuk";
        $id_pegawai = session()->get('ID_PEGAWAI');
        // return $id_pegawai;
        $data = MPresensi::where(['ID_PEGAWAI' => $id_pegawai, 'TANGGAL' => $tdy])->first();
        $harikerja = MHarikerja::where(['NAMA_HARI' => $hariini])->first();
        if (!$data) {
           if (Helper::comparejam($harikerja->MASUK_AWAL, $harikerja->MASUK_AKHIR)) {
                return view('konten/pegawai/formpresensi',compact('tipe', 'data', 'harikerja'));
           } else {
                return redirect('pegawai/presensi/hariini')->with('status', ['danger', 'Informasi', !$data ? 'Belum Waktunya Presensi Masuk':'Anda Telah Melakukan Presensi Masuk']);
           }
           
        }else{
            if (Helper::comparejam($harikerja->KELUAR_AWAL, $harikerja->KELUAR_AKHIR) &&  $data->STATUS_KELUAR == '') {
                $tipe = "Absensi Keluar";
                return view('konten/pegawai/formpresensi', compact('tipe', 'data', 'harikerja'));

            } else {
                return redirect('pegawai/presensi/hariini')->with('status', ['danger','Informasi', $data->STATUS_KELUAR == '' ? 'Belum Waktunya Presensi Keluar' :'Anda Telah Melakukan Presensi Keluar']);
            }
        }
    }
    public function savepresensi(Request $request)
    {
        $tdy = date('Y-m-d');
        $hariini = Helper::hari_ini();
        $tipe = "Absensi Masuk";
        $id_pegawai = session()->get('ID_PEGAWAI');
        $data = MPresensi::where(['ID_PEGAWAI' => $id_pegawai, 'TANGGAL' => $tdy])->first();
        $harikerja = MHarikerja::where(['NAMA_HARI' => $hariini])->first();
        if (!$data) {
           if (Helper::comparejam($harikerja->MASUK_AWAL, $harikerja->MASUK_AKHIR)) {
               $arr = [
                    'ID_PEGAWAI' => $id_pegawai,
                    'TANGGAL' => $tdy,
                    'JAM_MASUK' => DATE('Y-m-d H:i:s'),
                    // 'JAM_KELUAR' => '0000-00-00 00:00:00',
                    'STATUS_MASUK' => $request->status,
                    'STATUS_KELUAR' => '',
                    'FOTO_KELUAR' => '',
                    'KETERANGAN_KELUAR' => '',
                    'TOTAL_TUNJANGAN' => 0,
                    'FOTO_MASUK' => $request->foto,
                    'KETERANGAN_MASUK' => $request->keterangan,
               ];
            //    return $arr;
               MPresensi::create($arr);
                return redirect('pegawai/presensi/hariini')->with('status', ['success', 'Informasi', 'Berhasil Membuat Presensi Masuk']);

           } else {
                return redirect('pegawai/presensi/hariini')->with('status', ['danger', 'Informasi', 'Belum Waktunya Presensi Masuk']);
           }
           
        }else{
            if (Helper::comparejam($harikerja->KELUAR_AWAL, $harikerja->KELUAR_AKHIR)) {
                $pg = pegawai::where(['ID_PEGAWAI' => $id_pegawai])->first();
                $ttltunjangan = $pg->TUNJANGAN;
                if ($data->STATUS_MASUK == '' || $data->STATUS_MASUK == 'Telat') {
                    $ttltunjangan = 0;
                }
                $arr = [
                    'JAM_KELUAR'        => DATE('Y-m-d H:i:s'),
                    'STATUS_KELUAR'     => $request->status,
                    'TOTAL_TUNJANGAN'   => $ttltunjangan,
                    'FOTO_KELUAR'       => $request->foto,
                    'KETERANGAN_KELUAR' => $request->keterangan,
                ];
                //    return $arr;
                MPresensi::where(['ID_DAFTAR_HADIR' => $data-> ID_DAFTAR_HADIR])->update($arr);
                return redirect('pegawai/presensi/hariini')->with('status', ['success', 'Informasi', 'Berhasil Membuat Presensi Keluar']);

            } else {
                return redirect('pegawai/presensi/hariini')->with('status', ['danger','Informasi', 'Belum Waktunya Presensi Keluar']);
            }
        }
    }
}
