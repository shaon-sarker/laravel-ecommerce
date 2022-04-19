@extends('layouts.backend')
@section('content')
    @include('layouts.nav')
      <!-- START: MAIN PANEL -->
      <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <a class="breadcrumb-item" href="index.html">Category</a>
          <span class="breadcrumb-item active">Category Page</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Category Page</h5>
            <p>This is a starter page</p>
          </div>
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Basic Responsive DataTable</h6>
            <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Sl</th>
                    <th class="wd-15p">Category name</th>
                    <th class="wd-15p">Slug</th>
                    <th class="wd-20p">Popular</th>
                    <th class="wd-15p">Meta Title</th>
                    <th class="wd-10p">Meta Keywords</th>
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->slug }}</td>
                        <td>{{ $data->popular }}</td>
                        <td>{{ $data->meta_title }}</td>
                        <td>{{ $data->meta_keywords  }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    @endforeach

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
