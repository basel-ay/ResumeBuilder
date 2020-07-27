<?php

use Illuminate\Support\Facades\Auth;
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
    return view('main');
})->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {

    Route::resource('user-detail', 'UserDetailController');

    Route::resource('education', 'EducationController');

    Route::resource('experience', 'ExperienceController');

    Route::resource('skill', 'SkillController');

    Route::get('resume', 'ResumeController@index')->name('resume.index');
    Route::get('resume/download', 'ResumeController@download')->name('resume.download');

});

