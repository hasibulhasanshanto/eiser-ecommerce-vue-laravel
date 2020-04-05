@extends('frontend.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-3 col-md-6">
            <div class="card mt-5 mb-5">
                <div class="card-header text-center">
                    <h3>Dear {{Session::get('customerName')}}, Please Give your Payment info!</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td>Cash on delivery</td>
                                <td><input type="radio" name="payment_info" value="cash"></td>
                            </tr>
                            <tr>
                                <td>Visa/Master Card</td>
                                <td><input type="radio" name="payment_info" value="card"></td>
                            </tr>
                            <tr>
                                <td>Bkash</td>
                                <td><input type="radio" name="payment_info" value="bkash"></td>
                            </tr>
                            <tr>
                                <td>Stripe</td>
                                <td><input type="radio" name="payment_info" value="stripe"></td>
                            </tr>
                        </table>

                        <button type="submit" class="btn btn-primary">Confirm Order</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
