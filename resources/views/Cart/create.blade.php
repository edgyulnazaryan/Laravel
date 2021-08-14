@extends('layouts.app')
@section('content')




    <table class="table table-dark table-hover mt-4">
        <thead>
        <tr>
            <th>Product </th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        </tbody>

        <form action="{{ route('success_form') }}" method="get">
            @csrf
            @foreach($data as $value)
                <tr class="cart">
                    <td><input name="product_id[]" value="{{ $value->product }}" readonly class="bg-dark text-light"></td>
                    <td><input type="text" class="price bg-dark text-light" readonly value="{{ $value->price }}" ></td>
                    <td><input type="number"  class="qty" placeholder="Quantity" name="quantity[]" value="1" min="1" ></td>
                    <td><input type="text" readonly class="subtotal" name="summary[]"></td>
                    <td>
                        <input type="text" name="order_id[]" value="{{$value->order_id}}" hidden >
                        <input type="text" name="employer_id[]" value="{{$value->employer}}" hidden >
                    </td>
                    <td>
                        <a href="{{ route('remove_form', [$value->id, $value->order_id]) }}" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 18px"></i></a>
                    </td>
                </tr>

            @endforeach

            <tr>
                <td><input type="text" style="color:blue;font:20px cursive" id="total" value="0" readonly class="bg-dark"></td>
                <td><button class="btn btn-success btn_send" type="submit" ><i class="fa fa-shopping-cart" style="font-size: 18px"></i></button></td>
            </tr>
        </form>
    </table>


    <script>
        $(document).ready(function ()
        {
            $('.btn_send').attr('disabled','disabled');
            $('.qty').change(function()
            {
                $('.btn_send').removeAttr('disabled')
                updateQuantity(this);
            });


            function updateQuantity(qtyInput) {
                var cartRow = $(qtyInput).closest('tr');
                var price = parseFloat($('.price', cartRow).val());
                var quantity = $('.qty', cartRow).val();
                var subtotal = $('.subtotal', cartRow);
                var linePrice = price * quantity;
                $(subtotal).val(linePrice);
                total_calculate() //call
            }

            function total_calculate() {
                var total = 0;
                //loop through subtotal
                $(".cart .subtotal").each(function() {
                    //chck if not empty
                    var value = $(this).val() != "" ? parseFloat($(this).val()) : 0;
                    total += value; //add that value
                })
                //assign to total span
                $("#total").val(total)
            }
            total_calculate()



        })
    </script>

@endsection
