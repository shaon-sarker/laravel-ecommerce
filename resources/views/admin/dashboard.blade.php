@extends('layouts.backend')
@section('content')
    @include('layouts.nav')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">Pages</a>
          <span class="breadcrumb-item active">Blank Page</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Welcome to Admin page</h5>
            <p>This is a starter page</p>
          </div><!-- sl-page-title -->

        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->
@endsection
