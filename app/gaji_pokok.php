<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gaji_pokok extends Model
{
    protected $table = 'gaji_pokok';
    protected $fillable = ['ID_GAJI_POKOK','ID_NILAI','ID_GOLONGAN','NAMA_GAJI_POKOK','MASSA_KERJA','NOMINAL_GAJI_POKOK'];
    public $timestamps = false;
     
}