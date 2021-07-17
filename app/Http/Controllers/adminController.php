<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\pegawai;
use App\jabatan;
use App\hari_kerja;
use App\gaji_pokok;
use App\tunjangan;
use App\nilai;
use App\golongan;
use App\detail_nilai;

class adminController extends Controller
{
    //--- Laporan Penggajian ---//

	public function laporanpenggajian(){
		return view('konten/admin/laporanpenggajian/laporanpenggajian');
	}

    public function gajiutama(){
        return view('konten/admin/laporanpenggajian/gajiutama');
    }

     public function tunjanganmamin(){
        return view('konten/admin/laporanpenggajian/tunjanganmamin');
    }

    //--- Rekap Presensi ---//

	public function rekappresensi(){
        return view('konten/admin/rekappresensi/rekappresensi');
  //       $rekappresensi = rekappresensi::all();
  //       $hadir = presensi::where('daftar_hadir', 'hadir')->where('id_pegawai', 'idnyasipegawai')->count();
		// return view('konten/admin/rekappresensi/rekappresensi',['rekappresensi'=>$rekappresensi]);
	}

    public function storerekappresensi(Request $request)
    {
            rekappresensi::create([
            'id_rekappresensi'  => $request->id_rekappresensi,
            'hadir'             => $request->hadir,
            'sakit'             => $request->sakit,
            'izin'              => $request->izin,            
            'foto'              => base64_encode($request->foto)
        ]);
        return redirect('adminrekappresensi');
    }

    //--- Data Akun ---//

	public function dataakun(){
        $dataakun = dataakun::all();
		return view('konten/admin/dataakun/dataakun',['dataakun'=>$dataakun]);
	}

	public function createdataakun()
    {
        return view('konten/admin/dataakun/create');
        
    }

    public function storedataakun(Request $request)
    {
        dataakun::create([
            'id_dataakun'		    => $request->id_dataakaun,
            'nama_dataakun'	        => $request->nama_dataakun,
            'username_dataakun'		=> $request->username_dataakun,
            'password_dataakun'		=> $request->password_dataakun,
            // 'status_dataakun'		=> $request->status_dataakun
        ]);
        return redirect('admindataakun');
        
    }
    
    public function editdataakun($id)
    {
        $dataakun=dataakun::where('id_dataakun',$id)->get();
        
       return view("master/User/edit",['dataakun'=>$dataakun]);
        
    }

   
    public function updatedataakun(Request $request)
    {
         $dataakun=dataakun::where('id_dataakun',$request->id_dataakun)
            ->update([ 
            'id_dataakaun'          => $request->id_dataakaun,
            'nama_dataakun'         => $request->nama_dataakun,
            'username_dataakun'     => $request->username_dataakun,
            'password_dataakun'     => $request->password_dataakun,
            'status_dataakun'       => $request->status_dataakun
            ]);  
        
            return redirect('admindataakun');
    }

        public function destroydataakun($id)
    {
         DB::table('dataakun')
            ->where('id_dataakun', $id)
            ->delete();     
        return redirect('admindataakun');
        //
    }

    //--- Data Pegawai ---//
     

	public function datapegawai(){
        // $PEGAWAI = DB::table('pegawai')->get;
        // $data = Carbon::now()->format('d-m-Y h:i:s');
        // dd($data);
        $PEGAWAI=pegawai::join('jabatan','pegawai.ID_JABATAN','=','jabatan.ID_JABATAN')->get(); 
        
		return view('konten/admin/datapegawai/datapegawai',['PEGAWAI'=>$PEGAWAI]);
	}

    public function dataguru(){
        return view('konten/admin/datapegawai/dataguru');
    }

    public function datatu(){
        return view('konten/admin/datapegawai/datatu');
    }

    public function createdatapegawai(){
        $jabatan = DB::table('jabatan')->pluck("NAMA_JABATAN","ID_JABATAN");
        return view('konten/admin/datapegawai/createdatapegawai',compact('jabatan'));
    }

    public function createdataguru(){
        return view('konten/admin/datapegawai/createdataguru');
    }

    public function createdatatu(){
        return view('konten/admin/datapegawai/createdatatu');
    }

