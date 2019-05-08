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


Auth::routes();

Route::get('/', 'IndexController@show')->name('main');
Route::get('/about-us', 'AboutUsController@index')->name('aboutUs');
Route::get('/contacts', 'ContactController@index')->name('contact');
Route::post('/contacts', 'ContactController@send')->name('contactSend');
Route::get('/courses', 'CoursesController@index')->name('coursesPage');