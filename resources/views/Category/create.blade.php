@extends('layouts.app')
@section('content')
    <div class="container" style="margin: 0 auto; width: 700px;">

            <form action="{{route('create_category')}}" method="post">
                @csrf
                <div class="form-group create_form">
                    <input type="text" name="name" class="form-control cat_name" placeholder="Category name">
                    <button class="btn btn-dark btn-block mt-3" type="submit"><i class="fa fa-plus-circle" style="font-size: 20px"></i></button>
                </div>
            </form>

    </div>
@endsection
