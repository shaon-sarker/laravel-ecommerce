@extends('layouts.frontend.master')
@section('content')
<!------ SLider Part------>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('fronted/image/3.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('fronted/image/2.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('fronted/image/b1.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('fronted/image/4.jpg') }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

<!------ SLider Part end------>

<!------ Tranding Product Part------>
      <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="card-head text-center">
                    <h2>Tranding Product</h2>
                </div>
                @foreach ($featured_product as $product_data)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <a href=""> <img src="{{ asset('uploads/product') }}/{{ $product_data->image }}" class="card-img-top" alt="Tranding Image"></a>
                        <div class="card-body">
                          <h5 class="card-text">{{ $product_data->name }}</h5>
                          <p>Tk {{ $product_data->selling_price }}</p>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
      </div>
<!------ Tranding Product Part end------>


<!------ Tranding Category Part------>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="card-head text-center">
                <h2>Tranding Category</h2>
            </div>
            @foreach ($category as $categroy_data)
            <div class="col-md-3 mt-5">
                    <div class="card">
                        <a href="{{ url('/category/product') }}/{{ $categroy_data->slug }}">
                            <img src="{{ asset('uploads/category') }}/{{ $categroy_data->image }}" class="card-img-top" alt="Category Image">
                        </a>
                        <div class="card-body">
                          <h5 class="card-text">{{ $categroy_data->name }}</h5>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
  </div>
<!------ Tranding Category Part end------>
@endsection
