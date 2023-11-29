@extends('back.layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="iq-edit-list usr-edit">
                    <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-6 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                Personal Information
                            </a>
                        </li>
                        <li class="col-md-6 p-0">
                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="iq-edit-list-data">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Personal Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('save_profile') }}" method="POST" enctype="multipart/form-data"
                                id="formPersonal">
                                @csrf
                                <div class="form-group row align-items-center">
                                    <div class="col-md-12">
                                        <div class="profile-img-edit">
                                            <div class="crm-profile-img-edit">
                                                <img class="crm-profile-pic rounded-circle avatar-100"
                                                    src="{{ asset(Auth::user()->photo == null ? 'back/assets/images/user/07.jpg' : Auth::user()->photo) }}"
                                                    alt="profile-pic">
                                                <div class="crm-p-image bg-primary">
                                                    <i class="las la-pen upload-button"></i>
                                                    <input class="file-upload" name="photo" type="file"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="form-group col-sm-6">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ Auth::user()->name }}" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                            value="{{ Auth::user()->username }}" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            value="{{ Auth::user()->address }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="phone">Whatsapp</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('change-pass') }}" method="POST" id="formChangePass">
                                @csrf
                                <div class="form-group">
                                    <label for="cpass">Current Password:</label>
                                    <input type="Password" name="current_password" class="form-control" id="cpass" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="npass">New Password:</label>
                                    <input type="Password" name="new_password" class="form-control" id="npass" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="vpass">Verify Password:</label>
                                    <input type="Password" name="retype" class="form-control" id="vpass" value="" required>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('back/assets/js/response.js') }}"></script>
    <script src="{{ asset('back/assets/js/chart-custom.js') }}"></script>

    <script>
        $('#formPersonal, #formChangePass').submit(function(e) {
            e.preventDefault();

            const url = $(this).attr("action");
            const formData = new FormData(this);

            $.ajax({
                type: "post",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    var title = "";
                    var icon = "";

                    if (response.alert == '1') {
                        title = "Berhasil";
                        icon = "success";

                        getresponseReload(icon, response.message, title);
                    } else {
                        title = "Error !";
                        icon = "error";

                        getresponse(icon, response.message, title);
                    }

                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });
    </script>
@endsection
