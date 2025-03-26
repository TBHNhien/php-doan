<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            $cats = Category::orderBy('id', 'DESC')->paginate(10);
            return view('admin.category.index', compact('cats'));
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
            return view('admin.category.create');
        }
            
        abort(403, 'Không có quyền vào');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $data = $request->all('name', 'status');
        Category::create($data);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $user_id = auth()->id();
        $user = User::find($user_id);
        if($user->hasRole('admin'))
        {
            return view('admin.category.edit', compact('category'));
        }
            
        abort(403, 'Không có quyền vào');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id
        ]);
        $data = $request->all('name', 'status');
        $category->update($data);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
