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
                                            <a class="nav-link waves-effect d-block " data-toggle="pill"
                                                href="{{ route('admin.email.list') }}" role="tab">
                                                <i class="icofont icofont-inbox"></i> Inbox
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link waves-effect d-block " data-toggle="pill"
                                                href="{{ route('admin.email.draft') }}" role="tab">
                                                <i class="icofont icofont-file-text"></i> Drafts
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link waves-effect d-block active" data-toggle="pill"
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

                                        <div class="mail-body">
                                            <div class="mail-body-header">
                                                <br>
                                                <br>
                                                <br>
                                            </div>
                                            <div class="mail-body-content">
                                                <div class="table-responsive m-2">
                                                    <table  id="dom-jqry" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Email</th>
                                                                <th>Subject</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if(isset($data['emails']))
                                                            @foreach ($data['emails'] as $key => $email)
                                                            <tr>
                                                                <th scope="row">{{ $key + 1}}</th>
                                                                <td>{{ $email->recipient }}</td>
                                                                <td>{{ $email->subject }}</td>
                                                                <td>

                                                                    <a class="btn btn-success p-1"
                                                                        href="{{ route('admin.email.view' ,$email->id ) }}">
                                                                        <i class="fa fa-eye m-0"></i>
                                                                    </a>
                                                                </td>

                                                            </tr>

                                                            @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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



@endsection