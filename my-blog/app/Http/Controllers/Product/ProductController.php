<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        return "Controller - Product list";
    }
    public function detail($product){
        return "Controller - productList: $product";
    }
}
