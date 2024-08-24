@extends('admin.layouts.app')

@section('style')

@endsection




@section('content')


<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Page-body start -->
            <div class="page-body">
                <div class="card">
                    <!-- Email-card start -->
                    <div class="card-block email-card">
                        <div class="row">
                            <div class="col-lg-12 col-xl-3">
                                <div class="user-head row">
                                    <div class="user-face">
                                        <img class="img-fluid" src="{{ asset('public/admin/assets/images/logo.png') }}"
                                            style="width:3rem;" alt="Theme-Logo" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-9">
                                <div class="mail-box-head row justify-content-end">
                                    <div class="col-auto">
                                        <form class="form-material">
                                            <div class="material-group">
                                                <div class="form-group form-default">
                                                    <input type="text" name="footer-email" class="form-control"
                                                        required="">
                                                    <span class="form-bar"></span>
                                                    <label class="form-label float-label">Search</label>
                                                </div>
                                                <div class="material-addone">
                                                    <i class="icofont icofont-search"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Left-side section start -->
                            <div class="col-lg-12 col-xl-3">
                                <div class="user-body">
                                    <div class="p-20 text-center">
                                        <a href="{{ route('admin.email.compose') }}"
                                            class="btn btn-danger waves-effect">Compose</a>
                                    </div>
                                    <ul class="page-list nav nav-tabs flex-column" id="pills-tab" role="tablist">
                                        <li class="nav-item mail-section">
                                            <a class="nav-link waves-effect d-block active" data-toggle="pill"
                                                href="{{ route('admin.email.list') }}" role="tab">
                                                <i class="icofont icofont-inbox"></i> Inbox
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                href="{{ route('admin.email.draft') }}" role="tab">
                                                <i class="icofont icofont-file-text"></i> Drafts
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                href="{{ route('admin.email.sent') }}" role="tab">
                                                <i class="icofont icofont-paper-plane"></i> Sent Mail
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                href="{{ route('admin.email.trash') }}" role="tab">
                                                <i class="icofont icofont-ui-delete"></i> Trash
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <!-- Left-side section end -->
                            <!-- Right-side section start -->
                            <div class="col-lg-12 col-xl-9">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="e-inbox" role="tabpanel">
                                        <div class="mail-body-content">
                                            <form class="form-material" id="emailForm">
                                                @csrf
                                                <br>
                                                <br>
                                                <br>
                                                <div class="form-group form-primary">
                                                    <input type="email" name="recipient" class="form-control"
                                                        required="">
                                                    <span class="form-bar"></span>
                                                    <label class="form-label float-label">To</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-primary">
                                                                <input type="email" name="cc" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="form-label float-label">Cc</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-primary">
                                                                <input type="email" name="bcc" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="form-label float-label">Bcc</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="text" name="subject" class="form-control" required="">
                                                    <span class="form-bar"></span>
                                                    <label class="form-label float-label">Subject</label>
                                                </div>
                                                <br>

                                                <textarea id="message" name="body" style="display:none"></textarea>


                                                <!-- Inline Editor start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Message</h5>
                                                        <span>Click on text to change it</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="header">
                                                            <div id="headerRight">
                                                                <div contenteditable="true">
                                                                    <p>
                                                                        Lorem ipsum dolor sit amet enim. Etiam
                                                                        ullamcorper. Suspendisse a pellentesque dui, non
                                                                        felis. Maecenas malesuada elit lectus felis,
                                                                        malesuada ultricies.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Inline Editor end -->


                                                <br>
                                                <button type="submit" class="btn btn-primary"> Send</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Right-side section end -->
                        </div>
                    </div>
                    <!-- Email-card end -->
                </div>
            </div>
            <!-- Page-body start -->
        </div>
    </div>
    <!-- Main-body end -->
    <div id="styleSelector">

    </div>
</div>

@endsection



@section('script')

<!-- ck editor -->
<script src="{{ asset('public/admin/assets/pages/ckeditor/ckeditor.js') }}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('public/admin/assets/pages/ckeditor/ckeditor-custom.js') }}"></script>

<script>
$(document).ready(function() {

    $('#emailForm').on('submit', function(e) {
        e.preventDefault();
        message = $("#headerRight").children('div').html();
        $("#message").val(message);

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "{{ route('admin.email.store') }}",
            data: formData,
            success: function(response) {
                if(response.error){
                    alert(response.error)                    
                }else{
                    location.reload()
                }
            },
            error: function(error) {
                console.error('Error:', error.responseJSON);
                alert('Failed to send email.');
            }
        });
    });
});
</script>


@endsection