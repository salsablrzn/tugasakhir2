<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPresensi extends Model
{

    protected $table = 'presensi';
    protected $fillable = ['ID_PEGAWAI', 'TANGGAL', 'STATUS_MASUK', 'STATUS_KELUAR', 'KELUAR_AKHIR',
        'FOTO_MASUK', 'FOTO_KELUAR', 'JAM_MASUK', 'JAM_KELUAR', 'TOTAL_TUNJANGAN', 'KETERANGAN_MASUK', 'KETERANGAN_KELUAR'];
    public $timestamps = false;
}
