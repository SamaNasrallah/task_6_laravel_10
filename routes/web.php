<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('course.login');
});
Route::get('home', function () {
    return view('home');
});

Route::get('student', function () {
    return view('student.createSt');
});

Route::get('stdC', function () {
    return view('admin.stdCor');
});



Route::resource('login', UserController::class) ;
 Route::resource('course', CourseController::class) ;
 Route::resource('category', CategoryController::class) ;
 Route::resource('student', StudentController::class) ;
 Route::resource('course-students', CourseStudentController::class);
 Route::resource('payment', PaymentController::class) ;
 Route::get('payments/create/{course_student_id}', 'App\Http\Controllers\PaymentController@create')->name('payments.create');
 Route::post('payments/{course_student_id}', 'App\Http\Controllers\PaymentController@store')->name('payments.store');
 Route::get('payments/index/{course_student_id}', 'App\Http\Controllers\PaymentController@index')->name('payment.index');
 Route::get('payments/view/{course_student_id}', 'App\Http\Controllers\PaymentController@show')->name('payments.show');

 
Route::get('reg/create/{course_id}', 'App\Http\Controllers\CourseStudentController@create')->name('register.create');
Route::get('reg/{course_id}', 'App\Http\Controllers\CourseStudentController@index')->name('register.index');
Route::post('reg/{course_id}', 'App\Http\Controllers\CourseStudentController@store')->name('register.store');



 Route::patch('students/{student}', 'App\Http\Controllers\StudentController@toggleActivation')->name('student.toggleActivation');










