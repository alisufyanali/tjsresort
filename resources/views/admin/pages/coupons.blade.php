@extends('admin.layouts.app')

@section('style')

@endsection




@section('content')

<!-- testimonial and top selling start -->
<div class="col-md-12">
    <div class="card table-card">
        <div class="card-header">

            @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <a class="btn btn-primary btn-add-task waves-effect waves-light m-t-10" href="#" data-bs-toggle="modal" data-bs-target="#addCouponModal"><i class="icofont icofont-plus"></i> Add Coupon</a>
 
            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Discount Type</th>
                        <th>Discount Usage</th>
                        <th>Expiry Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="couponTable">
                    @if(isset($data['coupons']))
                    @foreach ($data['coupons'] as $coupon)

                    <tr data-id="{{ $coupon->id }}">
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->discount }}</td>
                        <td>{{ $coupon->discount_type }}</td>
                        <td>{{ $coupon->discount_usage }}</td>
                        <td>{{ $coupon->expiry_date }}</td>
                        <td>
                            <button class="btn btn-warning edit-coupon mary btn-add-task m-0" href="#" data-id="{{ $coupon->id }}" 
                            data-bs-toggle="modal" data-bs-target="#editCouponModal">
                            <i class="fa fa-edit"></i></button>

                            <button class="btn btn-danger delete-coupon" data-id="{{ $coupon->id }}">
                            <i class="fa fa-trash"></i></button>
                                
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



<!-- Add Coupon Modal -->
<div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="locationModalLabel">Add New Coupon</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="8z3gvd"></button>
            </div>
            <div class="modal-body">
                <form id="addCouponForm">
                    @csrf
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control" id="discount" name="discount" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="DiscountType">Discount Type</label>
                        <select name="discount_type" class="form-select"  id="DiscountType">
                            <option value="percent">percent</option>
                            <option value="plain">plain</option>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="DiscountUsage">DiscountUsage</label>
                        <input type="text" class="form-control" id="DiscountUsage" name="discount_usage" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Add Coupon</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Coupon Modal -->
<div class="modal fade" id="editCouponModal" tabindex="-1" role="dialog" aria-labelledby="editCouponModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="locationModalLabel">Edit Coupon</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="8z3gvd"></button>
            </div>

            <div class="modal-body">
                <form id="editCouponForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editCouponId">
                    <div class="form-group">
                        <label for="editCode">Code</label>
                        <input type="text" class="form-control" id="editCode" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="edit_expiry_date" name="expiry_date" required>
                    </div>
                    <div class="form-group">
                        <label for="editDiscount">Discount</label>
                        <input type="number" class="form-control" id="editDiscount" name="discount" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="editDiscountType">Discount Type</label>
                        <select name="discount_type" class="form-select"  id="editDiscountType">
                            <option value="percent">percent</option>
                            <option value="plain">plain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editDiscountUsage">DiscountUsage</label>
                        <input type="text" class="form-control" id="editDiscountUsage" name="discount_usage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Coupon</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection



@section('script')
<script>
$(document).ready(function() {
    // Add Coupon
    $('#addCouponForm').on('submit', function(e) {  
        e.preventDefault();
        $.ajax({
            url: '{{ route("admin.coupons.store") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.errors) {
                    // Handle validation errors
                    console.log(response.errors);
                } else {
                    // Add the new coupon to the table
                    $('#couponTable').append(`
                        <tr data-id="${response.coupon.id}">
                            <td>${response.coupon.code}</td>
                            <td>${response.coupon.discount}</td>
                            <td>${response.coupon.discount_type}</td>
                            <td>${response.coupon.discount_usage}</td>
                            <td>${response.coupon.expiry_date}</td>
                            <td>
                                <button class="btn btn-warning edit-coupon" data-id="${response.coupon.id}" data-toggle="modal" data-target="#editCouponModal">Edit</button>
                                <button class="btn btn-danger delete-coupon" data-id="${response.coupon.id}">Delete</button>
                            </td>
                        </tr>
                    `);
                    $('#addCouponModal').modal('hide');
                }
            }
        });
    });

    // Edit Coupon
    $(document).on('click', '.edit-coupon', function() {
        var id = $(this).data('id');
        $.get(`edit/${id}`, function(data) {
            $('#editCouponId').val(data.id);
            $('#editCode').val(data.code);
            $('#edit_expiry_date').val(data.expiry_date);
            $('#editDiscount').val(data.discount);
            $('#editDiscountType').val(data.discount_type);
            $('#editDiscountUsage').val(data.discount_usage);
        });
    });

    $('#editCouponForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#editCouponId').val();
        $.ajax({
            url: `update/${id}`,
            method: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                if (response.errors) {
                    // Handle validation errors
                    console.log(response.errors);
                } else {
                    // Update the coupon in the table
                    $(`tr[data-id="${id}"]`).replaceWith(`
                        <tr data-id="${response.coupon.id}">
                            <td>${response.coupon.code}</td>
                            <td>${response.coupon.discount}</td>
                            <td>${response.coupon.discount_type}</td>
                            <td>${response.coupon.discount_usage}</td>
                            <td>${response.coupon.expiry_date}</td>
                            <td>
                                <button class="btn btn-warning edit-coupon" data-id="${response.coupon.id}" data-toggle="modal" data-target="#editCouponModal">Edit</button>
                                <button class="btn btn-danger delete-coupon" data-id="${response.coupon.id}">Delete</button>
                            </td>
                        </tr>
                    `);
                    $('#editCouponModal').modal('hide');
                }
            }
        });
    });

    // Delete Coupon
    $(document).on('click', '.delete-coupon', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this coupon?')) {
            $.ajax({
                url: `/coupons/${id}`,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $(`tr[data-id="${id}"]`).remove();
                }
            });
        }
    });
});
</script>


@endsection