<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_nilai extends Model
{
    protected $table = 'detail_nilai';
    protected $fillable = ['ID_NILAI','ID_GOLONGAN'];
    public $timestamps = false;
     
}