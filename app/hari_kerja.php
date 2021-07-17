<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hari_kerja extends Model
{
    protected $table = 'hari_kerja';
    protected $fillable = ['ID_HARI','NAMA_HARI','STATUS_KERJA','MASUK_AWAL','MASUK_AKHIR','KELUAR_AWAL','KELUAR_AKHIR'];
    public $timestamps = false;
     
}