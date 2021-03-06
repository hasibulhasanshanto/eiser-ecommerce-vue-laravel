@extends('backend.master')

@section('title')
All User
@endsection

@push('css')
<style>
    .profile-image {
        height: 100px;
        border-radius: 50%;
        border: 2px solid #000;
    }

</style>

@endpush

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Dashboard Users</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Users</span></li>
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
            <h3 class="card-title"><b>All Users</b></h3>
            <div class="card-tools">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i
                        class="fas fa-plus"></i> Add User</a>
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
                        <th>Image</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key=>$user)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <img src="{{ asset('/storage/users').'/'.$user->image }}" alt="User" class="profile-image">
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        @if ($user->role ==1)
                        <td>Super Admin</td>
                        @elseif ($user->role ==2)
                        <td>Admin</td>
                        @elseif ($user->role ==3)
                        <td>Vendor</td>
                        @else
                        <td>User</td>
                        @endif
                        <td>{{ $user->status == 1? 'Active' : 'Deactive' }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.user.destroy', $user->id)}}" method="POST">
                                <!--Publish/ Unpublish Button -->

                                <!--General Button -->
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-eye"></i>
                                </a>

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
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
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

@include('backend.admin.user.add-user')

@endsection


@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable();
    });

</script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

@endpush
