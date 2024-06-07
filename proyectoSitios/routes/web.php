<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnrollmentController;


use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('groups', GroupController::class);
Route::resource('users', UserController::class);

Route::get('enrollment', [EnrollmentController::class, 'index']);
Route::post('enrollment', [EnrollmentController::class, 'store']);
Route::get('enrollment/show-courses', [EnrollmentController::class, 'showCourses'])->name('enrollment.showCourses');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
