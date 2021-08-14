@extends('layouts.app')
@section('content')
    <style>
        .container
        {
            position: relative;
            left: 1050px;
            bottom: 80px;
        }
        table
        {
            font-size: 18px;
        }
    </style>
    <table class="table table-dark table-hover table-striped " style="width:270px">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Employer</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->quantity }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->employer }}</td>
                <td>
                    <a href="/" class="btn btn-warning"><i class="fa fa-edit"  style="font-size: 18px"></i></a>
                    <a href="" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 18px"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="container">
        <div class="d-flex justify-content-right">
            <form action="{{route('create_product')}}" method="post">
                @csrf
                <div class="form-group">

                    <input type="text" name="name" class="form-control" placeholder="Product name">
                </div>

                <div class="form-group">
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                </div>

                <div class="form-group">
                    <input type="number" name="price" class="form-control" placeholder="Price">
                </div>

                <div class="form-group">
                    <select name="employer_id" class="form-control">
                        <option value=""></option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="stock_id" class="form-control" >
                        <option value=""></option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control" >
                        <option value=""></option>
                    </select>
                </div>

                <button class="btn btn-dark btn-block cat_btn" type="submit"><i class="fa fa-plus-circle" style="font-size: 20px"></i></button>
            </form>
        </div>
    </div>
@endsection
