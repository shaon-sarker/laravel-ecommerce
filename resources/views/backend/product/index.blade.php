@extends('layouts.backend')
@section('content')
    @include('layouts.nav')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <a class="breadcrumb-item" href="index.html">Product</a>
          <span class="breadcrumb-item active">Product Page</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Product Page</h5>
            <p>This is a starter page</p>
          </div><!-- sl-page-title -->
          <div class="card pd-20 pd-sm-40">
            <div class="form-layout">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Categoryname: <span class="tx-danger">*</span></label>
                    <select class="form-control" name="category_id">
                        <option value="">---Select Category Name---</option>
                        @foreach ($category as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="name" placeholder="">
                    </div>
                  </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="image">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Small Description: <span class="tx-danger">*</span></label>
                      <textarea class="form-control" type="text" name="small_description"></textarea>
                    </div>
                  </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                    <textarea class="form-control" type="text" name="description"></textarea>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Meta Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="meta_title">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Meta Keyword: <span class="tx-danger">*</span></label>
                      <textarea class="form-control" type="text" name="meta_keywords"></textarea>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                    <textarea class="form-control" type="text" name="meta_description"></textarea>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Orginal Price: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="orginal_price">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="selling_price">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="quantity">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">tax: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="taxs">
                    </div>
                  </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Popular & Status: <span class="tx-danger">*</span></label>
                      <input type="checkbox" name="tranding" value="tranding">
                    </div>
                </div><!-- col-4 -->
              </div><!-- row -->
              <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
                <button class="btn btn-secondary">Cancel</button>
              </div><!-- form-layout-footer -->
            </form>
            </div><!-- form-layout -->
          </div><!-- card -->

        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->
@endsection
