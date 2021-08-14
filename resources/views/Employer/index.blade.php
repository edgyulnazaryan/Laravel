@extends('layouts.app')
@section('content')
    <style>

        table
        {
            font-size: 18px;
        }
    </style>
    <a class="btn btn-dark cat_btn" href="{{ route('employer_form') }}"  style="position:relative;left: 97%">
        <i class="fa fa-plus-circle" style="font-size: 20px"></i>
    </a>
    <table class="table table-dark table-hover table-striped " style="width:1000px; margin: 0 auto">
        <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->surname }}</td>
                <td>{{ $value->phone }}</td>
                <td>{{ $value->salary }}</td>
                <td>
                    <a href="/" class="btn btn-warning"><i class="fa fa-edit"  style="font-size: 18px"></i></a>
                    <a href="{{ route('employer_remove', $value->id) }}" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 18px"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
