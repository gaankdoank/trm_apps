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

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/superuser', 'SuperuserController@index')->name('superuser')->middleware('superuser');
Route::get('/ip_planning', 'IpplanningController@index')->name('ip_planning')->middleware('ip_planning');
Route::get('/foplanning', 'FoplanningController@index')->name('foplanning')->middleware('foplanning');
Route::get('/businessdev', 'BusinessdevController@index')->name('businessdev')->middleware('businessdev');