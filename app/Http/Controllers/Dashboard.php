<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class Dashboard extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (!$request->session()->has('login')) {
                return redirect('/');
            }
            return $next($request);
        });
    }

    public function index(){
        return view('layout/body');
    }
}
