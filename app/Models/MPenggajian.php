<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPenggajian extends Model
{
    protected $table = 'penggajian';
    protected $fillable = ['ID_PENGGAJIAN', 'ID_PEGAWAI', 'BULAN_GAJIAN', 'GAJI_POKOK', 'TUNJANGAN_MAMIN', 'POTONGAN', 'TOTAL_GAJI', 'CREATE_AT'];
    public $timestamps = false;
}