    public function storedatapegawai(Request $request)
    {
            pegawai::create([
            'ID_PEGAWAI'            => $request->ID_PEGAWAI,
            'ID_JABATAN'            => $request->ID_JABATAN,
            'NIP'                   => $request->NIP,
            'NAMA_PEGAWAI'          => $request->NAMA_PEGAWAI,
            'GAJI_POKOK'            => $request->GAJI_POKOK,
            'TUNJANGAN'             => $request->TUNJANGAN,
            'TIPE_AKUN'             => $request->TIPE_AKUN,
            'USERNAME'              => $request->USERNAME,
            'PASSWORD'              => bcrypt($request->PASSWORD),
            'JENIS_KELAMIN'         => $request->JENIS_KELAMIN,
            'STATUS_KEPEGAWAIAN'    => $request->STATUS_KEPEGAWAIAN,
            'ALAMAT'                => $request->ALAMAT,
            'TELEPON'               => $request->TELEPON,            
            'TANGGAL_LAHIR'         => $request->TANGGAL_LAHIR,
            'STATUS'                => $request->STATUS
        ]);
            $id = DB::table('pegawai')->max('ID_PEGAWAI');
            $data = Carbon::now()->format('d-m-Y h:i:s');
            DB::table('history_pegawai')->insert([
            'ID_PEGAWAI'             => $id,  
            'ID_JABATAN'             => $request->ID_JABATAN,
            'NIP'                    => $request->NIP,
            'NAMA_PEGAWAI'           => $request->NAMA_PEGAWAI,
            'GAJI_POKOK'             => $request->GAJI_POKOK,
            'TUNJANGAN'              => $request->TUNJANGAN,
            'TIPE_AKUN'              => $request->TIPE_AKUN,
            'USERNAME'               => $request->USERNAME,
            'PASSWORD'               => bcrypt($request->PASSWORD),
            'JENIS_KELAMIN'          => $request->JENIS_KELAMIN,
            'STATUS_KEPEGAWAIAN'     => $request->STATUS_KEPEGAWAIAN,
            'ALAMAT'                 => $request->ALAMAT,
            'TELEPON'                => $request->TELEPON,            
            'TANGGAL_LAHIR'          => $request->TANGGAL_LAHIR,
            'STATUS'                 => $request->STATUS,
            'STATUS_HISTORY_PEGAWAI' => "insert",
            'TANGGAL_HISTORY_PEGAWAI'=> $data
            ]);  

        return redirect('admindatapegawai');
        
    }

    public function editdatapegawai($id)
    {
        $PEGAWAI=pegawai::where('ID_PEGAWAI',$id)->get();
        $JABATAN=DB::table('jabatan')->get();
        //
       return view('konten/admin/datapegawai/editdatapegawai',['PEGAWAI'=>$PEGAWAI, 'JABATAN'=>$JABATAN]);
        //
    }

    public function updatedatapegawai(Request $request)
    {
         
         DB::table('pegawai')->where('ID_PEGAWAI',$request->ID_PEGAWAI)->update([
            'ID_JABATAN'            => $request->ID_JABATAN,
            'NIP'                   => $request->NIP,
            'NAMA_PEGAWAI'          => $request->NAMA_PEGAWAI,
            'GAJI_POKOK'            => $request->GAJI_POKOK,
            'TUNJANGAN'             => $request->TUNJANGAN,
            'TIPE_AKUN'             => $request->TIPE_AKUN,
            'USERNAME'              => $request->USERNAME,
            'PASSWORD'              => bcrypt($request->PASSWORD),
            'JENIS_KELAMIN'         => $request->JENIS_KELAMIN,
            'STATUS_KEPEGAWAIAN'    => $request->STATUS_KEPEGAWAIAN,
            'ALAMAT'                => $request->ALAMAT,
            'TELEPON'               => $request->TELEPON,            
            'TANGGAL_LAHIR'         => $request->TANGGAL_LAHIR,
            'STATUS'                => $request->STATUS
            ]);  
            $data = Carbon::now()->format('d-m-Y h:i:s');
            DB::table('history_pegawai')->insert([
            'ID_PEGAWAI'             => $request->ID_PEGAWAI,  
            'ID_JABATAN'             => $request->ID_JABATAN,
            'NIP'                    => $request->NIP,
            'NAMA_PEGAWAI'           => $request->NAMA_PEGAWAI,
            'GAJI_POKOK'             => $request->GAJI_POKOK,
            'TUNJANGAN'              => $request->TUNJANGAN,
            'TIPE_AKUN'              => $request->TIPE_AKUN,
            'USERNAME'               => $request->USERNAME,
            'PASSWORD'               => bcrypt($request->PASSWORD),
            'JENIS_KELAMIN'          => $request->JENIS_KELAMIN,
            'STATUS_KEPEGAWAIAN'     => $request->STATUS_KEPEGAWAIAN,
            'ALAMAT'                 => $request->ALAMAT,
            'TELEPON'                => $request->TELEPON,            
            'TANGGAL_LAHIR'          => $request->TANGGAL_LAHIR,
            'STATUS'                 => $request->STATUS,
            'STATUS_HISTORY_PEGAWAI' => "edit",
            'TANGGAL_HISTORY_PEGAWAI'=> $data
            ]);  

            return redirect('admindatapegawai');
    }

