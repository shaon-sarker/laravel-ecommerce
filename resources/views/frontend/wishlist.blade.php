@extends('layouts.frontend.master')
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="bg-dark text-white p-4 text-center">My Wishlist</h3>
            @if ($wishlist_item->count() > 0)
            @foreach ($wishlist_item as $data)
            <div class="row product-data">
                <div class="col-md-2">
                    <img src="{{ asset('uploads/product') }}/{{ $data->rtn_product->image }}" alt="" class="w-50">
                </div>

                <div class="col-md-2 pt-4">
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
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $data->product_quantity }}">
                        <button class="input-group-text increment-btn">+</button>
                    </div>
                    {{-- <span class="badge bg-success">In Stock</span> --}}
                    @else
                    <span class="badge bg-danger">Stock Out</span>
                    @endif
                </div>
                <div class="col-md-2 pt-5">
                    <button class="btn btn-success addtoCartbtn"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                </div>
                <div class="col-md-2 pt-5">
                    <button class="btn btn-danger delete-wishlist-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
            @endforeach
            @else
                <h4 class="bg-danger text-white p-3 text-center">There is no wishlist</h4>
                <a href="{{ url('/') }}" class="btn btn-info float-end">Continue the Shopping</a>
            @endif
        </div>
    </div>
</div>
@endsection
