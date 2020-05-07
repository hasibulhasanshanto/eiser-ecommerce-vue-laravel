@extends('backend.master')

@section('title')
Coupon Code
@endsection

@push('css')

@endpush

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Coupon Code</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Coupons</span></li>
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
            <h3 class="card-title"><b>All Coupons</b></h3>
            <div class="card-tools">
                <a href="{{ route('admin.coupon.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Add Coupons
                </a>
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
                        <th>Coupon Code</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Expire On</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $key=>$coupon)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $coupon->coupon_code }}</td>
                        <td>{{ $coupon->amount }}</td>
                        <td>{{ $coupon->amount_type }}</td>
                        <td>{{ $coupon->expire_date }}</td>
                        <td class="text-center">
                            @if ($coupon->status == 1)
                            <a href="{{ route('un-coupon', $coupon->id)}}"
                                class="btn btn-sm btn-success"><span>Enable</span>
                            </a>
                            @else
                            <a href="{{ route('pub-coupon', $coupon->id) }}" class="btn btn-sm btn-warning">
                                <span>Disable</span>
                            </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.coupon.destroy', $coupon->id)}}" method="POST">
                                <!--General Button -->
                                <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Coupon Code</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Expire On</th>
                        <th class="text-center">Status</th>
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

@endsection


@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable();
    });

</script>

@endpush
