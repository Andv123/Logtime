@extends('layout.index')

@section('title')
    Add User
@endsection

@section('content')

    <!-- START -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">User manage</li>
                        <li class="breadcrumb-item active">Add new user</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- error message -->
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if (session('global'))
                <div class="alert alert-success global">
                    {{session('global')}}
                </div>
            @endif
            <!-- end error -->

            <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
                <div class="form h-100">
                    <form action="../admin/user_manage/add" method="POST" id="formUser">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="username">User name :</label>
                                <input name="username" id="username" class="form-control"
                                       onkeyup="user" placeholder="Enter username">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="email">Email :</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       placeholder="Enter Email address">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Enter password">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="password_again">Confirm Password :</label>
                                <input type="password" id="password_again" name="password_again" class="form-control"
                                       placeholder="Re-enter password">
                                <span class="error-pass"></span>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="position">Position :</label>
                                <input type="text" name="position" class="form-control"
                                       placeholder="Enter position">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label>Role :</label>&nbsp;&nbsp;
                                <label class="radio-inline">
                                    <input name="role" id="role" value="1" checked="" type="radio">Admin
                                </label>&nbsp;&nbsp;
                                <label class="radio-inline">
                                    <input name="role" id="role" value="0" checked="" type="radio">User
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-submit btn btn-info" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="js/validate-add-user.js"></script>
    <script>
        $('.user-title').addClass('active');
        $('.off-title, .ot-title').removeClass('active');
    </script>
@endsection
