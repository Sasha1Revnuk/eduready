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

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/add', 'Admin\CategoriesController@add')->name('addCategories');
        Route::get('/edit/{id}', 'Admin\CategoriesController@edit')->name('editCategories');
        Route::get('/delete/{id}', 'Admin\CategoriesController@delete')->name('deleteCategories');
        Route::post('/save', 'Admin\CategoriesController@save')->name('category-save');
        Route::post('/update', 'Admin\CategoriesController@update')->name('category-update');

    });

    Route::group(['prefix' => 'courses'], function () {
        Route::get('/add', 'Admin\CoursesController@add')->name('addCourse');
        Route::get('/edit', 'Admin\CoursesController@edit')->name('editCourse');
        Route::get('/update', 'Admin\CoursesController@update')->name('updateCourse');
        Route::get('/delete', 'Admin\CoursesController@delete')->name('deleteCourse');
        Route::get('/conf-delete', 'Admin\CoursesController@confDelete')->name('confDeleteCourse');
        Route::post('/save', 'Admin\CoursesController@save')->name('saveCourse');
    });

    Route::group(['prefix' => 'sections'], function () {
        Route::get('/add', 'Admin\SectionsController@add')->name('addSection');
        Route::get('/edit', 'Admin\SectionsController@edit')->name('editSection');
        Route::get('/update', 'Admin\SectionsController@update')->name('updateSection');
        Route::get('/conf-delete', 'Admin\SectionsController@confDelete')->name('confDeleteSection');
        Route::get('/delete', 'Admin\SectionsController@delete')->name('deleteSection');
        Route::post('/save', 'Admin\SectionsController@save')->name('saveSection');

    });
    Route::group(['prefix' => 'lessons'], function () {
        Route::get('/add', 'Admin\LessonsController@add')->name('addLesson');
        Route::get('/edit', 'Admin\LessonsController@edit')->name('editLesson');
        Route::get('/update', 'Admin\LessonsController@update')->name('updateLesson');
        Route::get('/conf-delete', 'Admin\LessonsController@confDelete')->name('confDeleteLesson');
        Route::get('/delete', 'Admin\LessonsController@delete')->name('deleteLesson');
        Route::post('/save', 'Admin\LessonsController@save')->name('saveLesson');

    });

    Route::group(['prefix' => 'tests'], function () {
        Route::get('/', 'Admin\TestsController@index')->name('tests');
        Route::get('/add', 'Admin\TestsController@add')->name('testsAdd');
        Route::get('/edit', 'Admin\TestsController@update')->name('testsEdit');
        Route::post('/save', 'Admin\TestsController@save')->name('testsSave');
    });
});