    //--- Waktu Presensi ---//
     
    public function waktupresensi(){
        $id = session()->get('ID_HARI');
        $HARI_KERJA = hari_kerja::all();           
        return view('konten/admin/waktupresensi/waktupresensi',['HARI_KERJA'=>$HARI_KERJA]);
    }
   
    public function storewaktupresensi(Request $request)
    {
            pegawai::create([
            'ID_HARI'            => $request->ID_HARI,
            'NAMA_HARI'          => $request->NAMA_HARI,
            'STATUS_KERJA'       => $request->STATUS_KERJA,
            'MASUK_AWAL'         => $request->MASUK_AWAL,
            'MASUK_AKHIR'        => $request->MASUK_AKHIR,
            'KELUAR_AWAL'        => $request->KELUAR_AWAL,
            'KELUAR_AKHIR'       => $request->KELUAR_AKHIR,            
        ]);
        return redirect('waktupresensi');
        
    }

    public function editwaktupresensi($id)
    {        
        $HARI_KERJA=hari_kerja::where('ID_HARI',$id)->get();
        //
       return view('konten/admin/waktupresensi/editwaktupresensi',['HARI_KERJA'=>$HARI_KERJA]);
        //
    }

    public function updatewaktupresensi(Request $request)
    {
         
         DB::table('hari_kerja')->where('ID_HARI',$request->ID_HARI)->update([
            'ID_HARI'            => $request->ID_HARI,
            'NAMA_HARI'          => $request->NAMA_HARI,
            'STATUS_KERJA'       => $request->STATUS_KERJA,
            'MASUK_AWAL'         => $request->MASUK_AWAL,
            'MASUK_AKHIR'        => $request->MASUK_AKHIR,
            'KELUAR_AWAL'        => $request->KELUAR_AWAL,
            'KELUAR_AKHIR'       => $request->KELUAR_AKHIR,    
            ]);  

            return redirect('waktupresensi');
    }

     public function history_pegawai(Request $request)
    {
         
         DB::table('history_pegawai')->where('ID_PEGAWAI',$request->ID_PEGAWAI)->insert([
            'ID_PEGAWAI'            => $request->ID_PEGAWAI,
            'ID_JABATAN'            => $request->ID_JABATAN,
            'NIP'                   => $request->NIP,
            'NAMA_PEGAWAI'          => $request->NAMA_PEGAWAI,
            'GAJI_POKOK'            => $request->GAJI_POKOK,
            'TUNJANGAN'             => $request->TUNJANGAN,
            'TIPE_AKUN'             => $request->TIPE_AKUN,
            'USERNAME'              => $request->USERNAME,
            'PASSWORD'              => bcrypt($request->PASSWORD),
            'JENIS_KELAMIN'         => $request->JENIS_KELAMIN,
            'STATUS_KEPEGAWAIAN'    => $request->STATUS_KEPEGAWAIAN,
            'ALAMAT'                => $request->ALAMAT,
            'TELEPON'               => $request->TELEPON,            
            'TANGGAL_LAHIR'         => $request->TANGGAL_LAHIR,
            'STATUS'                => $request->STATUS
            ]);  

            return redirect('history_pegawai');
    }

    //--- Golongan ---//
     
    public function golongan(){
        $id = session()->get('ID_GOLONGAN');
        $GOLONGAN = golongan::all();           
        return view('konten/admin/golongan/index',['GOLONGAN'=>$GOLONGAN]);
    }

