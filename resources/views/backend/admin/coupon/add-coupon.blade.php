<div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.coupon.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="couponCode">Coupon Code</label>
                        <input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code">
                    </div>
                    <div class="form-group">
                        <label for="couponAmount">Coupon Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="Coupon Amount">
                    </div>
                    <div class="form-group">
                        <label for="amountType">Amount Type</label>
                        <select name="amount_type" id="" class="form-control">
                            <option value="Fixed">Fixed</option>
                            <option value="Percentage">Percentage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="expiraryDate">Expirary Date</label>
                        <input type="text" name="date" id="date" data-select="datepicker">
                        {{-- <input type="text" id="datepicker" class="form-control" name="expire_date"> --}}
                    </div>

                    <div class="form-group">
                        <label for="imageinput">Status</label>
                        <br>
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
                    <hr>

                    <button type="submit" class="btn btn-primary">Create Coupon</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>

            </div>
        </div>
    </div>
</div>
