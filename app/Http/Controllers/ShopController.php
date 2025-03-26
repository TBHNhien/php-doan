<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::orderBy('id', 'DESC')->paginate(9);
        return view('shop.index', compact('products', 'categories'));
    }
    public function product(Product $product){
        
        return view('shop.detail', compact('product'));
    }
    public function productsByCategory($category_id){
        
        $products = Product::where('category_id', $category_id)->get();
        // return view('shop.index', compact('products'));
        
        return response()->json(['success' => true, 'products' => $products]);
    }
}
