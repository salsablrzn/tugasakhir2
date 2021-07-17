<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class layoutController extends Controller
{
    //
	public function index(){
		return view('layout/body');
	}

}

