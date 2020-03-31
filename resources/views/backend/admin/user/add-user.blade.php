  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
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
                  <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="Name">Name</label>
                          <input type="text" class="form-control" name="name" placeholder="User Name">
                      </div>

                      <div class="form-group">
                          <label for="userName">Username</label>
                          <input type="text" class="form-control" name="username" placeholder="Username">
                      </div>

                      <div class="form-group">
                          <label for="userEmail">User Email</label>
                          <input type="email" class="form-control" name="email" placeholder="User Email">
                      </div>
                      <div class="form-group">
                          <label for="userPhone">User Phone</label>
                          <input type="text" class="form-control" name="phone" placeholder="User Phone">
                      </div>
                      <div class="form-group">
                          <label for="userPhone">User Password</label>
                          <input type="password" class="form-control" name="password" placeholder="User Password">
                      </div>
                      <div class="form-group">
                          <label for="userAddress">User Address</label>
                          <textarea id="my-textarea" class="form-control" name="address" rows="3"
                              placeholder="User Address"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="imageinput">User Image</label>
                          <br>
                          <input type="file" accept="image" name="image" class="form-control"
                              onchange="loadFile(event)">
                          <br>
                          <img id="output" src="#" height="100px" />
                      </div>

                      <div class="form-group">
                          <label for="userRole">User Role</label>
                          <select name="role" id="" class="form-control">
                              <option>Select One</option>
                              <option value="2">Admin</option>
                              <option value="3">Vendor</option>
                              <option value="4">User</option>
                              <option value="1">Super Admin</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="userStatus">Status</label>
                          <br>
                          <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" name="status" class="custom-control-input"
                                  value="1" checked>
                              <label class="custom-control-label" for="customRadioInline1">Active</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" name="status" class="custom-control-input"
                                  value="0">
                              <label class="custom-control-label" for="customRadioInline2">Deactive</label>
                          </div>
                      </div>
                      <hr>

                      <button type="submit" class="btn btn-primary">Create User</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </form>

              </div>
          </div>
      </div>
  </div>
