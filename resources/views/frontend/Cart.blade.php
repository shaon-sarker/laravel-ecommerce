@extends('layouts.frontend.master')
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            @php
                $total = 0;
            @endphp
            @forelse ($cartsitem as $data)
            <div class="row product-data">
                <div class="col-md-3">
                    <img src="{{ asset('uploads/product') }}/{{ $data->rtn_product->image }}" alt="" class="w-50">
                </div>

                <div class="col-md-3 pt-4">
                    <h5 class="text-bold">Product Name</h5>
                    <h6>{{ $data->rtn_product->name }}</h6>
                </div>
                <div class="col-md-2 pt-4">
                    <h5 class="text-bold">Product Price</h5>
                    <h6>Tk {{ $data->rtn_product->selling_price }}</h6>
                </div>
                <div class="col-md-2 pt-4">
                    <input type="hidden" class="product_id" value="{{ $data->product_id }}">

                    @if ($data->rtn_product->quantity > $data->product_quantity)
                    <label for="">Quantity</label>
                    <div class="input-group text-center mb-3 w-75">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $data->product_quantity }}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>

                    @php
                    $total += $data->rtn_product->selling_price * $data->product_quantity;
                    session([
                        'total'=>$total,
                        ]);
                    @endphp
                    @else
                    <span class="badge bg-danger">Stock Out</span>
                    @endif
                </div>
                <div class="col-md-2 pt-5">
                    <button class="btn btn-sm btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>

            @empty
                <h6 class="text-white bg-danger p-3 text-center">No Cart Item</h6>
            @endforelse
        </div>
        <div class="card-footer font-weight-bold">
            <h6>Total Price: {{ $total }}</h6>
            <a href="{{ url('/checkout') }}" class="btn btn-outline-success float-end">Procced to Checkout</a>
        </div>
    </div>
</div>
@endsection
