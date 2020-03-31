@extends('backend.master')

@section('title')
Show User
@endsection

@push('css')
<style>
    #blah {
        border-radius: 50%;
        border: 2px solid #000;
        margin-left: 10px;
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
                <h3 class="m-0 text-white">Users</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Show Users</span></li>
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
            <h3 class="card-title"><b>Show Users</b></h3>
            <div class="card-tools">
                <a href="{{ route('admin.user.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i> All
                    User</a>
            </div>
        </div>
        <!-- /.card-header -->

        <!-- card-body -->
        <div class="card-body">
            <h2 class="p-2"><strong>#{{ $user->name }}'s Details</strong></h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <td><strong>{{ $user->name }}</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Username</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <th>User Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <th>User Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>

                    <tr>
                        <th>User Address</th>
                        <td>
                            {!! $user->address !!}
                        </td>
                    </tr>

                    <tr>
                        <th>User Image</th>
                        <td>
                            <img id="blah" src="{{ asset('/storage/users').'/'.$user->image }}" height="100px" />
                        </td>
                    </tr>
                    <tr>
                        <th>User Role</th>
                        @if ($user->role ==1)
                        <td>Super Admin</td>
                        @elseif ($user->role ==2)
                        <td>Admin</td>
                        @elseif ($user->role ==3)
                        <td>Vendor</td>
                        @else
                        <td>User</td>
                        @endif
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($user->status == 1 )
                            <strong>{{ 'Active' }}</strong>
                            @else
                            <strong>{{ 'Deactive' }}</strong>
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="back-button d-flex justify-content-center m-3">
                <a href="{{ route('admin.user.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i>
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

@endpush
