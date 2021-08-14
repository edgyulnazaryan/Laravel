@extends('layouts.app')
@section('content')
    <div class="container" style="width: 500px; margin: 0 auto">
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
                    <select name="stock_id" class="form-control" >
                        @foreach($stock as $value)
                            <option value="{{ $value->id }}">{{ $value->address }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control" >
                        @foreach($category as $value)
                            <option value="{{ $value->id }}">{{ $value->name }} </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-dark btn-block cat_btn" type="submit"><i class="fa fa-plus-circle" style="font-size: 20px"></i></button>
            </form>
    </div>
@endsection
