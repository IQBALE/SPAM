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

// PASIEN

Route::get('/', 'frontController@index');
Route::get('/login', 'frontController@login');
Route::post('/aksi-login-pasien', 'frontController@aksiloginpasien');

Route::get('/registrasi','frontController@registrasi');
Route::post('/regist-pengguna','frontController@addpengguna');
Route::get('/logout','frontController@logout');


Route::get('/pendaftaran', 'frontController@pendaftaran')->middleware('pasienMiddleware');
Route::post('/add-pendaftaran', 'frontController@addpendaftaran')->middleware('pasienMiddleware');

Route::get('/hasiltest', 'frontController@hasiltest')->middleware('pasienMiddleware');
Route::get('/view-hasil-{id}','frontController@viewhasil')->middleware('pasienMiddleware');
Route::get('/download/{file}', 'frontController@download')->middleware('pasienMiddleware');

Route::get('/kritiksaran', 'frontController@kritiksaran')->middleware('pasienMiddleware');
Route::post('/add-kritiksaran','frontController@addkritiksaran')->middleware('pasienMiddleware');

Route::get('/datadiri', 'frontController@datadiri')->middleware('pasienMiddleware');
Route::post('/add-diri','frontController@adddiri')->middleware('pasienMiddleware');
Route::post('/edit-diri', 'frontController@editdiri')->middleware('pasienMiddleware');

Route::get('/swab','frontController@swab')->middleware('pasienMiddleware');
Route::post('/add-swab','frontController@addswab')->middleware('pasienMiddleware');
Route::get('/kodeswab','frontController@kodeswab')->middleware('pasienMiddleware');
Route::get('/pdfswab', 'frontController@pdfswab')->middleware('pasienMiddleware');
Route::get('/download-kodeswab','frontController@downloadkodeswab')->middleware('pasienMiddleware');

Route::get('/berobat','frontController@berobat')->middleware('pasienMiddleware');
Route::get('/datapoli/{id}', 'frontController@datapoli')->middleware('pasienMiddleware');
Route::post('/add-berobat','frontController@addberobat')->middleware('pasienMiddleware');
Route::get('/kodeberobat','frontController@kodeberobat')->middleware('pasienMiddleware');
Route::get('/pdfberobat', 'frontController@pdfberobat')->middleware('pasienMiddleware');
Route::get('/download-kodeberobat','frontController@downloadkodeberobat')->middleware('pasienMiddleware');


// ADMIN

Route::get('/loginadmin','backController@loginadmin');
Route::post('/aksi-login-admin','backController@aksiloginadmin');
Route::get('/logoutadmin','backController@logoutadmin');


Route::get('/admin', 'backController@index')->middleware('adminMiddleware');
Route::get('/blank', 'backController@index')->middleware('adminMiddleware');

Route::get('/dataadmin', 'backController@dataadmin')->middleware('adminMiddleware');
Route::post('/add-admin','backController@addadmin')->middleware('adminMiddleware');
Route::post('/update-admin', 'backController@updateadmin')->middleware('adminMiddleware');
Route::get('/hapus-admin/{id}', 'backController@hapusadmin')->middleware('adminMiddleware');

Route::get('/datapengguna','backController@datapengguna')->middleware('adminMiddleware');
Route::post('/add-pengguna','backController@addpengguna')->middleware('adminMiddleware');
Route::post('/update-pengguna','backController@updatepengguna')->middleware('adminMiddleware');
Route::get('/hapus-pengguna/{id}', 'backController@hapuspengguna')->middleware('adminMiddleware');

Route::get('/datapendaftaran','backController@datapendaftaran')->middleware('adminMiddleware');
Route::post('/update-pendaftaran','backController@updatependaftaran')->middleware('adminMiddleware');
Route::get('/hapus-pendaftaran/{id}','backController@hapuspendaftaran')->middleware('adminMiddleware');

Route::get('/datahasiltest','backController@datahasiltest')->middleware('adminMiddleware');
Route::post('/add-hasiltest', 'backController@addhasiltest')->middleware('adminMiddleware');
Route::post('/update-hasiltest','backController@updatehasiltest')->middleware('adminMiddleware');
Route::get('/hapus-hasiltest/{id}', 'backController@hapushasiltest')->middleware('adminMiddleware');

Route::get('/datakritiksaran','backController@datakritiksaran')->middleware('adminMiddleware');
Route::post('/tambah-kritiksaran','backController@addkritiksaran')->middleware('adminMiddleware');
Route::post('/update-kritik', 'backController@updatekritik')->middleware('adminMiddleware');
Route::get('/hapus-kritiksaran/{id}','backController@hapuskritik')->middleware('adminMiddleware');

Route::get('/databerobat', 'backController@databerobat')->middleware('adminMiddleware');
Route::post('/update-berobat','backController@updateberobat')->middleware('adminMiddleware');
Route::get('/hapus-berobat/{id}','backController@hapusberobat')->middleware('adminMiddleware');

Route::get('/dataswab','backController@dataswab')->middleware('adminMiddleware');
Route::post('/update-swab','backController@updateswab')->middleware('adminMiddleware');
Route::get('/hapus-swab/{id}','backController@hapusswab')->middleware('adminMiddleware');

Route::get('/datapoli','backController@datapoli')->middleware('adminMiddleware');
Route::post('/update-poli','backController@updatepoli')->middleware('adminMiddleware');
Route::get('/hapus-poli/{id}','backController@hapuspoli')->middleware('adminMiddleware');
