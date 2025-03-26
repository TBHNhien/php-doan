<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Mail;
class CartController extends Controller
{
    public function index(){
        $no = 0;
        $total = 0;
        $au = auth()->user();
        $carts = Cart::where('user_id', auth()->id())->get();
        foreach($carts as $car){
            $total = $total + ($car->price * $car->quantity);
        }
        return view('shop.cart', compact('no', 'total', 'au'));
    }
    public function add(Product $product, Request $req){
        $quantity = $req->quantity ? floor($req->quantity) : 1;
        
        
        $user_id = auth()->id();
        $existingCart = Cart::where([
            'user_id' => $user_id,
            'product_id' => $product->id])->first();
        if($existingCart){
            Cart::where([
                'user_id' => $user_id,
                'product_id' => $product->id
            ])->increment('quantity', $quantity);
            // $existingCart->update([
            //     'quantity' => $existingCart->quantity + 1
            // ]);
            return redirect()->route('cart.index');
        }else{
            $data = [
                'user_id' => $user_id,
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => $quantity
            ];
            if(Cart::create($data)){
                return redirect()->route('cart.index');
            }
        }
        
        
        return redirect()->back();
        
    }
    public function update(Product $product, Request $req){
        $quantity = $req->quantity ? floor($req->quantity) : 1;
        $user_id = auth()->id();
        $existingCart = Cart::where([
            'user_id' => $user_id,
            'product_id' => $product->id
        ])->first();

        if($existingCart){
            
            Cart::where([
                'user_id' => $user_id,
                'product_id' => $product->id
            ])->update([
                'quantity' => $quantity
            ]);
            return redirect()->route('cart.index');
        }else{
            $data = [
                'user_id' => $user_id,
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => $quantity
            ];
            if(Cart::create($data)){
                return redirect()->route('cart.index');
            }
        }
    }
    public function delete($product_id){
        $user_id = auth()->id();
        Cart::where([
            'user_id' => $user_id,
            'product_id' => $product_id
        ])->delete();
        return redirect()->back();
    }
    public function clear(){
        Cart::where([
            'customer_id' => auth()->id()

        ])->delete();
        return redirect()->back();
    }
    public function p_checkout(Request $req){
        $au = auth()->user();
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $data = $req->only('name', 'email', 'phone', 'address');
        $data['user_id'] = $au->id;
        if($order = Order::create($data)){
            $token = \Str::random(45);
            foreach($au->carts as $cart){
                $data_order_detail = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price,
                ];
                Order_Detail::create($data_order_detail);
            }
            
            //$au->carts->delete();

            //Send Mail to verify Order
            $order->order_token = $token;
            $order->save();
            Mail::to($au->email)->send(new OrderMail($order, $token));
            return redirect()->route('order.success');
            
         }
         return abort(404);
    }
    public function verify($token){
        $order = Order::where('order_token', $token)->first();
        if($order){
            //$order->order_token = null;
            $order->status = 1;
            $order->save();
            return redirect()->route('order.success_verify');
        }
        return abort(404);

    }
    public function success(){
        return view('shop.success');
    }
    public function success_verify(){
        return view('shop.success_verify');
    }
}
