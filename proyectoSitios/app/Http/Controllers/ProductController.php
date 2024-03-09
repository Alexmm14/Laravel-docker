<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexProducts(){
        return view('product.indexProducts');
    }
    public function crateProduct(){
        return view('product.createProduct');
    } 
    public function updateProduct(){
        return view('product.updateProduct');
    }
    public function deleteProduct(){
        return view('product.deleteProduct');
    }
    
    public function viewProduct($producto){
        #Se puede usar el argumento en la función
        #print($argumento);
        return view('product.viewProduct', compact('producto'));
    }
}
