<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class HomeController extends Controller
{
    public function index(){
        
        return view('home.index');
    }
    // public function shop(){
    //     $products = Product::orderBy('id', 'DESC')->paginate(9);
    //     return view('home.shop', compact('products'));
    // }
    // public function detail(int $id){
    //     $product = Product::find($id);
    //     return view('admin.product.detail', compact('product'));
    // }
}
