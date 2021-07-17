<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\user;

class loginController extends Controller
{
    //
	public function index()
    {
        if (session()->has('login')) {
            return redirect('dashboard');
        } else {

            return view('konten/login/login');
        }
	}
	
	public function proseslogin(Request $req){
		$email = $req->username;
		$pass = $req->pass;
		$data = pegawai::where('USERNAME',$email)->first();
		if($data){
		// return $data;
           if(password_verify($pass, $data->PASSWORD)) {
                Session::put('login', TRUE);
                Session::put('ID_PEGAWAI', $data->ID_PEGAWAI);
                Session::put('TIPE_AKUN', $data->TIPE_AKUN);
                Session::put('ID_JABATAN', $data->ID_JABATAN);
                // if($data->TIPE_AKUN == '0'){
                //     Session::put('admin', TRUE);
                // }
                // if($data->TIPE_AKUN == '1'){
                //     Session::put('kasir', TRUE);
                // }
                return redirect('dashboard');

            }
            else{
				// return "aa";
                return redirect('/')->with('status',['danger','Informasi','Password atau Email, Salah !']);
            }
        }
        else{
            return redirect('/')->with('status',['danger','Informasi','Password atau Email, Salah !']);
            
        }
	}

    public function logout(){

        pegawai::where('ID_PEGAWAI', session()->get('ID_PEGAWAI'))->update(['TOKEN_NOTIF' => ""]);
        Session::flush();
        return redirect('/')->with('alert-success','Anda sudah logout');
    }

}
