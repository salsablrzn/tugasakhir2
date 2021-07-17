<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan extends Model
{
    protected $table = 'tunjangan';
    protected $fillable = ['ID_TUNJANGAN','ID_GOLONGAN','NAMA_TUNJANGAN','NOMINAL_TUNJANGAN','POTONGAN_TUNJANGAN'];
    public $timestamps = false;
     
}