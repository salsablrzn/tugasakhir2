<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    protected $table = 'presensi';
    protected $fillable = ['id_rekappresensi','daftar_hadir','foto'];
    public $timestamps = false;

    public function pegawai()
    {
        return $this->belongsToMany('App\pegawai');
    }
    public function absensi()
    {   
        return $this->belongsToMany('App\rekappresensi', 'id_pegawai')->withPivot('daftar_hadir')->wherePivot('tanggal', Carbon::now('Asia/Jakarta'));
    }
}
