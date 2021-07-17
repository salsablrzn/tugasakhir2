<?php

namespace App\Helpers;

class Helper
{

    public static function send_notif($tokens, $title, $body, $urlku)
    {
        $url = 'https://onesignal.com/api/v1/notifications';

        $fields = [];
        $fields['app_id'] = "d57167d0-0f91-4d07-826d-d0ce267f7192";
        $fields['contents'] = ['en' => $body];
        $fields['headings'] = ['en' => $title];
        $fields['include_player_ids'] = $tokens;

        $fields['web_buttons'] = [
            [
                'id' => "1",
                'text' => "Buka Notifikasi",
                'url' => $urlku,
            ]
        ];
        $fields['url'] = $urlku;

        $headers = array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic NDUzZDFhMmEtOTE4MC00Y2U3LWIyYjUtYTY0OWU4YzgzY2E2'

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            // die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
    public static function comparejam($awal, $akhir)
    {
        $tmnow = date('H:i:s');
        $re = array();
        $re[0] = ":";
        $re[1] = ":";
        $re[2] = ":";
        $dat = array();
        $dat[0] = "";
        $dat[1] = "";
        $dat[2] = "";
        $awalnu = str_replace($re, $dat, $awal);
        $akhirnu = str_replace($re, $dat, $akhir);
        $now = str_replace($re, $dat, $tmnow);
        // return $awalnu . ' ' . $akhirnu . ' ' . $now;
        if ((int)$awalnu <= (int)$now && (int)$akhirnu >= (int)$now) {
            // $hasil ="1";
            return true;
        } else {
            // $hasil = "0";
            return false;
        }

        // return $awalnu . '-' . $akhirnu . '-' . $hasil;
    }

    public static function hari_ini()
    {
        $hari = date("D");

        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;
    }
    public static function price($price)
    {
        return "Rp " . number_format($price, 0, ',', '.');
    }
    public static function uang($price)
    {
        return number_format($price, 0, ',', '.');
    }
    public static function tanggal($tgl)
    {
        try {
            $qq = '';
            $k = explode("-", $tgl);
            $bln = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            $qq = $k[2] . ' ' . $bln[(int)$k[1]] . ' ' . $k[0];
            return $qq;
        } catch (\Throwable $th) {
            return $tgl;
        }
    }
    public static function bulantahun($tgl)
    {
        try {
        $qq = '';
        $k = explode("-", $tgl);
        $bln = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $qq = $bln[(int)$k[1]] . ' ' . $k[0];
        return $qq;
        } catch (\Throwable $th) {
            return $tgl;
        }
    }
    public static function waktu($tgl)
    {
        try {
            $qq = '';
            $k = explode(" ", $tgl);
            $kk = explode("-", $k[0]);
            $bln = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

            $qq = $kk[2] . ' ' . $bln[(int)$kk[1]] . ' ' . $kk[0] . ' ' . $k[1];
            return $qq;
        } catch (\Throwable $th) {
            return $tgl;
        }
    }

    public static function gettanggaldatetime($tgl)
    {
        $qq = '';
        $k = explode(" ", $tgl);
        $kk = explode("-", $k[0]);
        $bln = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        $qq = $kk[2] . ' ' . $bln[(int)$kk[1]] . ' ' . $kk[0];
        return $qq;
    }

    public static function bersihkanangka($kalimat)
    {
        $re = array();
        $re[0] = ".";
        $re[1] = ",";
        $re[2] = "-";
        $dat = array();
        $dat[0] = "";
        $dat[1] = "";
        $dat[2] = "";
        return str_replace($re, $dat, $kalimat);
    }
}
