<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        $au = auth()->user();
        return view('shop.checkout', compact('au'));
    }
    public function p_checkout(){
        
    }
}
