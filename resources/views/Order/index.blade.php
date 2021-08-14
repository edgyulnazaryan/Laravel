@extends('layouts.app')
@section('content')

    <a class="btn btn-dark cat_btn" href="{{ route('product') }}"  style="position:relative;left: 97%">
        <i class="fa fa-plus-circle" style="font-size: 20px"></i>
    </a>
    <table class="table table-dark table-hover table-striped ">
        <thead>
        <tr>
            <th>Product </th>
            <th>Employer </th>
            <th>Date order</th>
            <th>Delivery order</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>

        @foreach($order as $val)
        @if($val->status == 'Success')
        <tr style="background-color: #38c172;">
        @elseif($val->status == 'Checked')
        <tr style="background-color: #f6993f">
        @else
        <tr>
        @endif
            <td>{{ $val->product_order->name}}</td>
            <td>{{ $val->employer_order->name ." ". $val->employer_order->surname }}</td>
            <td>{{ $val->date }}</td>
            <td>{{ $val->deliver }}</td>
            <td>{{ $val->status }}</td>
            <td>

                <a href="{{ route('order_remove', $val->id) }}" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 18px"></i></a>
                @if($val->status == 'Checked' || $val->status == 'Success')
                <span></span>
                @else
                <a href="{{ route('shop_cart', $val->id) }}"  class="btn btn-info btn_check"><i class="fa fa-check" style="font-size: 18px"></i></a>
                @endif
            </td>
        </tr>
        @endforeach

    </table>

<script>
$(document).ready(function ()
{
    var i=0
    $(".btn_check").click(function ()
    {

    });
})
</script>
@endsection