    public function creategolongan(){
        return view('konten/admin/golongan/create');
    }
   
    public function storegolongan(Request $request)
    {
            golongan::create([
            'ID_GOLONGAN'            => $request->ID_GOLONGAN,
            'NAMA_GOLONGAN'          => $request->NAMA_GOLONGAN,   
        ]);
        return redirect('golongan');
        
    }

    public function editgolongan($id)
    {        
        $GOLONGAN=golongan::where('ID_GOLONGAN',$id)->get();
        //
       return view('konten/admin/golongan/edit',['GOLONGAN'=>$GOLONGAN]);
        //
    }

    public function updategolongan(Request $request)
    {
         
         DB::table('golongan')->where('ID_GOLONGAN',$request->ID_GOLONGAN)->update([
            'ID_GOLONGAN'            => $request->ID_GOLONGAN,
            'NAMA_GOLONGAN'          => $request->NAMA_GOLONGAN,   
            ]);  

            return redirect('golongan');
    }

    //--- Gaji Pokok ---//
     
    public function gajipokok(){
        $GAJI_POKOK = DB::table('gaji_pokok')
                   ->join('nilai','gaji_pokok.ID_NILAI','=','nilai.ID_NILAI')
                   ->join('golongan','gaji_pokok.ID_GOLONGAN','=','golongan.ID_GOLONGAN')->get();
        $id = session()->get('ID_GAJI_POKOK');
        $GAJI_POKOK = gaji_pokok::all();           
        return view('konten/admin/gajipokok/index',['GAJI_POKOK'=>$GAJI_POKOK]);
    }

    public function creategajipokok(){
        $nilai = DB::table('nilai')->pluck("NILAI","ID_NILAI");
        $golongan = DB::table('golongan')->pluck("NAMA_GOLONGAN","ID_GOLONGAN");
        return view('konten/admin/gajipokok/create',compact('nilai','golongan'));
    }
   
    public function storegajipokok(Request $request)
    {
            DB::table('nilai')->get();
            DB::table('golongan')->get();
            gaji_pokok::create([
            'ID_GAJI_POKOK'     => $request->ID_GAJI_POKOK,
            'ID_NILAI'          => $request->ID_NILAI,
            'ID_GOLONGAN'       => $request->ID_GOLONGAN,
            'NAMA_GAJI_POKOK'   => $request->NAMA_GAJI_POKOK,
            'MASSA_KERJA'       => $request->MASSA_KERJA,
            'NOMINAL_GAJI_POKOK'=> $request->NOMINAL_GAJI_POKOK,      
        ]);
        return redirect('gajipokok');
        
    }

    public function editgajipokok($id)
    {        
        $nilai=nilai::where('ID_NILAI',$id)->get();
        $golongan=golongan::where('ID_GOLONGAN',$id)->get();
        $GAJI_POKOK=gaji_pokok::where('ID_GAJI_POKOK',$id)->get();
        //
       return view('konten/admin/gajipokok/edit',['GAJI_POKOK'=>$GAJI_POKOK,'nilai'=>$nilai,'golongan'=>$golongan]);
        //
    }

    public function updategajipokok(Request $request)
    {
         
         DB::table('gaji_pokok')->where('ID_GAJI_POKOK',$request->ID_GAJI_POKOK)->update([
            'ID_GAJI_POKOK'     => $request->ID_GAJI_POKOK,
            'ID_NILAI'          => $request->ID_NILAI,
            'ID_GOLONGAN'       => $request->ID_GOLONGAN,
            'NAMA_GAJI_POKOK'   => $request->NAMA_GAJI_POKOK,
            'MASSA_KERJA'       => $request->MASSA_KERJA,
            'NOMINAL_GAJI_POKOK'=> $request->NOMINAL_GAJI_POKOK,  
            ]);  

            return redirect('gajipokok');
    }

    //--- Tunjangan ---//
     
    public function tunjangan(){
        $TUNJANGAN = DB::table('tunjangan')
                   ->join('golongan','tunjangan.ID_GOLONGAN','=','golongan.ID_GOLONGAN')->get();
        $id = session()->get('ID_TUNJANGAN');
        $TUNJANGAN = tunjangan::all();           
        return view('konten/admin/tunjangan/index',['TUNJANGAN'=>$TUNJANGAN]);
    }

