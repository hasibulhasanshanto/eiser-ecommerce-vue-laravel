@extends('backend.master')

@section('title')
Edit Product
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
                    <li class="breadcrumb-item active"><span class="text-white">Edit Product</span></li>
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
            <h3 class="card-title"><b>Edit Product</b></h3>
            <div class="card-tools">
                <a href="{{ route('admin.product.index')}}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i>
                    All Product
                </a>
            </div>
        </div>
        <!-- /.card-header -->

        @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible fade show mx-4 mt-4" role="alert">
          <strong>Success!</strong> {{ Session::get('flash_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <!-- card-body -->
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="productName" class="col-sm-2 offset-1 col-form-label">Product Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="pro_name" class="form-control" value="{{ $product->pro_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productBrand" class="col-sm-2 offset-1 col-form-label">Product Brand</label>
                    <div class="col-sm-8">
                        <select name="pro_band" class="form-control">
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id}}" @if( $brand->id == $product->pro_band )
                                {{ 'selected' }}
                                @endif
                                >{{ $brand->br_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productCategory" class="col-sm-2 offset-1 col-form-label">Product Category</label>
                    <div class="col-sm-8">
                        <select name="pro_category" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id}}" @if( $category->id == $product->pro_category )
                                {{ 'selected' }}
                                @endif >
                                {{ $category->cat_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productPrice" class="col-sm-2 offset-1 col-form-label">Product Price</label>
                    <div class="col-sm-8">
                        <input type="text" name="pro_price" class="form-control" value="{{ $product->pro_price }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productOffPrice" class="col-sm-2 offset-1 col-form-label">Product Off Price</label>
                    <div class="col-sm-8">
                        <input type="text" name="pro_offprice" class="form-control"
                            value="{{ $product->pro_offprice }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productQuantity" class="col-sm-2 offset-1 col-form-label">Product Quantity</label>
                    <div class="col-sm-8">
                        <input type="text" name="pro_qty" class="form-control" value="{{ $product->pro_qty }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productPrize" class="col-sm-2 offset-1 col-form-label">Product Size</label>
                    <div class="col-sm-8">
                        <select name="pro_size" class="form-control">
                            <option value="{{ $product->pro_size }}" selected>{{ $product->pro_size }}</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="shortDescription" class="col-sm-2 offset-1 col-form-label">Short Description</label>
                    <div class="col-sm-8">
                        <textarea name="short_desc" class="form-control" rows="5">{{ $product->short_desc }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="longDescription" class="col-sm-2 offset-1 col-form-label">Long Description</label>
                    <div class="col-sm-8">
                        <textarea name="long_desc" id="editor" class="form-control">{{ $product->long_desc }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productImage" class="col-sm-2 offset-1 col-form-label">Product Image</label>
                    <div class="col-sm-8">
                        <input type="file" id="imageinput" class="form-control" name="pro_image"
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                            ;">
                        <br>
                        <img id="blah" src="{{ asset('/storage/product').'/'.$product->pro_image }}" height="100px" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productImage" class="col-sm-2 offset-1 col-form-label">Gallery Image</label>
                    <div class="col-sm-8">
                        <input type="file" id="file-input" name="pro_g_image[]" class="form-control" multiple>
                        <br>
                        <div id="preview">
                            @foreach (json_decode($product->pro_g_image) as $gallery)
                            <img id="blah" src="{{ asset('/storage/product/gallery').'/'.$gallery }}" height="100px" />
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="imageinput" class="col-sm-2 offset-1 col-form-label">Status</label>
                    <br>
                    <div class="col-sm-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="pro_status" class="custom-control-input"
                                value="1" {{ $product->pro_status == 1 ? 'checked': '' }}>
                            <label class="custom-control-label" for="customRadioInline1">Publish</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="pro_status" class="custom-control-input"
                                value="0" {{ $product->pro_status == 0 ? 'checked': '' }}>
                            <label class="custom-control-label" for="customRadioInline2">Unpublish</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <br>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>

            </form>
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
