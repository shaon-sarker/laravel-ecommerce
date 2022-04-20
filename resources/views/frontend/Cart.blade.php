@extends('layouts.frontend.master')
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            @forelse ($cartsitem as $data)
            <div class="row product-data">
                <div class="col-md-3">
                    <img src="{{ asset('uploads/product') }}/{{ $data->rtn_product->image }}" alt="" class="w-50">
                </div>

                <div class="col-md-3">
                    <h5 class="text-bold">Product Name</h5>
                    <h6>{{ $data->rtn_product->name }}</h6>
                </div>
                <div class="col-md-3">
                    <label for="">Quantity</label>
                    <input type="hidden" class="product_id" value="{{ $data->product_id }}">
                        <div class="input-group text-center mb-3 w-50">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $data->product_quantity }}">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-sm btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
            @empty
                <h6 class="text-white bg-danger p-3 text-center">No Cart Item</h6>
            @endforelse

        </div>
    </div>
</div>
@endsection
