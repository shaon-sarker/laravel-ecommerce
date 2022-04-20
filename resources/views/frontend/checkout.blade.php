@extends('layouts.frontend.master')
@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-7 mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h4>Basic Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Frist Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="lname">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" name="address01">
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" name="address02">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Country</label>
                                <input type="text" class="form-control" name="country">
                            </div>
                            <div class="col-md-6">
                                <label for="">State</label>
                                <input type="text" class="form-control" name="state">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="col-md-6">
                                <label for="">Pincode</label>
                                <input type="text" class="form-control" name="pincode">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Comment</label>
                               <textarea name="comment" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h4>Order Details</h4><hr>
                        <table class="table table-border">
                            <thead>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @forelse ($order_item as $data)
                                <tr>
                                    <td>{{ $data->rtn_product->name }}</td>
                                    <td>{{ $data->product_quantity }}</td>
                                    <td>{{ $data->rtn_product->selling_price }}</td>
                                </tr>
                                <h6 style="font-weight: bold">Total : {{ session('total') }}</h6>
                                @empty
                                    <span class="text-white bg-dark p-2 text-center">No product Show</span>
                                @endforelse
                            </tbody>
                        </table>

                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Order Placed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
