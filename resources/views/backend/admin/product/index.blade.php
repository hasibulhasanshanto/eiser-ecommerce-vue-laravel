@extends('backend.master')

@section('title')
All Products
@endsection

@push('css')
<style>
    img#output {
        border: 2px solid #000;
        margin-left: 10px;
    }

    div#preview img {
        margin-left: 10px;
        border: 2px solid #000;
    }

</style>
@endpush

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Product</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Products</span></li>
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
            <h3 class="card-title"><b>All Products</b></h3>
            <div class="card-tools">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><i
                        class="fas fa-plus"></i> Add Product</a>
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
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key=>$product)

                    @if ( Auth::user()->role == 1 || Auth::user()->role == 2 )
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $product->pro_name }}</td>
                        <td>{{ $product->br_name }}</td>
                        <td>{{ $product->cat_name }}</td>
                        <td>{{ $product->pro_price }}</td>
                        <td>
                            <img src="{{ asset('/storage/product').'/'.$product->pro_image }}" alt="Category Image"
                                height="100px">
                        </td>
                        <td>{{ $product->pro_status == 1? 'Publish' : 'Unpublish' }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.product.destroy', $product->id)}}" method="POST">
                                <!--Publish/ Unpublish Button -->
                                @if ($product->pro_status == 1)
                                <a href="{{ route('un-product', $product->id)}}" class="btn btn-sm btn-success">
                                    <span><i class="fas fa-arrow-up"></i></span>
                                </a>
                                @else
                                <a href="{{ route('pub-product', $product->id) }}" class="btn btn-sm btn-warning">
                                    <span><i class="fas fa-arrow-down"></i></span>
                                </a>
                                @endif
                                <!--General Button -->
                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="{{ route('admin.product.show', $product->id) }}"
                                    class="btn btn-sm btn-warning">
                                    <i class="fas fa-eye"></i>
                                </a>

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @elseif(Auth::user()->id == $product->user_id)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $product->pro_name }}</td>
                        <td>{{ $product->br_name }}</td>
                        <td>{{ $product->cat_name }}</td>
                        <td>{{ $product->pro_price }}</td>
                        <td>
                            <img src="{{ asset('/storage/product').'/'.$product->pro_image }}" alt="Category Image"
                                height="100px">
                        </td>
                        <td>{{ $product->pro_status == 1? 'Publish' : 'Unpublish' }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.product.destroy', $product->id)}}" method="POST">
                                <!--Publish/ Unpublish Button -->
                                @if ($product->pro_status == 1)
                                <a href="{{ route('un-product', $product->id)}}" class="btn btn-sm btn-success">
                                    <span><i class="fas fa-arrow-up"></i></span>
                                </a>
                                @else
                                <a href="{{ route('pub-product', $product->id) }}" class="btn btn-sm btn-warning">
                                    <span><i class="fas fa-arrow-down"></i></span>
                                </a>
                                @endif
                                <!--General Button -->
                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="{{ route('admin.product.show', $product->id) }}"
                                    class="btn btn-sm btn-warning">
                                    <i class="fas fa-eye"></i>
                                </a>

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
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

@include('backend.admin.product.add-product')

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
    //Show single image before Save
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

    //Show multiple image before Save
    function previewImages() {

        var $preview = $('#preview').empty();
        if (this.files) $.each(this.files, readAndPreview);

        function readAndPreview(i, file) {

            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...

            var reader = new FileReader();

            $(reader).on("load", function () {
                $preview.append($("<img/>", {
                    src: this.result,
                    height: 100
                }));
            });

            reader.readAsDataURL(file);

        }
    }

    $('#file-input').on("change", previewImages);

</script>

<script>
    CKEDITOR.replace('editor');

</script>

@endpush
