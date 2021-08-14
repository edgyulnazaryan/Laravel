@extends('layouts.app')
@section('content')

    <div class="container">
        <div style="width: 500px; margin: 0 auto">
            <form action="{{route('create_stock')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="address" name="address" class="form-control" placeholder="Stock address">
                </div>
                <div class="form-group">
                    <select name="employer_id" class="form-control">
                        @foreach($employer as $value)
                        <option value="{{ $value->id }}">{{ $value->name }} {{ $value->surname }}</option>
                        @endforeach
                    </select>
                </div>


                <button class="btn btn-dark btn-block cat_btn" type="submit"><i class="fa fa-plus-circle" style="font-size: 20px"></i></button>
            </form>
        </div>
    </div>
@endsection
