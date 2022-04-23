@extends('layouts.frontend.master')
@section('content')
    <div class="container py-5">
        <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h3 class="text-center">
                        Place Order View Info
                        <a href="{{ url('/userdashboad') }}" class="btn btn-info float-end">Back</a>
                    </h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Fisrt Name</label>
                            <div class="border p-2">{{ $orders_user_view->fname }}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders_user_view->lname }}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders_user_view->email }}</div>
                            <label for="">Contact No</label>
                            <div class="border p-2">{{ $orders_user_view->phone }}</div>
                            <label for="">Shippind Address</label>
                            <div class="border p-2">
                                {{ $orders_user_view->address01 }},
                                {{ $orders_user_view->address02 }},
                                {{ $orders_user_view->country }},
                                {{ $orders_user_view->state }},
                            </div>
                            <label for="">Zipcode</label>
                            <div class="border p-2">{{ $orders_user_view->pincode }}</div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Image</th>
                                </thead>
                                <tbody>
                                    @forelse ($orders_user_view->orderitems as $data)
                                    <tr>
                                        <td>{{ $data->rtn_product->name }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>{{ $data->price }}</td>
                                        <td>
                                            <img style="width: 75px" src="{{ asset('uploads/product') }}/{{ $data->rtn_product->image }}" alt="">
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                            <h4>Grand Total : {{ $orders_user_view->total_price }}Tk</h4>
                        </div>
                    </div>

                </div>

        </div>




    </div>
@endsection
