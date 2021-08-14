<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with('employer_order')->get();
        $product = Product::all();
        return view('Order.index', compact('order',  'product'));
    }
    public function order_remove($id)
    {
        Order::find($id)->delete();
        return redirect()->route('order')->with('danger', 'Order removed...');
    }
}
