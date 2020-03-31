  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">Category Name</label>
              <input type="text" class="form-control"name="cat_name" id="formGroupExampleInput" placeholder="Category Name">
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput2">Category Description</label>
              <textarea id="my-textarea" class="form-control" name="cat_desc" rows="3" placeholder="Enter Category Description"></textarea>
            </div>

            <div class="form-group">
              <label for="imageinput">Category Image</label>
              <br>
              <input type="file" accept="image/*" name="cat_image" class="form-control" onchange="loadFile(event)">
              <br>
              <br>
              <img id="output" height="100px"/> 
            </div> 

            <div class="form-group">
              <label for="imageinput">Status</label>
              <br>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="cat_status" class="custom-control-input" value="1" checked>
                <label class="custom-control-label" for="customRadioInline1">Publish</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="cat_status" class="custom-control-input" value="0">
                <label class="custom-control-label" for="customRadioInline2">Unpublish</label>
              </div>
            </div> 
            <hr>

            <button type="submit" class="btn btn-primary">Save Category</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
          </form>
             
        </div> 
      </div>
    </div>
  </div>