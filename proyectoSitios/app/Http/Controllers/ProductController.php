<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexProducts(){
        return 'Ruta para mostrar los productos';
    }
    public function crateProduct(){
        return 'Ruta para crear el producto';
    } 
    public function updateProduct(){
        return 'Ruta para actualizar el producto';
    }
    public function delteProduct(){
        return 'Ruta para eliminar un producto';
    }
    /* 
    public function viewProduct($argumento){
        Se puede usar el argumento en la función
        print($argumento);
        return 'Ruta para eliminar un producto';
    }*/

}
