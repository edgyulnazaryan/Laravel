<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $data = Employer::all();
        return view('Employer.index', compact('data'));
    }

    public function create()
    {
        return view('Employer.create');
    }

    public function store(Request $request)
    {
        $data = $request->input();
        Employer::create($data);
        return redirect()->route('employer')->with('success', 'Employer created successfully');
    }

    public function employer_remove($id)
    {
        Employer::find($id)->delete();
        return redirect()->route('employer')->with('danger', 'Employer removed...');
    }
}
