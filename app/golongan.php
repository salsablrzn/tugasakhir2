<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
    protected $table = 'golongan';
    protected $fillable = ['ID_GOLONGAN','NAMA_GOLONGAN'];
    public $timestamps = false;
     
}