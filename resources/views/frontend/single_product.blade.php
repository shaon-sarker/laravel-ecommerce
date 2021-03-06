@extends('layouts.frontend.master')
@section('content')
<div class="container-fluid bg-warning pt-1 pb-1">
    <div class="container">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb pt-2">
              <li class="breadcrumb-item fs-5 fw-bold text-dark">Home</li>
              <li class="breadcrumb-item fs-5 fw-bold"><a href="#" class="text-dark">Product</a></li>
              <li class="breadcrumb-item fs-5 fw-bold"><a href="#" class="text-dark">Single Product Page</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mt-5 mb-5">
       <div class="card shadow product-data">
           <div class="card-body">
               <div class="row">
                   <div class="col-md-4">
                       <img src="{{ asset('uploads/product') }}/{{ $single_product->image }}" alt="" class="w-100">
                   </div>
                   <div class="col-md-8">
                       <h2 class="mb-0">
                            {{ $single_product->name }}

                       </h2>
                       <span class="float-end badge bg-danger">Tranding</span>

                       <label class="me-0">Orginal Price : <s>Tk {{ $single_product->orginal_price }}</s></label><br>
                       <label class="fw-bold">Selling Price: TK {{ $single_product->selling_price }}</label>
                       <p class="mt-3">
                        {{ $single_product->small_description }}
                       </p>
                       <hr>
                       @if ($single_product->quantity > 0)
                       <span class="badge bg-success">In stock</span>
                       @else
                       <span class="badge bg-danger">Stock Out</span>
                       @endif
                       <div class="row">
                           <div class="col-md-2">
                               <input type="hidden" value="{{ $single_product->id }}" class="product_id">
                                <label for="">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input" value="1">
                                    <button class="input-group-text increment-btn">+</button>

                                </div>
                           </div>
                           <div class="col-md-10">
                            <br>
                            @if ($single_product->quantity > 0)
                            <button type="submit" class="btn btn-success me-3 addtoCartbtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                            <button type="submit" class="btn btn-danger me-3 addtoWishlistbtn float-start">Add Wishlist <i class="fa fa-heart"></i></button>
                            @else
                            <button type="submit" class="btn btn-danger me-3 addtoWishlistbtn float-start">Add Wishlist <i class="fa fa-heart"></i></button>
                            @endif
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection

