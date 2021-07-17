<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//--------- Tampilan Layout ---------//

// Route::get('/', function () {
//     return view('layout/body');
// });

Route::get('dashboard', 'Dashboard@index');

//--------- Tampilan Admin ---------//

//NEW
Route::get('admin/rekappresensi', 'Admin\AdminController@rekappresensi');
Route::get('admin/rekapabsensiexcel/{id}', 'Admin\AdminController@rekapabsensiexcel');
Route::get('admin/penggajian/buat', 'Admin\PenggajianController@buat');
Route::post('admin/penggajian/savegaji', 'Admin\PenggajianController@savegaji');
Route::get('admin/penggajian/exportpdf/{id}/{tipe}', 'Admin\PenggajianController@exportpdf');
Route::get('admin/penggajian/export/{tipe}/{tgl}', 'Admin\PenggajianController@exportexcel');
Route::get('admin/penggajian/{tipe}', 'Admin\PenggajianController@data');




Route::get('adminlaporanpenggajian', 'adminController@laporanpenggajian');
Route::get('admingajiutama', 'adminController@gajiutama');
Route::get('admintunjanganmamin', 'adminController@tunjanganmamin');
Route::get('adminrekappresensi', 'adminController@rekappresensi');
Route::post('adminstorerekappresensi', 'adminController@storerekappresensi');


Route::get('admindataakun', 'adminController@dataakun');
Route::get('admincreatedataakun', 'adminController@createdataakun');
Route::post('adminstoredataakun', 'adminController@storedataakun');
Route::get('admineditdataakun', 'adminController@editdataakun');
Route::get('adminupdatedataakun', 'adminController@updatedataakun');
Route::get('admindestroydataakun', 'adminController@destroydataakun');


Route::get('admindatapegawai', 'adminController@datapegawai');
Route::get('admindataguru', 'adminController@dataguru');
Route::get('admindatatu', 'adminController@datatu');
Route::get('admincreatedatapegawai', 'adminController@createdatapegawai');
Route::get('admineditdatapegawai{id}', 'adminController@editdatapegawai');
Route::get('admincreatedataguru', 'adminController@createdataguru');
Route::get('admincreatedatatu', 'adminController@createdatatu');
Route::post('adminstoredatapegawai', 'adminController@storedatapegawai');
Route::post('adminupdatedatapegawai', 'adminController@updatedatapegawai');


//--------- Tampilan Guru---------//

Route::get('pegawai/presensi/formpresensi', 'pegawai\PresensiController@formpresensi');
Route::post('pegawai/presensi/savepresensi', 'pegawai\PresensiController@savepresensi');
Route::get('pegawai/presensi/hariini', 'pegawai\PresensiController@hariini');
Route::get('pegawai/riwayat/presensi', 'pegawai\RiwayatController@presensi');
Route::get('pegawai/riwayat/penggajian', 'pegawai\RiwayatController@penggajian');

// Route::get('gurustore', 'guruController@store');
// Route::get('gurupresensipdf', 'guruController@presensipdf');


//--------- Tampilan Profile---------//

Route::get('profile', 'guruController@profile');
Route::get('editprofile', 'guruController@editprofile');
Route::post('updateprofile', 'guruController@updateprofile');
Route::post('storeprofile', 'guruController@storeprofile');



//--------- Tampilan Login---------//

Route::get('/','loginController@index')->name('/');
Route::get('/login','loginController@index')->name('login');
Route::post('proseslogin', 'loginController@proseslogin');
Route::get('logout','loginController@logout');

//--------- Tampilan Waktu Presensi ---------//

Route::get('waktupresensi', 'adminController@waktupresensi');
Route::get('editwaktupresensi{id}', 'adminController@editwaktupresensi');
Route::post('storewaktupresensi', 'adminController@storewaktupresensi');
Route::post('updatewaktupresensi', 'adminController@updatewaktupresensi');

//--------- Tampilan History Pegawai ---------//

Route::get('history_pegawai', 'adminController@history_pegawai');


//--------- Tampilan Golongan ---------//

Route::get('golongan', 'adminController@golongan');
Route::get('creategolongan', 'adminController@creategolongan');
Route::get('editgolongan{id}', 'adminController@editgolongan');
Route::post('storegolongan', 'adminController@storegolongan');
Route::post('updategolongan', 'adminController@updategolongan');

//--------- Tampilan Gaji Pokok ---------//

Route::get('gajipokok', 'adminController@gajipokok');
Route::get('creategajipokok', 'adminController@creategajipokok');
Route::get('editgajipokok{id}', 'adminController@editgajipokok');
Route::post('storegajipokok', 'adminController@storegajipokok');
Route::post('updategajipokok', 'adminController@updategajipokok');

//--------- Tampilan Tunjangan ---------//

Route::get('tunjangan', 'adminController@tunjangan');
Route::get('createtunjangan', 'adminController@createtunjangan');
Route::get('edittunjangan{id}', 'adminController@edittunjangan');
Route::post('storetunjangan', 'adminController@storetunjangan');
Route::post('updatetunjangan', 'adminController@updatetunjangan');

//--------- Tampilan Nilai ---------//

Route::get('nilai', 'adminController@nilai');
Route::get('createnilai', 'adminController@createnilai');
Route::get('editnilai{id}', 'adminController@editnilai');
Route::post('storenilai', 'adminController@storenilai');
Route::post('updatenilai', 'adminController@updatenilai');

//--------- Tampilan Detail Nilai ---------//

Route::get('detailnilai', 'adminController@detailnilai');
Route::get('createdetailnilai', 'adminController@createdetailnilai');
Route::get('editdetailnilai{id}', 'adminController@editdetailnilai');
Route::post('storedetailnilai', 'adminController@storedetailnilai');
Route::post('updatedetailnilai', 'adminController@updatedetailnilai');

Route::get('penggajian', 'adminController@penggajian');
Route::get('createpenggajian', 'adminController@createpenggajian');


Route::post('/data-golongan','admincontroller@getgolongan');
Route::post('/data-pegawai','admincontroller@gaji');