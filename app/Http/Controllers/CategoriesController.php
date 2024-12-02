<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();

        return view('layout', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categories = Categories::all();

        return view('layout', compact('categories'));
    }
    public function show1($id)
    {
        $category = Categories::findOrFail($id);

        return view('category', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
    }
    public function list(Request $request)
    {
        $categories = DB::table('categories')->get();

        if($request->has('category_id')){
            $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.category_id', $request->category_id)
            ->get();
        } else{
            $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products', 'categories.name as category_name')
            ->get();
        }

        return view('list', compact('products', 'categories'));
    }
}
