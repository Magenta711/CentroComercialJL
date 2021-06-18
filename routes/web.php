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

Route::get('admin/servicios/salon_eventos','admin_pages\services_event_roomController@event_room')->name('admin_services_event_room');

Route::get('admin/servicios/locales','admin_pages\servicesLocalController@local')->name('admin_services_local');

Route::get('admin/servicios/espacios_publicitarios','admin_pages\servicesPublicityPlaceController@publicity_place')->name('admin_services_publicity_place');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('usuarios','userController@index')->name('users');
Route::post('usuarios','userController@store')->name('users.store');
Route::put('usuarios/{id}','userController@update')->name('users.update');
Route::delete('usuarios/{id}','userController@destroy')->name('users.delete');

Route::get('roles','rolController@index')->name('roles');

Route::get('admin/locales','localsController@index')->name('locals');
Route::get('admin/locales/crear','localsController@create')->name('locals.create');
Route::post('admin/locales','localsController@store')->name('locals.store');
Route::get('admin/locales/{id}','localsController@show')->name('locals.show');
Route::get('admin/locales/{id}/editar','localsController@edit')->name('locals.edit');
Route::put('admin/locales/{id}','localsController@update')->name('locals.update');
Route::get('admin/locales/{id}/add','localsController@add')->name('locals.add');
Route::patch('admin/locales/{id}','localsController@save')->name('locals.save');
Route::delete('admin/locales/{id}/add','localsController@delete')->name('locals.delete');

Route::post('files/{id}/{type}','filesController@upload')->name('files.upload');

Route::get('formularios','formsController@index')->name('forms');
Route::post('formularios','formsController@store')->name('forms.store');