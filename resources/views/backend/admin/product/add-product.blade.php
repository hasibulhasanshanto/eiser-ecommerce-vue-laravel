<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Product Name</label>
                        <input type="text" class="form-control" name="pro_name" 
                            placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Select Brand</label>
                        <select name="pro_band" class="form-control">
                            <option>Select Brand</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->br_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Select Category</label>
                        <select name="pro_category" class="form-control">
                            <option>Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Product Price</label>
                        <input type="text" class="form-control" name="pro_price" id="formGroupExampleInput"
                            placeholder="Product Price">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Off Price</label>
                        <input type="text" class="form-control" name="pro_offprice" id="formGroupExampleInput"
                            placeholder="Off Price">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Product Quantity</label>
                        <input type="text" class="form-control" name="pro_qty" id="formGroupExampleInput"
                            placeholder="Product Quantity">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Product Size</label>
                        <select name="pro_size" id="" class="form-control">
                            <option>Select One</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Short Description</label>
                        <textarea id="my-textarea" class="form-control" name="short_desc" rows="3"
                            placeholder="Enter Short Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Long Description</label>
                        <textarea id="editor" class="form-control" name="long_desc"
                            placeholder="Enter product Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="imageinput">Product Image</label>
                        <br>
                        <input type="file" accept="image" name="pro_image" class="form-control"
                            onchange="loadFile(event)">
                        <br>
                        <img id="output" src="#" height="100px" />
                    </div>

                    <div class="form-group">
                        <label for="imageinput">Product Gallery Image</label>
                        <br>
                        <input type="file" id="file-input" name="pro_g_image[]" class="form-control" multiple>
                        <br>
                        <div id="preview"></div>
                    </div>

                    <div class="form-group">
                        <label for="imageinput">Status</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="pro_status" class="custom-control-input"
                                value="1">
                            <label class="custom-control-label" for="customRadioInline1">Publish</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="pro_status" class="custom-control-input"
                                value="0" checked>
                            <label class="custom-control-label" for="customRadioInline2">Unpublish</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Product</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>