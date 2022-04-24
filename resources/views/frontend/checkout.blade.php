@extends('layouts.frontend.master')
@section('content')
    <div class="container mb-5">
        @php
        $total = 0;
    @endphp
        <form action="{{ route('checkout.order') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-7 mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h4>Basic Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Frist Name</label>
                                <input type="text" class="form-control fname" name="fname">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control lname" name="lname">
                                <span id="lname_error" class="text-danger"></span>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control email" name="email">
                                <span id="email_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6">
                                <label for="">Phone</label>
                                <input type="text" class="form-control phone" name="phone">
                                <span id="phone_error" class="text-danger"></span>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control address01" name="address01">
                                <span id="address01_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control address02" name="address02">
                                <span id="address01_error" class="text-danger"></span>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Country</label>
                                <input type="text" class="form-control country" name="country">
                                <span id="country_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6">
                                <label for="">State</label>
                                <input type="text" class="form-control state" name="state">
                                <span id="state_error" class="text-danger"></span>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input type="text" class="form-control city" name="city">
                                <span id="city_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6">
                                <label for="">Pincode</label>
                                <input type="text" class="form-control pincode" name="pincode">
                                <span id="pincode_error" class="text-danger"></span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Comment</label>
                               <textarea name="comment" id="" class="form-control comment" cols="30" rows="10"></textarea>
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
                                @php
                                $total += $data->rtn_product->selling_price * $data->product_quantity;
                                @endphp
                                @empty
                                    <span class="text-white bg-dark p-2 text-center">No product Show</span>
                                @endforelse
                            </tbody>
                        </table>
                        <h6><b>Total Product of Price: </b>{{ $total }}</h6>
                        <hr>
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" class="btn btn-success w-100">Order Placed | COD</button>
                        <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Razorpay</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
@section('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection
