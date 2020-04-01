@extends('backend.master')

@section('title')
Edit Coupon
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('backend') }}/css/jquery.datepicker2.css">
@endpush

@section('head-tab')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0" style="background-color:#007BFF; padding:7px 0px; border-radius:4px;">
            <div class="col-sm-6">
                <h3 class="m-0 text-white">Coupons</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><span class="text-white">Home</span></a></li>
                    <li class="breadcrumb-item active"><span class="text-white">Edit Coupon</span></li>
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
            <h3 class="card-title"><b>Edit Coupons</b></h3>
            <div class="card-tools">
                <a href="{{ route('admin.coupon.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i> All
                    Coupon</a>
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
            <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="couponName" class="col-sm-2 offset-1 col-form-label">Coupon Code</label>
                    <div class="col-sm-8">
                        <input type="text" name="coupon_code" class="form-control" id="brandName"
                            value="{{ $coupon->coupon_code }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="couponAmount" class="col-sm-2 offset-1 col-form-label">Amount</label>
                    <div class="col-sm-8">
                        <input type="text" name="amount" class="form-control" id="brandName"
                            value="{{ $coupon->amount }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="couponType" class="col-sm-2 offset-1 col-form-label">Amount Type</label>
                    <div class="col-sm-8">
                        <select name="amount_type" class="form-control">
                            <option value="Fixed">Fixed</option>
                            <option value="Percentage">Percentage</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="couponExpire" class="col-sm-2 offset-1 col-form-label">Expire Date</label>
                    <div class="col-sm-8">
                        <input type="text" name="expire_date" id="date" class="form-control" data-select="datepicker"
                            value="{{ $coupon->expire_date }}">
                    </div>
                </div>



                <div class="form-group row">
                    <label for="couponStatus" class="col-sm-2 offset-1 col-form-label">Status</label>
                    <br>
                    <div class="col-sm-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="status" class="custom-control-input"
                                value="1" {{ $coupon->status == 1 ? 'checked': '' }}>
                            <label class="custom-control-label" for="customRadioInline1">Enable</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="status" class="custom-control-input"
                                value="0" {{ $coupon->status == 0 ? 'checked': '' }}>
                            <label class="custom-control-label" for="customRadioInline2">Disable</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <br>
                    <button type="submit" class="btn btn-primary">Update Coupon</button>
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