    public function createtunjangan(){
        $golongan = DB::table('golongan')->pluck("NAMA_GOLONGAN","ID_GOLONGAN");
        return view('konten/admin/tunjangan/create',compact('golongan'));
    }
   
    public function storetunjangan(Request $request)
    {
            DB::table('golongan')->get();
            tunjangan::create([
            'ID_TUNJANGAN'         => $request->ID_TUNJANGAN,
            'ID_GOLONGAN'          => $request->ID_GOLONGAN,
            'NAMA_TUNJANGAN'       => $request->NAMA_TUNJANGAN,
            'NOMINAL_TUNJANGAN'    => $request->NOMINAL_TUNJANGAN,
            'POTONGAN_TUNJANGAN'   => $request->POTONGAN_TUNJANGAN,           
        ]);
        return redirect('tunjangan');
        
    }

    public function edittunjangan($id)
    {        
        $GOLONGAN=golongan::where('ID_GOLONGAN',$id)->get();
        $TUNJANGAN=tunjangan::where('ID_TUNJANGAN',$id)->get();
        //
       return view('konten/admin/tunjangan/edit',['TUNJANGAN'=>$TUNJANGAN,'GOLONGAN'=>$GOLONGAN]);
        //
    }

    public function updatetunjangan(Request $request)
    {
         
         DB::table('tunjangan')->where('ID_TUNJANGAN',$request->ID_TUNJANGAN)->update([
            'ID_TUNJANGAN'         => $request->ID_TUNJANGAN,
            'ID_GOLONGAN'          => $request->ID_GOLONGAN,
            'NAMA_TUNJANGAN'       => $request->NAMA_TUNJANGAN,
            'NOMINAL_TUNJANGAN'    => $request->NOMINAL_TUNJANGAN,
            'POTONGAN_TUNJANGAN'   => $request->POTONGAN_TUNJANGAN,     
            ]);  

            return redirect('tunjangan');
    }

    //--- Nilai ---//
     
    public function nilai(){
        $id = session()->get('ID_NILAI');
        $NILAI = nilai::all();           
        return view('konten/admin/nilai/index',['NILAI'=>$NILAI]);
    }

    public function createnilai(){
        return view('konten/admin/nilai/create');
    }
   
    public function storenilai(Request $request)
    {  
            nilai::create([
            'ID_NILAI'       => $request->ID_NILAI,
            'NILAI'          => $request->NILAI,    
        ]);
        return redirect('nilai');
        
    }

    public function editnilai($id)
    {        
        $NILAI=nilai::where('ID_NILAI',$id)->get();
        //
       return view('konten/admin/nilai/edit',['NILAI'=>$NILAI]);
        //
    }

    public function updatenilai(Request $request)
    {
         
         DB::table('nilai')->where('ID_NILAI',$request->ID_NILAI)->update([
            'ID_NILAI'       => $request->ID_NILAI,
            'NILAI'          => $request->NILAI,  
            ]);  

            return redirect('nilai');
    }

    //--- Detail Nilai ---//
     
    public function detailgolongan(){
        // $id = session()->get('ID_HARI');
        $DETAIL_NILAI = detail_nilai::all();           
        return view('konten/admin/detail_nilai/index',['DETAIL_NILAI'=>$DETAIL_NILAI]);
    }

    public function createdetailnilai(){
        return view('konten/admin/detail_nilai/create');
    }
   
    public function storedetailnilai(Request $request)
    {
            detail_nilai::create([
            'ID_NILAI'            => $request->ID_NILAI,
            'ID_GOLONGAN'         => $request->ID_GOLONGAN,       
        ]);
        return redirect('detailnilai');
        
    }

    public function editdetailnilai($id)
    {        
        $DETAIL_NILAI=detail_nilai::where('ID_HARI',$id)->get();
        //
       return view('konten/admin/detail_nilai/edit',['HARI_KERJA'=>$HARI_KERJA]);
        //
    }

    public function updatedetailnilai(Request $request)
    {
         
         DB::table('detail_nilai')->where('ID_HARI',$request->ID_HARI)->update([
            'ID_NILAI'            => $request->ID_NILAI,
            'ID_GOLONGAN'         => $request->ID_GOLONGAN,       
            ]);  

            return redirect('detailnilai');
    }

}
