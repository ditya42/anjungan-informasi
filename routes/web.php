<?php

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




Route::get('/contact', function () {
    return view('frontend/contact');
})->name('contact');





Auth::routes();

// Admin
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::namespace('Admin')->group(function () {

    //admin pengaduan
    Route::get('/AdminPengaduan/data','AdminPengaduanController@data')->name('AdminPengaduan.data');

    Route::get('AdminPengaduan/{pengaduan}/delete', 'AdminPengaduanController@destroy')->name('AdminPengaduan.destroy');
    Route::get('FilePengaduan/{pengaduan}/delete', 'AdminPengaduanController@Filedestroy')->name('FilePengaduan.destroy');

    Route::resource("AdminPengaduan","AdminPengaduanController", ['except' => 'destroy']);




    //anjungan-informasi
    //users
    Route::get('/users/data','UserController@data')->name('users.data');
    Route::resource("users", "UserController");


    Route::get('/subbidang/data','SubbidangController@data')->name('subbidang.data');
    Route::resource("subbidang", "SubbidangController");

    Route::get('/DasarHukum/data','DasarHukumController@data')->name('dasarhukum.data');
    Route::resource("dasarhukum", "DasarHukumController");

    Route::get('/Layanan/data','LayananController@data')->name('layanan.data');
    Route::resource("layanan", "LayananController");

    Route::get('/DasarLayanan/data','DasarLayananController@data')->name('dasarlayanan.data');
    Route::get('/DasarLayanan/{id}','DasarLayananController@index')->name('dasarlayanan.index');
    Route::DELETE('/DasarLayanan/{id}','DasarLayananController@destroy')->name('dasarlayanan.destroy');


    Route::get('/persyaratan/data','PersyaratanController@data')->name('persyaratan.data');
    Route::get('/persyaratan/{id}','PersyaratanController@index')->name('persyaratan.index');
    Route::get('/tambahpersyaratan/{id}','PersyaratanController@create')->name('persyaratan.create');
    Route::get('/editpersyaratan/{id}','PersyaratanController@edit')->name('persyaratan.edit');
    Route::post('/persyaratan','PersyaratanController@store')->name('persyaratan.store');
    Route::DELETE('/persyaratan/{id}','PersyaratanController@destroy')->name('persyaratan.destroy');
    Route::PUT('/updatepersyaratan/{id}','PersyaratanController@update')->name('persyaratan.update');


    Route::get('/prosedur/data','ProsedurController@data')->name('prosedur.data');
    Route::get('/prosedur/{id}','ProsedurController@index')->name('prosedur.index');
    Route::get('/tambahprosedur/{id}','ProsedurController@create')->name('prosedur.create');
    Route::get('/editprosedur/{id}','ProsedurController@edit')->name('prosedur.edit');
    Route::post('/prosedur','ProsedurController@store')->name('prosedur.store');
    Route::DELETE('/prosedur/{id}','ProsedurController@destroy')->name('prosedur.destroy');
    Route::PUT('/updateprosedur/{id}','ProsedurController@update')->name('prosedur.update');

    Route::get('/penyelesaian/data','PenyelesaianController@data')->name('penyelesaian.data');
    Route::get('/penyelesaian/{id}','PenyelesaianController@index')->name('penyelesaian.index');
    Route::get('/tambahpenyelesaian/{id}','PenyelesaianController@create')->name('penyelesaian.create');
    Route::get('/editpenyelesaian/{id}','PenyelesaianController@edit')->name('penyelesaian.edit');
    Route::post('/penyelesaian','PenyelesaianController@store')->name('penyelesaian.store');
    Route::DELETE('/penyelesaian/{id}','PenyelesaianController@destroy')->name('penyelesaian.destroy');
    Route::PUT('/updatepenyelesaian/{id}','PenyelesaianController@update')->name('penyelesaian.update');


    Route::get('/pelaksana/data','PelaksanaController@data')->name('pelaksana.data');
    Route::get('/pelaksana/{id}','PelaksanaController@index')->name('pelaksana.index');
    Route::get('/tambahpelaksana/{id}','PelaksanaController@create')->name('pelaksana.create');
    Route::get('/editpelaksana/{id}','PelaksanaController@edit')->name('pelaksana.edit');
    Route::post('/pelaksana','PelaksanaController@store')->name('pelaksana.store');
    Route::DELETE('/pelaksana/{id}','PelaksanaController@destroy')->name('pelaksana.destroy');
    Route::PUT('/updatepelaksana/{id}','PelaksanaController@update')->name('pelaksana.update');



    Route::get('/aduan/data','AduanController@data')->name('aduan.data');
    Route::get('/aduan/{id}','AduanController@index')->name('aduan.index');
    Route::get('/tambahaduan/{id}','AduanController@create')->name('aduan.create');
    Route::get('/editaduan/{id}','AduanController@edit')->name('aduan.edit');
    Route::post('/aduan','AduanController@store')->name('aduan.store');
    Route::DELETE('/aduan/{id}','AduanController@destroy')->name('aduan.destroy');
    Route::PUT('/updateaduan/{id}','AduanController@update')->name('aduan.update');



    Route::get('/produk/data','ProdukController@data')->name('produk.data');
    Route::get('/produk/{id}','ProdukController@index')->name('produk.index');
    Route::get('/tambahproduk/{id}','ProdukController@create')->name('produk.create');
    Route::get('/editproduk/{id}','ProdukController@edit')->name('produk.edit');
    Route::post('/produk','ProdukController@store')->name('produk.store');
    Route::DELETE('/produk/{id}','ProdukController@destroy')->name('produk.destroy');
    Route::PUT('/updateproduk/{id}','ProdukController@update')->name('produk.update');

    // Route::resource("dasarlayanan", "LayananController");



    // Route::get('/Layanan/apimutasi/','LayananController@apipegawai')->name('superadminnotadinas.apipegawai');

    //end-anjungan-informasi











    //jabatan
    Route::get('/jabatan/data','JabatanController@data')->name('jabatan.data');

    Route::get('jabatan/{jabatan}/delete', 'JabatanController@destroy')->name('jabatan.destroy');
    Route::resource("jabatan", "JabatanController", ['except' => 'destroy']);




});

// End admin


Route::namespace('frontend')->group(function () {

    Route::get('/', 'IndexController@index')->name('index');

    Route::get('/layanan/{id}', 'IndexController@layanan')->name('layanan');

    Route::get('/Syarat/{id}', 'IndexController@syarat')->name('syarat');


});

Route::namespace('guest')->group(function () {

    Route::get('/pengaduan/data','PengaduanController@data')->name('pengaduan.data');

    Route::get('pengaduan/{pengaduan}/delete', 'PengaduanController@destroy')->name('pengaduan.destroy');

    Route::resource("pengaduan","PengaduanController", ['except' => 'destroy']);


});
