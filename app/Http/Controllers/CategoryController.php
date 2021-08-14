<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('Category.index', compact('data'));
    }

    public function create()
    {
        return view('Category.create');
    }

    public function store(Request $request)
    {
        $data = $request->input();
        Category::create($data);
        return redirect()->route('category')->with('success', 'Category created successfully');
    }
    public function category_remove($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category')->with('danger', 'Category removed...');
    }



}
