@extends('backend.master')

@section('title')
All Category
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
                    <li class="breadcrumb-item active"><span class="text-white">Category</span></li>
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
            <h3 class="card-title"><b>All Categories</b></h3>
            <div class="card-tools">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i
                        class="fas fa-plus"></i> Add Category</a>
            </div>
        </div>
        <!-- /.card-header -->

        @if(Session::has('flash_message'))
        <div class="alert alert-success alert-dismissible fade show mx-4 mt-4" role="alert">
          <strong>Success!</strong> {{ Session::get('flash_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(Session::has('delete_message'))
        <div class="alert alert-danger alert-dismissible fade show mx-4 mt-4" role="alert">
          <strong>Success!</strong> {{ Session::get('delete_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <!-- card-body -->
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key=>$category)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $category->cat_name }}</td>
                        <td>
                            <img src="{{ asset('/storage/category').'/'.$category->cat_image }}" alt="Category Image"
                                height="100px">
                        </td>
                        <td>{{ $category->cat_desc }}</td>
                        <td>{{ $category->cat_status == 1? 'Publish' : 'Unpublish' }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.category.destroy', $category->id)}}" method="POST">
                                <!--Publish/ Unpublish Button -->
                                @if ($category->cat_status == 1)
                                <a href="{{ route('un-category', $category->id)}}"
                                    class="btn btn-sm btn-success"><span><i class="fas fa-arrow-up"></i></span></a>
                                @else
                                <a href="{{ route('pub-category', $category->id) }}"
                                    class="btn btn-sm btn-warning"><span><i class="fas fa-arrow-down"></i></span></a>
                                @endif
                                <!--General Button -->
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                    class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- Modal -->

@include('backend.admin.category.add-category')

@endsection


@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            columnDefs: [{
                "width": "100px",
                "targets": [5]
            }]
        });
    });

</script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

@endpush
