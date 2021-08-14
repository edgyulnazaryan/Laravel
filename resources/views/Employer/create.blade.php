@extends('layouts.app')
@section('content')

    <div class="container">
        <div style="width: 500px; margin: 0 auto">
            <form action="{{route('create_employer')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Employer name">
                </div>
                <div class="form-group">
                    <input type="text" name="surname" class="form-control" placeholder="Employer surname">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Employer email">
                </div>
                <div class="form-group">
                    <input type="phone" name="phone" class="form-control" placeholder="Employer phone">
                </div>
                <div class="form-group">
                    <input type="number" name="salary" class="form-control" placeholder="Employer salary">
                </div>


                <button class="btn btn-dark btn-block cat_btn" type="submit"><i class="fa fa-plus-circle" style="font-size: 20px"></i></button>
            </form>
        </div>
    </div>
@endsection
