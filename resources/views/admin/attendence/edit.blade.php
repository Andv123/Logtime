@extends('layout.index')

@section('title')
    Edit Offtime
@endsection

@section('content')
    <!-- START -->
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">Off times</li>
                            <li class="breadcrumb-item active">Edit off time</li>
                        </ol>
                    </div>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if (isset($error))
                    <div class="alert text-danger text-bold global">
                        {{$error}}
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
                    <form action="../admin/attendence/edit/{{$attendence->id}}" method="POST" id="formOff"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label>User name :</label>
                                <select class="form-control" name="username">
                                    <option></option>
                                    @foreach ($user as $us)
                                        <option <?php if ($attendence->user->id == $us->id): ?>
                                                {{"selected"}}
                                                <?php endif ?>
                                                value="{{$us->id}}">{{$us->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="dateOff">Date off :</label>
                                <input type="date" id="dateOff" name="dateOff" class="form-control"
                                    value="{{$attendence->date}}">
                            </div>
                            <div class="col-md-2 form-group mb-3">
                                <label for="timeOff">Time off :</label><br>
                                <select class="form-control" id="timeOff" name="timeOff">
                                    <option <?php if ($attendence->user->id == $us->id): ?>
                                            {{"selected"}}
                                            <?php endif ?>
                                            value="{{$attendence->off_time}}">
                                        <?php
                                            if ($attendence->off_time == 1) {
                                                echo '1 (hour)';
                                            } elseif ($attendence->off_time == 4) {
                                                echo '1/2 (day)';
                                            } else {
                                                echo '1 (day)';
                                            }
                                        ?>
                                    </option>
                                    <option value="1">1 (hour)</option>
                                    <option value="4">1/2 (day)</option>
                                    <option value="8">1 (day)</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <label for="reason">Reason off :</label>
                            <textarea class="work-text" id="reason" name="reason" rows="2"
                                      placeholder="Enter reason off">{{$attendence->reason}}</textarea>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" class="form-submit btn btn-info" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="js/validate-offtime.js"></script>
    <script>
        $('.off-title').addClass('active');
        $('.ot-title, .user-title').removeClass('active');
    </script>
@endsection
