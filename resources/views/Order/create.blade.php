@extends('layouts.app')
@section('content')

    <form action="{{route('order_confirm')}}" method="post">
        @csrf
        <table class="table table-dark table-hover table-striped ">
            <thead>
            <tr>
                <th>Product ID</th>
                <th>Employer ID</th>
                <th>Date order</th>
                <th>Delivery order</th>
                <th>Date order</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <input type="text" name="product_id" value="{{ $data->id }}" hidden>

                <td>{{$data->name}}</td>
                <td>
                    <select name="employer_id" class="form-control">
                        @foreach($employer as $value)
                            <option value="{{ $value->id }}">{{ $value->name . " " .$value->surname }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="date" name="date" class="form-control"></td>
                <td><input type="date" name="deliver" class="form-control"></td>
                <td><select name="status" class="form-control">
                        <option value="Unchecked"> Unchecked </option>
                        <option value="Checked" disabled>  Checked  </option>
                        <option value="Late" disabled>     Late  </option>
                        <option value="Success" disabled>  Success  </option>
                    </select>
                </td>
                <td>
                    <input type="submit" class="btn btn-warning" value="Confirm">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
@endsection
