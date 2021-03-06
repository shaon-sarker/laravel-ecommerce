@extends('layouts.frontend.master')
@section('content')
<div class="container-fluid bg-warning pt-1 pb-1">
    <div class="container">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb pt-2">
              <li class="breadcrumb-item fs-5 fw-bold text-dark">Home</li>
              <li class="breadcrumb-item fs-5 fw-bold"><a href="#" class="text-dark">User</a></li>
              <li class="breadcrumb-item fs-5 fw-bold"><a href="#" class="text-dark">UserDashboad Page</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Place Order Info</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($orders_user as $data)
                                <tr>
                                    <td>{{ $data->tracking_no }}</td>
                                    <td>{{ $data->total_price }}</td>
                                    <td>
                                        @if ($data->status == 0)
                                            <span class="badge bg-danger">Pending</span>
                                        @else
                                        <span class="badge bg-success">Complete</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/vieworder') }}/{{  $data->id }}" class="btn btn-sm btn-info">view</a>
                                    </td>
                                </tr>
                                @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
