@extends('backend.master')

@section('title')
  Edit Category
@endsection

@section('head-tab')
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
              <h3 class="m-0 text-white">Category</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Edit Category</span></li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div>
  </div>
@endsection

@section('content')
  <div class="col-12">
      <!-- card -->
      <div class="card">
          <!-- card-header -->
          <div class="card-header">
              <h3 class="card-title"><b>Edit Categories</b></h3>
              <div class="card-tools">
                  <a href="{{ route('admin.category.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i> All Category</a>
              </div>
          </div>
          <!-- /.card-header -->

          @if(Session::has('flash_message'))
          <div class="alert alert-primary alert-dismissible fade show mx-4 mt-4" role="alert">
            <strong>Success!</strong> {{ Session::get('flash_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <!-- card-body -->
          <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group row">
                <label for="categoryName" class="col-sm-2 offset-1 col-form-label">Category Name</label>
                <div class="col-sm-8">
                  <input type="text" name="cat_name" class="form-control" id="categoryName" value="{{ $category->cat_name }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="categoryName" class="col-sm-2 offset-1 col-form-label">Category Name</label>
                <div class="col-sm-8">
                  <textarea name="cat_desc" class="form-control" rows="5">{{ $category->cat_desc }}</textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="categoryName" class="col-sm-2 offset-1 col-form-label">Category Image</label>
                <div class="col-sm-8">
                  <input type="file" id="imageinput" class="form-control" name="cat_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])";">
                  <br>
                  <img id="blah" src="{{ asset('/storage/category').'/'.$category->cat_image }}" height="100px"/>
                </div>
              </div>

              <div class="form-group row">
                <label for="imageinput" class="col-sm-2 offset-1 col-form-label">Status</label>
                <br>
                <div class="col-sm-8">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="cat_status" class="custom-control-input" value="1" {{ $category->cat_status == 1 ? 'checked': '' }}>
                    <label class="custom-control-label" for="customRadioInline1">Publish</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="cat_status" class="custom-control-input" value="0" {{ $category->cat_status == 0 ? 'checked': '' }}>
                    <label class="custom-control-label" for="customRadioInline2">Unpublish</label>
                  </div>
                </div>
              </div>

            <div class="d-flex justify-content-center">
            <br>
              <button type="submit" class="btn btn-primary">Update Category</button>
            </div>

            </form>
          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.card -->
  </div>

@endsection


@push('scripts')

@endpush
