<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use Database\Factories\ProductFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('Product.index', compact('data'));
    }

    public function create()
    {
        $category = Category::all();
        $stock = Stock::all();
        return view('Product.create', compact( 'stock', 'category'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        Product::create($data);
        return redirect()->route('product')->with('success', 'Product created successfully');
    }


    public function order($id)
    {
        $employer = Employer::all();
        $data = Product::where('id', $id)->get()->first();
        return view('Order.create', compact('data', 'employer'));
    }

    public function order_confirm(Request $request)
    {
        $data = $request->input();
        Order::create($data);
        return redirect()->route('order');
    }

    public function product_remove($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product')->with('danger', 'Product removed...');
    }
}
