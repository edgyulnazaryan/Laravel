<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class User_CategoryContoller extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('User.Category.index', compact('data'));
    }
}
