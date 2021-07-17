<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataakun extends Model
{
    protected $table = 'dataakun';
    protected $fillable = ['id_dataakun','nama_dataakun','username_dataakun','password_dataakun','status_dataakun'];
    public $timestamps = false;
     
}

