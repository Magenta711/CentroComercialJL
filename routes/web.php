<?php

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

Route::get('admin/carrucel','admin_pages\sliderController@index')->name('admin_slider');
Route::get('admin/carrucel/crear','admin_pages\sliderController@create')->name('admin_slider.create');
Route::post('admin/carrucel','admin_pages\sliderController@store')->name('admin_slider.store');
Route::get('admin/carrucel/{id}','admin_pages\sliderController@edit')->name('admin_slider.edit');
Route::put('admin/carrucel/{id}','admin_pages\sliderController@update')->name('admin_slider.update');
Route::post('admin/carrucel/{id}','admin_pages\sliderController@destroy')->name('admin_slider.delete');

Route::get('admin/nosotros','admin_pages\aboutController@index')->name('admin_about');
Route::post('admin/nosotros','admin_pages\aboutController@store')->name('admin_about.store');

Route::get('admin/barbosa','admin_pages\barbosaController@index')->name('admin_barbosa');

Route::get('admin/tiendas','admin_pages\estateController@estate')->name('admin_estate');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('usuarios','userController@index')->name('users');
Route::post('usuarios','userController@store')->name('users.store');
Route::put('usuarios/{id}','userController@update')->name('users.update');
Route::delete('usuarios/{id}','userController@destroy')->name('users.delete');

Route::get('roles','rolController@index')->name('roles');

Route::get('admin/servicios/locales','localsController@index')->name('locals');
Route::get('admin/servicios/locales/crear','localsController@create')->name('locals.create');
Route::post('admin/servicios/locales','localsController@store')->name('locals.store');
Route::get('admin/servicios/locales/{id}','localsController@show')->name('locals.show');
Route::get('admin/servicios/locales/{id}/editar','localsController@edit')->name('locals.edit');
Route::put('admin/servicios/locales/{id}','localsController@update')->name('locals.update');
Route::get('admin/servicios/locales/{id}/add','localsController@add')->name('locals.add');
Route::patch('admin/servicios/locales/{id}','localsController@save')->name('locals.save');
Route::post('admin/servicios/locales/{id}','localsController@destroy')->name('locals.delete');

Route::post('files/{id}/{type}','filesController@upload')->name('files.upload');

Route::get('formularios','formsController@index')->name('forms');
Route::post('formularios','formsController@store')->name('forms.store');

Route::get('admin/servicios/espacios_publicitarios','publicityPlaceController@index')->name('publicity_place');
Route::get('admin/servicios/espacios_publicitarios/crear','publicityPlaceController@create')->name('publicity_place.create');
Route::post('admin/servicios/espacios_publicitarios','publicityPlaceController@store')->name('publicity_place.store');
Route::get('admin/servicios/espacios_publicitarios/{id}','publicityPlaceController@show')->name('publicity_place.show');
Route::get('admin/servicios/espacios_publicitarios/{id}/editar','publicityPlaceController@edit')->name('publicity_place.edit');
Route::put('admin/servicios/espacios_publicitarios/{id}','publicityPlaceController@update')->name('publicity_place.update');
Route::get('admin/servicios/espacios_publicitarios/{id}/add','publicityPlaceController@add')->name('publicity_place.add');
Route::patch('admin/servicios/espacios_publicitarios/{id}','publicityPlaceController@save')->name('publicity_place.save');
Route::post('admin/servicios/espacios_publicitarios/{id}','publicityPlaceController@destroy')->name('publicity_place.delete');

Route::get('admin/servicios/salon_eventos','servicesEventRoomController@index')->name('event_room');