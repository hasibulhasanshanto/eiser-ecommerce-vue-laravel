@extends('backend.master')

@section('title')
Show Product
@endsection

@push('css')
<style>
    #blah {
        border: 2px solid #000;
        margin-left: 10px;
    }

    div#preview img {
        margin-left: 10px;
        border: 2px solid #000;
    }

    th {
        width: 300px;
    }

</style>
@endpush

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Products</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">View Product</span></li>
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
            <h3 class="card-title"><b>View Product</b></h3>
            <div class="card-tools">
                <a href="{{ route('admin.product.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i>
                    All Product
                </a>
            </div>
        </div>
        <!-- /.card-header -->

        @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
        @endif

        <!-- card-body -->
        <div class="card-body">
            <h2 class="p-2"><strong>#{{ $product->pro_name }}'s Details</strong></h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <td><strong>{{ $product->pro_name }}</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Product Brand</th>
                        <td><strong>{{ $product->br_name }}</strong></td>
                    </tr>
                    <tr>
                        <th>Product Category</th>
                        <td><strong>{{ $product->cat_name }}</strong></td>
                    </tr>

                    <tr>
                        <th>Product Price</th>
                        <td>{{ $product->pro_price }}</td>
                    </tr>
                    <tr>
                        <th>Product Off Price</th>
                        <td>{{ $product->pro_offprice }}</td>
                    </tr>
                    <tr>
                        <th>Product Quantity</th>
                        <td>{{ $product->pro_qty }}</td>
                    </tr>
                    <tr>
                        <th>Product Size</th>
                        <td>{{ $product->pro_size }}</td>
                    </tr>

                    <tr>
                        <th>Product Short Description</th>
                        <td>
                            <p>{{ $product->short_desc }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>Product Long Description</th>
                        <td>
                            {!! $product->long_desc !!}
                        </td>
                    </tr>

                    <tr>
                        <th>Product Image</th>
                        <td>
                            <img id="blah" src="{{ asset('/storage/product').'/'.$product->pro_image }}"
                                height="200px" />
                        </td>
                    </tr>

                    <tr>
                        <th>Product Gallery Image</th>
                        <td>
                            <div id="preview">
                                @foreach (json_decode($product->pro_g_image) as $gallery)
                                <img id="blah" src="{{ asset('/storage/product/gallery').'/'.$gallery }}"
                                    height="100px" />
                                @endforeach
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Product Status</th>
                        <td>
                            @if ($product->pro_status == 1 )
                            <strong>{{ 'Pulished' }}</strong>
                            @else
                            <strong>{{ 'Unpulished' }}</strong>
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="back-button d-flex justify-content-center m-3">
                <a href="{{ route('admin.product.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection


@push('scripts')
<script>
    CKEDITOR.replace('editor');

</script>
<script>
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
@endpush
