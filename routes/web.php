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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'AdminController@index')->name('dashboard');

//Doctores
Route::get('/doctors/create', 'DoctorController@create')->name('doctor.create');
Route::get('/doctors/{doctor}/edit', 'DoctorController@editar')->name('doctor.edit');
Route::post('/doctors', 'DoctorController@store')->name('doctor.store');
Route::put('/doctors/{doctor}', 'DoctorController@update')->name('doctor.update');
Route::delete('/doctors/{doctor}', 'DoctorController@destroy')->name('doctor.destroy');
//Pacientes


//Especialidades
Route::get('/specialties', 'SpecialtyController@index')->name('specialty');
Route::get('/specialties/create', 'SpecialtyController@create')->name('specialty.create');
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit')->name('specialty.edit');
Route::post('/specialties', 'SpecialtyController@store')->name('specialty.store');
Route::put('/specialties/{specialty}', 'SpecialtyController@update')->name('specialty.update');
Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy')->name('specialty.destroy');

//Schedule
Route::get('/schedule', 'ScheduleController@edit')->name('schedule');
Route::post('/schedule', 'ScheduleController@store')->name('schedule.store');

/*
Route::get('/courses', 'CourseController@index')->name('asignatura');
Route::get('/courses/create', 'CourseController@create')->name('asignatura.create');
Route::get('/courses/{course}/edit', 'CourseController@edit')->name('asignatura.edit');
Route::post('/courses', 'CourseController@store')->name('asignatura.store');
Route::put('/courses/{course}', 'CourseController@update')->name('asignatura.update');
Route::delete('/courses/{course}', 'CourseController@destroy')->name('asignatura.destroy');
*/