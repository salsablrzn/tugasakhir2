<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\MHarikerja;
use App\Models\MPenggajian;
use App\Models\MPresensi;
use App\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getriwayatpresensi(Request $request)
    {

        $tdy = $request->bulan;
        $wer = "";
        $id_pegawai = $request->id_pegawai;
        // $title ="Presensi Semua"
        if ($id_pegawai != "semua") {
            $wer = "presensi.ID_PEGAWAI='$id_pegawai' and ";
        }
        $data = MPresensi::whereRaw($wer . " presensi.TANGGAL like '%$tdy%'")
            ->leftjoin('pegawai as b', 'presensi.ID_PEGAWAI', 'b.ID_PEGAWAI')
            ->select('presensi.*', 'b.NAMA_PEGAWAI')
            ->orderBy('TANGGAL', 'ASC')->get();
        return response()->json(['data' => $data, 'title' => "Riwayat Presensi Pada Bulan " . Helper::bulantahun($tdy)], 200);
    }
    public function getrekappresensi(Request $request)
    {

        $tdy = $request->bulan;

        $data = pegawai::whereRaw("(presensi.TANGGAL like '%$tdy%') and pegawai.TIPE_AKUN='PEGAWAI'")
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
        return response()->json(['data' => $data,'tdy'=> $tdy, 'title' => "Riwayat Presensi Pada Bulan " . Helper::bulantahun($tdy)], 200);
    }
    public function getdetailgaji(Request $request)
    {

        $id_pegawai = $request->id_pegawai;
        $tdy = date('Y-m');

        $data = MPresensi::whereRaw("presensi.ID_PEGAWAI='$id_pegawai' and presensi.TANGGAL like '%$tdy%'")
        ->selectRaw('SUM(presensi.TOTAL_TUNJANGAN) as TOTAL_TUNJANGAN,
        COUNT(IF(STATUS_MASUK = "Hadir",1,NULL)) as Hadirmasuk,
        COUNT(IF(STATUS_KELUAR = "Hadir",1,NULL)) as Hadirkeluar,
        COUNT(IF(STATUS_MASUK = "Sakit",1,NULL)) as Sakitmasuk,
        COUNT(IF(STATUS_KELUAR = "Sakit",1,NULL)) as Sakitkeluar,
        COUNT(IF(STATUS_MASUK = "Izin",1,NULL)) as Izinmasuk,
        COUNT(IF(STATUS_KELUAR = "Izin",1,NULL)) as Izinkeluar,
        COUNT(IF(STATUS_MASUK = "Telat",1,NULL)) as Telatmasuk,
        COUNT(IF(STATUS_KELUAR = "Telat",1,NULL)) as Telatkeluar
        ')
        ->groupBy(DB::raw("presensi.ID_PEGAWAI"))
        ->first();
        $pegawai = pegawai::where('ID_PEGAWAI',$id_pegawai)->first();
        return response()->json(['data' => $data, 'pegawai'=> $pegawai], 200);
    }
    public function getgaji(Request $request)
    {
        $tdy = $request->bulan;
        $tipe = $request->tipe;

        $data = MPenggajian::whereRaw(" penggajian.BULAN_GAJIAN like '%$tdy%'")
        ->leftjoin('pegawai as b', 'penggajian.ID_PEGAWAI', 'b.ID_PEGAWAI')
        ->selectRaw('b.NAMA_PEGAWAI, penggajian.*, b.NIP')
        ->orderBy('penggajian.CREATE_AT', 'ASC')->get();
        // return $history;
        $arrtipe = ['keseluruhan' => 'Gaji Keseluruhan', 'utama' => 'Gaji Utama', 'tunjangan' => 'Tunjangan'];
        $title = "Rekap " . $arrtipe[$tipe] . " Bulan ". Helper::bulantahun($tdy);
        return response()->json(['data' => $data, 'title' => $title], 200);
    }

    public function updatetoken(Request $request)
    {
        $newtoken = $request->newtoken;
        $id_user = $request->id_user;

        pegawai::where('ID_PEGAWAI', $id_user)->update(['TOKEN_NOTIF' => $newtoken]);

        return response()->json(['pesan' => 'Oke'], 200);
    }
    public function notifsatumenit(Request $request)
    {
        $tdy = date('H:i');
        $tgl = date('Y-m-d');
        $hariini = Helper::hari_ini();
        $timenow = date('Y-m-d H:i');
        $nextlimemenit = date('H:i', strtotime('+5 minutes', strtotime($timenow . ':00')));

        $harikerja = MHarikerja::where(['NAMA_HARI' => $hariini])->first();
        if ($harikerja->STATUS_KERJA) {

            $cekmasuk = MHarikerja::whereRaw("NAMA_HARI = '$hariini' and MASUK_AWAL like '%$nextlimemenit%'")->first();
            if ($cekmasuk) {
                $getpegawai = pegawai::whereRaw("TIPE_AKUN='PEGAWAI' and TOKEN_NOTIF!=''")->get();
                $in = 0;
                $tokens = [];
                foreach ($getpegawai as $ke) {
                    $tokens[$in] = $ke->TOKEN_NOTIF;
                    $in++;
                }
                Helper::send_notif($tokens, "Pengingat Absen Masuk", "5 Menit lagi saatnya absen masuk dari pukul " . $cekmasuk->MASUK_AWAL . '-' . $cekmasuk->MASUK_AKHIR, url('pegawai/presensi/hariini'));
            }
            $cekkeluar = MHarikerja::whereRaw("NAMA_HARI = '$hariini' and KELUAR_AWAL like '%$nextlimemenit%'")->first();
            if ($cekkeluar) {
                $getpegawai = pegawai::whereRaw("TIPE_AKUN='PEGAWAI' and TOKEN_NOTIF!=''")->get();
                $in = 0;
                $tokens = [];
                foreach ($getpegawai as $ke) {
                    $tokens[$in] = $ke->TOKEN_NOTIF;
                    $in++;
                }
                Helper::send_notif($tokens, "Pengingat Absen Keluar", "5 Menit lagi saatnya absen keluar dari pukul " . $cekkeluar->KELUAR_AWAL . '-' . $cekkeluar->KELUAR_AKHIR, url('pegawai/presensi/hariini'));
            }
            $cektelatmasuk = MHarikerja::whereRaw("NAMA_HARI = '$hariini' and MASUK_AKHIR like '%$tdy%'")->first();
            if ($cektelatmasuk) {
                $getpegawai = pegawai::whereRaw("TIPE_AKUN='PEGAWAI'")->get();
                foreach ($getpegawai as $ku) {
                    $cekab = MPresensi::whereRaw("TANGGAL='$tgl' and STATUS_MASUK!='' and ID_PEGAWAI='". $ku->ID_PEGAWAI."'")->first();
                    if (!$cekab) {
                        $arr = [
                            'ID_PEGAWAI' => $ku->ID_PEGAWAI,
                            'TANGGAL' => $tgl,
                            'JAM_MASUK' => DATE('Y-m-d H:i:s'),
                            'STATUS_MASUK' => 'Telat',
                            'STATUS_KELUAR' => '',
                            'FOTO_KELUAR' => '',
                            'KETERANGAN_KELUAR' => '',
                            'TOTAL_TUNJANGAN' => 0,
                            'FOTO_MASUK' => '',
                            'KETERANGAN_MASUK' => 'Telat Dari Batas Waktu',
                        ];
                        //    return $arr;
                        MPresensi::create($arr);
                    }
                }
            }
            $cektelatkeluar = MHarikerja::whereRaw("NAMA_HARI = '$hariini' and KELUAR_AKHIR like '%$tdy%'")->first();
            if ($cektelatkeluar) {
                $getpegawai = pegawai::whereRaw("TIPE_AKUN='PEGAWAI'")
                ->leftjoin('presensi as b', 'b.ID_PEGAWAI', 'pegawai.ID_PEGAWAI')
                ->whereRaw("b.TANGGAL='$tgl' and b.STATUS_KELUAR=''")
                ->get();
                foreach ($getpegawai as $ku) {
                    $cekab = MPresensi::whereRaw("TANGGAL='$tgl' and STATUS_KELUAR!='' and ID_PEGAWAI='" . $ku->ID_PEGAWAI . "'")->first();
                    if (!$cekab) {
                    $arr = [
                        'ID_PEGAWAI' => $ku->ID_PEGAWAI,
                        'JAM_KELUAR' => DATE('Y-m-d H:i:s'),
                        'STATUS_KELUAR' => 'Telat',
                        'TOTAL_TUNJANGAN' => 0,
                        'KETERANGAN_KELUAR' => 'Telat Dari Batas Waktu',
                    ];
                    //    return $arr;
                    MPresensi::where(['TANGGAL' => $tgl, 'ID_PEGAWAI' => $ku->ID_PEGAWAI])->update($arr);
                    }
                }
            }

        }
        return response()->json(['pesan' => $cekkeluar], 200);
    }

}
