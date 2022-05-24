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
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('user', 'UserController')->middleware('admin');
    Route::resource('siswa', 'SiswaController');
    Route::post('siswaimport/upload', 'SiswaImportController@upload')->name('siswa.import');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
