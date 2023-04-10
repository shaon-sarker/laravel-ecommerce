@extends('layouts.frontend.master')
@section('content')
<div class="container-fluid bg-warning pt-1 pb-1">
    <div class="container">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb pt-2">
              <li class="breadcrumb-item fs-5 fw-bold text-dark">Home</li>
              <li class="breadcrumb-item fs-5 fw-bold"><a href="#" class="text-dark">Category</a></li>
              <li class="breadcrumb-item fs-5 fw-bold"><a href="#" class="text-dark">Cateory Page</a></li>
            </ol>
        </nav>
    </div>
</div>
<!------Category wise Product Part------>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="card-head text-center">
                <h2>{{ $category->name }}</h2>
            </div>
            @foreach ($product as $product_data)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ url('/category') }}/{{ $category->slug }}/{{ $product_data->name }}">
                            <img src="{{ asset('uploads/product') }}/{{ $product_data->image }}" class="card-img-top" alt="Tranding Image"></a>
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
<!------ Tranding Category Part end------>
@endsection
