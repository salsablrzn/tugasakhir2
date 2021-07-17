<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['ID_NILAI','NILAI'];
    public $timestamps = false;
     
}