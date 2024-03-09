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



#Grupo de rutas
Route::controller(ProductController::class)->group(function(){
    
    #Pasar ruta con un argumento
    #Si hay una ruta similar, osea que tenga el mismo nombre pero va a recibir un argumento. Primero debes colocar la ruta con el argumento
    Route::get('/productView/{producto}', 'viewProduct');
    
    Route::get('/productView', 'indexProducts');

    Route::get('/productCreate', 'crateProduct');

    Route::get('/productUpdate', 'updateProduct');

    Route::get('/productDelete', 'deleteProduct');
});



