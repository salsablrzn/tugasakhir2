<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\rekappresensi;
use App\pegawai;


class guruController extends Controller
{
    //

    public function profile(){
        // if($request->session()->has('USERNAME')){
        //     echo $request->session()->get('USERNAME');
        // }else{
        // }
        // $email = $request->username;
        // $pass = $request->pass;
        // $PEGAWAI = pegawai::where('USERNAME',$email)->first();
        
        $id = session()->get('ID_PEGAWAI');
        $PEGAWAI=pegawai::where('ID_PEGAWAI',$id)->join('jabatan','pegawai.ID_JABATAN','=','jabatan.ID_JABATAN')->get(); 
        return view('konten/pegawai/profile',['PEGAWAI'=>$PEGAWAI]);
    }


    public function editprofile()
    {
        $id = session()->get('ID_PEGAWAI');
       //  $PEGAWAI=pegawai::where('ID_PEGAWAI',$id)->get();
       //  $JABATAN=DB::table('jabatan')->get();
       //  //
       // return view('konten/pegawai/editprofile',['PEGAWAI'=>$PEGAWAI, 'JABATAN'=>$JABATAN]);
       //  //

       $PEGAWAI=pegawai::where('ID_PEGAWAI',$id)->join('jabatan','pegawai.ID_JABATAN','=','jabatan.ID_JABATAN')->get(); 
        return view('konten/pegawai/editprofile',['PEGAWAI'=>$PEGAWAI]);
    }

    public function updateprofile(Request $request)
    {
         
         DB::table('pegawai')->where('ID_PEGAWAI',$request->ID_PEGAWAI)->update([
            
            'USERNAME'              => $request->USERNAME,
            'PASSWORD'              => bcrypt($request->PASSWORD),
            'ALAMAT'                => $request->ALAMAT,
            'TELEPON'               => $request->TELEPON
            ]);  

            return redirect('profile');
    }

    public function storeprofile(Request $request)
    {
            pegawai::create([
            'ID_JABATAN'            => $request->ID_JABATAN,
            'USERNAME'              => $request->USERNAME,
            'PASSWORD'              => bcrypt($request->PASSWORD),
            'ALAMAT'                => $request->ALAMAT,
            'TELEPON'               => $request->TELEPON
        ]);
        return redirect('profile');
        
    }

	public function presensi(Request $request){
        return view('konten/guru/presensi');
        // $presensi = presensi::all();
        // for($i=0;$i<count((is_countable($request->pegawai)?$request:[]));$i++){
            
        //     $check = Absensi::where(['id_pegawai' => $request->pegawai[$i],'nama_pegawai' => $request->pegawai, 'tanggal' => Carbon::now('Asia/Jakarta')->format('Y-m-d')])->get();
        //     if(count($check)==0 && $request->status[$i] != "Hadir"){
        //         $presensi = new presensi;
        //         $presensi->id_pegawai = $request->pegawai[$i];
        //         $presensi->nama_pegawai = $request->pegawai;
        //         $presensi->tanggal = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        //         $presensi->status = $request->status[$i];
        //         $presensi->keterangan = $request->status[$i];
        //         $presensi->save();

        //     }
        // }
        // return view('konten/guru/presensi',['presensi'=>$presensi]);
	}

    public function formpresensi(Request $request){
        return view('konten/guru/formpresensi');
    }

	public function presensipdf(){
    $alfa=$alfa->get();
    $izin=$izin->get();
    $sakit=$sakit->get();
    $pdf->setPaper('letter'); 
    return $pdf->stream(); 
	}

    public function absen()
    {
        if (@$this->uri->segment(3)) {
            $daftar_hadir = ucfirst($this->uri->segment(3));
        } else {
            $absen_harian = $this->presensi->absen_harian_user($this->session->id_pegawai)->num_rows();
            $daftar_hadir = ($absen_harian < 2 && $absen_harian < 1) ? 'Masuk' : 'Pulang';
        }

        $data = [
            'tgl' => date('Y-m-d'),
            'waktu' => date('H:i:s'),
            'daftar_hadir' => $kdaftar_hadir,
            'id_user' => $this->session->id_user
        ];
        $result = $this->presensi->insert_data($data);
        if ($result) {
            $this->session->set_flashdata('response', [
                'status' => 'success',
                'message' => 'Absensi berhasil dicatat'
            ]);
        } else {
            $this->session->set_flashdata('response', [
                'status' => 'error',
                'message' => 'Absensi gagal dicatat'
            ]);
        }
        redirect('absensi/detail_absensi');
    }

}
