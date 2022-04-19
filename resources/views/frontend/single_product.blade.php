@extends('layouts.frontend.master')
@section('content')
   <div class="container">
       <div class="card-shadow">
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
                                <label for="">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-text">-</span>
                                    <input type="text" name="quantity" class="form-control" value="1">
                                    <span class="input-group-text">+</span>

                                </div>
                           </div>
                           <div class="col-md-10">
                            <br>
                            <button type="submit" class="btn btn-danger me-3 float-start">Add to Wishlist</button>
                            <button type="submit" class="btn btn-success me-3 float-start"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                              </svg>Add to Cart</button>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
