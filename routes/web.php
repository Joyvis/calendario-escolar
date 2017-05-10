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

Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'UserController@index');

	Route::resource('user', 'UserController');
	Route::resource('teacher', 'TeacherController');
	Route::resource('classroom', 'ClassroomController');
	Route::get('/classroom_report_absences/{year?}/{classroom?}', 'ClassroomController@reportAbsences')->name('classroom.report_absences');	

	Route::resource('student', 'StudentController');

	Route::get('/calendar', 'CalendarController@index')->name('calendar.index');
	Route::post('/calendar', 'CalendarController@saveCalendar')->name('calendar.save');

	Route::get('/student_absences/{id?}', 'CalendarController@studentAbsenceIndex')->name('student_absence.index');
	Route::post('/student_absences/save', 'CalendarController@saveStudentAbsence')->name('student_absence.save');
	Route::post('/student_by_classroom', 'StudentController@getByClassroom')->name('student.get_by_classroom');
});
Auth::routes();

