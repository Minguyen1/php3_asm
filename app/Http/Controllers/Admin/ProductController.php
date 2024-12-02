<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('category')->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name|max:255',
            'img' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'description' => 'required|max:500',
            'category_id' => 'required|exists:categories,id'
        ]);

        $img_path = null;
        if($request->hasFile('img')){
            $img_path = $request->file('img')->store('image', 'public');
        }

        Products::create([
            'name' => $request->name,
            'img' => $img_path,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' =>$request->category_id
        ]);

        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Products::findOrFail($id);

        $categories = Categories::all();

        return view('admin.product.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $products = Products::findOrFail($id);

        $data = $request->except('img');
        if($request->hasFile('img')){
            $img_path = $request->file('img')->store('image', 'public');
            $data['img'] = $img_path;
        }

        if($products->img){
            Storage::delete('public/' . $products->img);
        }

        $products->update($data);

        return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        if($product->img){
            Storage::delete('public/' . $product->img);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
