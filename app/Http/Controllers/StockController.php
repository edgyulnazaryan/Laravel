<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $data = Stock::all();

        return view('Stock.index', compact('data'));
    }

    public function create()
    {
        $employer = Employer::all();
        return view('Stock.create', compact('employer'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        Stock::create($data);
        return redirect()->route('stock')->with('success', 'Stock created successfully');
    }

    public function stock_remove($id)
    {
        Stock::find($id)->delete();
        return redirect()->route('stock')->with('danger', 'Stock removed...');
    }
}
