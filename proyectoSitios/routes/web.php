<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Route::get('/', HomeController::class);

Route::get('/productView', [ProductController::class, 'indexProduct']);

Route::get('/productCreate', [ProductController::class, 'crateProduct']);

Route::get('/productUpdate', [ProductController::class, 'updateProduct']);

Route::get('/productDelete', [ProductController::class, 'delteProduct']);

#Pasar ruta con un argumento
#Si hay una ruta similar, osea que tenga el mismo nombre pero va a recibir un argumento. Primero debes colocar la ruta con el argumento
#Route::get('/productView/{argumento}', [ProductController::class, '']);



