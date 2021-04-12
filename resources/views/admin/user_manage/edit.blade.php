@extends('layout.index')

@section('title')
    Edit User
@endsection

@section('content')
<?php
    //var_dump($user->full_name);exit();
?>
    <!-- START -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">User manage</li>
                        <li class="breadcrumb-item active">Edit user</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(isset($error))
                <div class="alert text-danger text-bold global">
                    @foreach($error as $key => $value)
                        {{$value}}<br>
                    @endforeach
                </div>
            @endif
            @if (session('global'))
                <div class="alert alert-success global">
                    {{session('global')}}
                </div>
            @endif
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-12">
                    <div class="form h-100">
                        <form action="../admin/user_manage/edit/{{$user->id}}" method="POST" id="formUser"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="username">User name :</label>
                                    <input name="username" id="username" class="form-control"
                                        value="{{$user->user_name}}">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="email">Email :</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                           placeholder="Enter Email address" value="{{$user->email}}">
                                </div>
                            </div><br>
                            <div class="form-group">
                                <input id="changePassword" type="checkbox" name="changePassword">
                                <label for="changePassword">Change password</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="password">Password :</label>
                                    <input type="password" name="password" id="password" class="form-control change"
                                           placeholder="Enter password" disabled="disabled">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="password_again">Confirm Password :</label>
                                    <input type="password" id="password_again" name="password_again"
                                           class="form-control change" placeholder="Re-enter password" disabled="disabled">
                                    <span class="error-pass"></span>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="fullname">Fullname :</label>
                                    <input type="text" name="fullname" class="form-control"
                                           placeholder="Enter fullname" value="{{$user->full_name}}">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="position">Position :</label>
                                    <input type="text" name="position" class="form-control"
                                           placeholder="Enter position" value="{{$user->position}}">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="phone_number">Phone number :</label>
                                    <input type="text" name="phone_number" class="form-control"
                                           placeholder="Enter phone number" value="<?php
                                                if (isset($user->phone_number)) {
                                                    echo '0'.$user->phone_number;
                                                }else { echo "";}?>">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="phone_number">Picture :</label>
                                    <input type="file" name="picture" class="form-control">
                                    <input type="hidden" name="picture-old" value="{{$user->picture}}">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Role :</label>&nbsp;&nbsp;
                                    <label class="radio-inline">
                                        <input name="role" id="role" value="1"
                                            <?php if ($user->role == 1): ?>
                                                {{"checked"}}
                                            <?php endif ?>
                                            type="radio">Admin
                                    </label>&nbsp&nbsp
                                    <label class="radio-inline">
                                        <input name="role" id="role" value="0"
                                               <?php if ($user->role == 0): ?>
                                               {{"checked"}}
                                               <?php endif ?>
                                               type="radio">User
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-submit btn btn-info" value="Update">
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if ($(this).is(":checked")) {
                    $('.change').removeAttr('disabled');
                }else {
                    $('.change').attr('disabled','');
                }
            });
        });
        $('.user-title').addClass('active');
        $('.off-title, .ot-title').removeClass('active');
    </script>
@endsection
