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

Route::get('/regist', 'Auth\RegisterController@index')->name('registration');
Route::get('/getAjaxFaculty', 'Auth\RegisterController@getAjaxFaculty')->name('getAjaxFaculty');
Route::get('/getAjaxGroups', 'Auth\RegisterController@getAjaxGroups')->name('getAjaxGroups');
Route::post('/regist', 'Auth\RegisterController@save')->name('saveUser');
Route::get('/logout', function(){
   \Illuminate\Support\Facades\Auth::logout();
   return redirect()->route('main');
});

Auth::routes();
Route::get('/', 'IndexController@show')->name('main');
Route::get('/about-us', 'AboutUsController@index')->name('aboutUs');

Route::get('/contacts', 'ContactController@index')->name('contact');
Route::post('/contacts', 'ContactController@send')->name('contactSend');

Route::get('/courses', 'CoursesController@index')->name('coursesPage');
Route::get('/learn/{category}/{course}', 'CoursesController@singleCourse')->name('singeCourse');
Route::get('/learn/{category}/{course}/{lesson}', 'LessonsController@index')->name('singeLesson');
Route::get('/subscribe/{id}', 'CoursesController@subscribe')->name('subscribeCourse');
Route::get('/unsubscribe/{id}', 'CoursesController@unsubscribe')->name('unSubscribeCourse');

Route::get('/category/{url}', 'CategoriesController@index')->name('CategoryPage');

Route::post('/search', 'SearchController@index')->name('SearchPage');
Route::get('/search/author/{id}', 'SearchController@getAuthor')->name('getAuthor');

Route::group(['prefix' => 'adm', 'middleware' => 'auth'], function () {
        Route::get('/', 'Admin\AdminController@index')->name('main-admin');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/delete/{id}', 'Admin\UserController@delete')->name('delete-user');
        Route::get('/active/{id}', 'Admin\UserController@active')->name('active-user');
        Route::post('/change-password/{id}', 'Admin\UserController@changePassword')->name('change-password');
        Route::post('/change-profile/{id}', 'Admin\UserController@changeProfile')->name('change-profile');

    });

});