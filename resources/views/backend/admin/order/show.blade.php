@extends('backend.master')

@section('title')
Order Details
@endsection

@push('css')

@endpush

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Order Details</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Order Details</span></li>
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
            <h3 class="card-title"><b>Order Information</b></h3>
        </div>
        <!-- /.card-header -->

        <!-- card-body -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Order Number</th>
                    <td>01</td>
                </tr>
                <tr>
                    <th>Order Total</th>
                    <td>1400</td>
                </tr>
                <tr>
                    <th>Order Status</th>
                    <td>Pending</td>
                </tr>
                <tr>
                    <th>Order Date</th>
                    <td>25-05-2020</td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- card -->
    <div class="card">
        <!-- card-header -->
        <div class="card-header">
            <h3 class="card-title"><b>Customer Information</b></h3>
        </div>
        <!-- /.card-header -->

        <!-- card-body -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Customer Name</th>
                    <td>01</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>1400</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>Pending</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>25-05-2020</td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- card -->
    <div class="card">
        <!-- card-header -->
        <div class="card-header">
            <h3 class="card-title"><b>Shipping Information</b></h3>
        </div>
        <!-- /.card-header -->

        <!-- card-body -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <td>01</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>1400</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>Pending</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>25-05-2020</td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- card -->
    <div class="card">
        <!-- card-header -->
        <div class="card-header">
            <h3 class="card-title"><b>PaymentInformation</b></h3>
        </div>
        <!-- /.card-header -->

        <!-- card-body -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Payment Status</th>
                    <td>Sucess</td>
                </tr>
                <tr>
                    <th>Payment Type</th>
                    <td>Bkash</td>
                </tr>
                <tr>
                    <th>Transaction Id</th>
                    <td>112530</td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection


@push('scripts')
<script>

</script>
@endpush
