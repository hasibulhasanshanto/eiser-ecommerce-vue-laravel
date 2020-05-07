@extends('backend.master')

@section('title')
Manage Order
@endsection

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Manage Order</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Order</span></li>
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
            <h3 class="card-title"><b>All Orders</b></h3>
        </div>
        <!-- /.card-header -->

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
                        <th>Order Num</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th class="text-center" width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key=>$order)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->full_name }}</td>
                        <td>{{ $order->order_total }}</td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->payment }} </td>
                        <td class="text-center">
                            <!--  -->
                            <form action="" method="POST">
                                <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-success"><i class="fas fa-download"></i></a>

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
                        <th>Order Num</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection


@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable();
    });

</script>


@endpush
