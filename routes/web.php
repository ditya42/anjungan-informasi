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





    //users
    Route::get('/users/data','UserController@data')->name('users.data');
    Route::resource("users", "UserController");


    //jabatan
    Route::get('/jabatan/data','JabatanController@data')->name('jabatan.data');

    Route::get('jabatan/{jabatan}/delete', 'JabatanController@destroy')->name('jabatan.destroy');
    Route::resource("jabatan", "JabatanController", ['except' => 'destroy']);




});

// End admin


Route::namespace('frontend')->group(function () {

    Route::get('/', 'IndexController@index')->name('index');


});

Route::namespace('guest')->group(function () {

    Route::get('/pengaduan/data','PengaduanController@data')->name('pengaduan.data');

    Route::get('pengaduan/{pengaduan}/delete', 'PengaduanController@destroy')->name('pengaduan.destroy');

    Route::resource("pengaduan","PengaduanController", ['except' => 'destroy']);


});
