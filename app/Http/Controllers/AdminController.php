<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index(){
        $user_id = auth()->id();
        $user = User::find($user_id);
        if($user->hasRole('admin')){
            $products = Product::with(['category', 'images'])->orderBy('id', 'DESC')->paginate(10);
            return view('admin.product.index', compact('products'));
        }
            
        abort(403, 'Không có quyền vào');
    }
}
