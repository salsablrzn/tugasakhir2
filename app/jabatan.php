<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = ['ID_JABATAN','NAMA_JABATAN'];
    public $timestamps = false;
}
