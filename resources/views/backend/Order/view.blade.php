@extends('layouts.backend')
@section('content')
@include('layouts.nav')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <a class="breadcrumb-item" href="index.html">Order</a>
        <span class="breadcrumb-item active">Order Page</span>
      </nav>

      <div class="sl-pagebody">
        <div class="container py-5">
            <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h3 class="">
                            Place Order View Info
                            <a href="{{ url('/userdashboad') }}" class="btn btn-info float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Fisrt Name</label>
                                <div class="border p-2">{{ $orders_admin_view->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders_admin_view->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders_admin_view->email }}</div>
                                <label for="">Contact No</label>
                                <div class="border p-2">{{ $orders_admin_view->phone }}</div>
                                <label for="">Shippind Address</label>
                                <div class="border p-2">
                                    {{ $orders_admin_view->address01 }},
                                    {{ $orders_admin_view->address02 }},
                                    {{ $orders_admin_view->country }},
                                    {{ $orders_admin_view->state }},
                                </div>
                                <label for="">Zipcode</label>
                                <div class="border p-2">{{ $orders_admin_view->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <thead>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Image</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders_admin_view->orderitems as $data)
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
                                <h4>Grand Total : {{ $orders_admin_view->total_price }}Tk</h4>
                                <div class="mt-3">
                                    <label for="">Order Status</label>
                                    <form action="{{ url('updateorder/'.$orders_admin_view->id) }}" method="POST">
                                        @csrf
                                        {{-- <input type="hidden" name="id" value="{{ $orders_admin_view->id }}"> --}}
                                        <select class="form-control" name="order_status">
                                            <option {{ $orders_admin_view->status == '0'? 'selected':'' }} value="0">Pending</option>
                                            <option {{ $orders_admin_view->status == '1'? 'selected':'' }} value="1">Completed</option>
                                        </select><br>
                                        <button type="submit" class="btn btn-success pt-2">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
      </div>
</div>
@endsection
