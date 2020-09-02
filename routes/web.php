<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', 'MainController@home');


Auth::routes();
Route::get('/logout', function(){
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');



Route::get('/courses', 'CoursesController@courses')->name('courses.index');
Route::get('/courses/{slug}', 'CoursesController@course')->name('courses.show');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/instructor/overview', 'InstructorController@index' )->name('instructor.index');
Route::get('/instructor/new', 'InstructorController@create' )->name('instructor.create');
Route::post('/instructor/store', 'InstructorController@store')->name('instructor.store');
Route::get('/instructor/{id}/edit', 'InstructorController@edit')->name('instructor.edit');
Route::put('/instructor/{id}/update', 'InstructorController@update')->name('instructor.update');
Route::get('/instructor/{id}/destroy', 'InstructorController@destroy')->name('instructor.destroy');
Route::get('/instructor/{id}/publish', 'InstructorController@publish')->name('instructor.publish');


Route::get('/instructor/{id}/pricing', 'PriceController@pricing')->name('pricing.index');
Route::post('/instructor/{id}/pricing/store', 'PriceController@store')->name('pricing.store');


Route::get('/instructor/{id}/curriculum', 'CurriculumController@index')->name('instructor.curriculum.index');
Route::get('/instructor/{id}/curriculum/add', 'CurriculumController@create')->name('instructor.curriculum.add');
Route::post('/instructor/{id}/curriculum/store', 'CurriculumController@store')->name('instructor.curriculum.store');
Route::get('/instructor/{id}/curriculum/{section}/edit', 'CurriculumController@edit')->name('instructor.curriculum.edit');
Route::get('/instructor/{id}/curriculum/{section}/delete', 'CurriculumController@delete')->name('instructor.curriculum.delete');


Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/{id}/store', 'CartController@store')->name('cart.store');
