@extends('layouts.frontend.master')
@section('content')
<!------Category wise Product Part------>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="card-head text-center">
                <h2>{{ $category->name }}</h2>
            </div>
            @foreach ($product as $product_data)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
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
