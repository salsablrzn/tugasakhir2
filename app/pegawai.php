<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = ['ID_PEGAWAI', 'ID_JABATAN', 'NIP','NAMA_PEGAWAI', 'GAJI_POKOK', 'TUNJANGAN', 'TIPE_AKUN', 'USERNAME', 'PASSWORD', 'JENIS_KELAMIN', 'STATUS_KEPEGAWAIAN', 'ALAMAT', 'TELEPON', 'TANGGAL_LAHIR', 'STATUS'];
    public $timestamps = false;
     
}

