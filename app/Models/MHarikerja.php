<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MHarikerja extends Model
{

    protected $table = 'hari_kerja';
    protected $fillable = ['STATUS_KERJA', 'MASUK_AWAL', 'MASUK_AKHIR', 'KELUAR_AWAL', 'KELUAR_AKHIR'];
    public $timestamps = false;
}
