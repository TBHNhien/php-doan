<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $user = User::find($user_id);
        if($user->hasRole('admin'))
        {
            $products = Product::with(['category', 'images'])->orderBy('id', 'DESC')->paginate(10);

            return view('admin.product.index', compact('products'));
        }
            
        abort(403, 'Không có quyền vào');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->id();
        $user = User::find($user_id);
        if($user->hasRole('admin'))
        {
            $cats = Category::orderBy('id', 'DESC')->paginate(10);
            return view('admin.product.create', compact('cats'));
        }
            
        abort(403, 'Không có quyền vào');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'quantity' => 'required',
            'price' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'status' => 'required|boolean',
            'image' => 'required'
        ]);
        $data = $request->all('name', 'status', 'price', 'content', 'quantity', 'category_id');
        if($request->hasFile('image')){
            $image = $request->file('image');
            
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName; // Lưu tên của tệp ảnh vào cơ sở dữ liệu
        }
        $product = Product::create($data);
        
        if($request->hasFile('moreImages')){
            
            $count = count($request->file('moreImages'));
            for($i=0; $i<$count; $i++){
                $image = $request->file('moreImages')[$i];
                $imageName = time().rand(1,100).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                ProductImages::create(['product_id' => $product->id, 'imageURL' => $imageName]);
            }
            
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $user_id = auth()->id();
        $user = User::find($user_id);
        if($user->hasRole('admin'))
        {
            $cats = Category::all();
            return view('admin.product.edit', compact('product', 'cats'));
        }
            
        abort(403, 'Không có quyền vào');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,'.$product->id,
            'quantity' => 'required',
            'price' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'status' => 'required|boolean',
            
        ]);

        $data = $request->all('name', 'status', 'price', 'content', 'quantity', 'category_id');
        if($request->hasFile('image')){
            $image = $request->file('image');
            
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName; // Lưu tên của tệp ảnh vào cơ sở dữ liệu
        }
        $product->update($data);
        
        if($request->hasFile('moreImages')){
            
            if($product->images()->exists())
                ProductImages::where('product_id', $product->id)->delete();
            $count = count($request->file('moreImages'));
            for($i=0; $i<$count; $i++){
                $image = $request->file('moreImages')[$i];
                $imageName = time().rand(1,100).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                ProductImages::create(['product_id' => $product->id, 'imageURL' => $imageName]);
                
            }
            
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
    
}
