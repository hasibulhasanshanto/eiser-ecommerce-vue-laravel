@extends('backend.master')

@section('title')
Edit User
@endsection

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Users</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Edit User</span></li>
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
            <h3 class="card-title"><b>Edit Users</b></h3>
            <div class="card-tools">
                <a href="{{ route('admin.user.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i> All
                    User</a>
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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="userName" class="col-sm-2 offset-1 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 offset-1 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="userEmail" class="col-sm-2 offset-1 col-form-label">User Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="userPhone" class="col-sm-2 offset-1 col-form-label">User Phone</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="userAddress" class="col-sm-2 offset-1 col-form-label">User Address</label>
                    <div class="col-sm-8">
                        <textarea name="address" class="form-control" rows="3">{{ $user->address }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="userImage" class="col-sm-2 offset-1 col-form-label">User Image</label>
                    <div class="col-sm-8">
                        <input type="file" id="imageinput" class="form-control" name="image"
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                            ;">
                        <br>
                        <img id="blah" src="{{ asset('/storage/users').'/'.$user->image }}" height="100px" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="userRole" class="col-sm-2 offset-1 col-form-label">User Role</label>
                    <div class="col-sm-8">
                        <select name="role" class="form-control">
                            <option value="{{ $user->role }}" selected>
                                @if ($user->role ==1)
                                Super Admin
                                @elseif ($user->role ==2)
                                Admin
                                @elseif ($user->role ==3)
                                Vendor
                                @else
                                User
                                @endif
                            </option>
                            <option value="2">Admin</option>
                            <option value="3">Vendor</option>
                            <option value="4">User</option>
                            <option value="1">Super Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="imageinput" class="col-sm-2 offset-1 col-form-label">Status</label>
                    <br>
                    <div class="col-sm-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="status" class="custom-control-input"
                                value="1" {{ $user->status == 1 ? 'checked': '' }}>
                            <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="status" class="custom-control-input"
                                value="0" {{ $user->status == 0 ? 'checked': '' }}>
                            <label class="custom-control-label" for="customRadioInline2">Deactive</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <br>
                    <button type="submit" class="btn btn-primary">Update User</button>
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
