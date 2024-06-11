<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Auth;



use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::resource('/courses', CourseController::class);
Route::resource('/groups', GroupController::class);
Route::resource('/users', UserController::class);
Route::post('/groups/{groupId}/enroll', [GroupController::class, 'enroll'])->name('groups.enroll');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/student/{userId}/groups', [GroupController::class, 'getStudentGroups'])->name('groups.getStudentGroups');
Route::get('/teacher/{userId}/courses', [CourseController::class, 'getTeacherCourses'])->name('groups.getTeacherCourses');