<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $data = Cart::all();
        return view('Cart.create', compact('data'));
    }
    public function cart($id)
    {
        $cart = new Cart();
        $data = Order::where('id', $id)->with(['product_order', 'employer_order'])->get()->first();
        $cart->employer = $data->employer_order->name;
        $cart->order_id = $id;
        $cart->product = $data->product_order->name;
        $cart->price = $data->product_order->price;

        Order::where('id', $id)->update(['status'=>"Checked"]);
        $cart->save();
        return redirect()->route('order');
        /*$cart->quantity = $request->input('quantity');
        $cart->summary = $request->input('summary');*/


    }
    public function create(Request $request)
    {

        $product_id = $request->product_id;
        $employer_id = $request->employer_id;
        $order_id = $request->order_id;
        $summary = $request->summary;
        $quantity = $request->quantity;

        for ($i=0; $i<count($product_id); $i++)
        {
            $data = Order::where('id', $order_id[$i])->with('product_order')->get()->first();
            $balance = $data->product_order->quantity;
            $new_balance = $balance - $quantity[$i];
            Product::where('id', $data->product_order->id)->update(['quantity'=>$new_balance]);
            Order::where('id', $order_id[$i])->update(['status'=>"Success"]);
            $datasave = [

                'order_id' => $order_id[$i],
                'product_id' => $product_id[$i],
                'employer_id' => $employer_id[$i],
                'summary' => $summary[$i],
            ];
            Sale::insert($datasave);
        }
        Cart::truncate();
        return redirect()->route('order');
    }

    public function remove_cart($id, $order_id)
    {
        Cart::find($id)->delete();
        Order::where('id', $order_id)->update(['status'=>"Unchecked"]);
        return redirect()->route('cart')->with('danger', 'Product removed from cart');
    }
}
