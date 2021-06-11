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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);
Auth::routes(['register' => false]);
Auth::routes();

Route::get('/', 'pagesController@index')->name('pages');
Route::get('nosotros','pagesController@about')->name('about');
Route::get('barbosa','pagesController@barbosa')->name('barbosa');
Route::get('tiendas','pagesController@estate')->name('estate');
Route::get('salon_eventos','pagesController@event_room')->name('event_room');
Route::get('locales','pagesController@local')->name('local');
Route::get('espacios_publicitarios','pagesController@publicity_place')->name('publicity_place');

Route::get('admin/nosotros','admin_pages\aboutController@index')->name('admin_about');
Route::post('admin/nosotros','admin_pages\aboutController@store')->name('admin_about.store');

Route::get('admin/barbosa','admin_pages\barbosaController@index')->name('admin_barbosa');

Route::get('admin/tiendas','admin_pages\estateController@estate')->name('admin_estate');

Route::get('admin/servicios/salon_eventos','admin_pages\services_event_roomController@event_room')->name('admin_services_event_room');

Route::get('admin/servicios/locales','admin_pages\servicesLocalController@local')->name('admin_services_local');

Route::get('admin/servicios/espacios_publicitarios','admin_pages\servicesPublicityPlaceController@publicity_place')->name('admin_services_publicity_place');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('usuarios','userController@index')->name('users');
Route::post('usuarios','userController@store')->name('users.store');
Route::put('usuarios/{id}','userController@update')->name('users.update');
Route::delete('usuarios/{id}','userController@destroid')->name('users.delete');

Route::get('roles','rolController@index')->name('roles');