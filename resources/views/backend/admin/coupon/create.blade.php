@extends('backend.master')

@section('title')
Coupon Code
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('backend') }}/css/jquery.datepicker2.css">
@endpush

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Create Coupon Code</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Create Coupons</span></li>
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
                <a href="{{ route('admin.coupon.index') }}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i> All Coupons
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
            <form action="{{ route('admin.coupon.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="couponCode" class="col-sm-2 offset-1 col-form-label">Coupon Code</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="couponAmount" class="col-sm-2 offset-1 col-form-label">Coupon Amount</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="amount" placeholder="Coupon Amount">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amountType" class="col-sm-2 offset-1 col-form-label">Amount Type</label>
                    <div class="col-sm-8">
                        <select name="amount_type" id="" class="form-control">
                            <option value="Fixed">Fixed</option>
                            <option value="Percentage">Percentage</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expiraryDate" class="col-sm-2 offset-1 col-form-label">Expirary Date</label>
                    <div class="col-sm-8">
                        <input type="text" name="expire_date" id="date" class="form-control" data-select="datepicker">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="imageinput" class="col-sm-2 offset-1 col-form-label">Status</label>
                    <br>
                    <div class="col-sm-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="status" class="custom-control-input"
                                value="1" checked>
                            <label class="custom-control-label" for="customRadioInline1">Enable</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="status" class="custom-control-input"
                                value="0">
                            <label class="custom-control-label" for="customRadioInline2">Disable</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <br>
                    <button type="submit" class="btn btn-primary">Create Coupon</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection


@push('scripts')

<script src="{{ asset('backend/js/jquery.datepicker2.min.js')}}"></script>

@endpush
