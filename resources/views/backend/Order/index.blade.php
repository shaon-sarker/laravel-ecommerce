@extends('layouts.backend')
@section('content')
    @include('layouts.nav')
      <!-- START: MAIN PANEL -->
      <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <a class="breadcrumb-item" href="index.html">Order</a>
          <span class="breadcrumb-item active">Order Page</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Order Page</h5>
            <p>This is a starter page</p>
          </div>
          <div class="card pd-20 pd-sm-40">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <th>Created At</th>
                    <th>Tracking Number</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($orders as $data)
                    <tr>
                        <td>{{ date('d-M-Y',strtotime($data->created_at)) }}</td>
                        <td>{{ $data->tracking_no }}</td>
                        <td>{{ $data->total_price }}</td>
                        <td>
                            @if ($data->status == 0)
                                <span class="badge bg-danger">Pending</span>
                            @elseif ($data->status == 1)
                            <span class="badge bg-success">Complete</span>
                            @else
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/admin/vieworder') }}/{{  $data->id }}" class="btn btn-sm btn-info">view</a>
                        </td>
                    </tr>
                    @empty

                    @endforelse

                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div>
      </div>
@endsection
@section('script')
    <script>
        $('#datatable1').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });
    </script>
@endsection
