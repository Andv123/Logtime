@extends('layout.index')

@section('title')
    Edit Overtime
@endsection

@section('content')
    <!-- START -->
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">Overtime</li>
                            <li class="breadcrumb-item active">Edit</li>
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
                @if (session('error'))
                    <div class="alert text-bold text-danger global">
                        {{session('error')}}
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
                    <form action="../page/overtime/edit/{{$overtime->id}}" method="POST" id="formOT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label>Username :</label>
                                <input name="username" value="{{$overtime->user_id}}" type="hidden">
                                <input type="text"  class="form-control"
                                      value="{{$overtime->user->full_name}}" readonly>
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="dateOT">Date OT :</label>
                                <input type="date" id="dateOT" name="dateOT" class="form-control"
                                       value="{{$overtime->date}}">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="dateOT">Date type :</label>
                                <select class="form-control" name="date_type">
                                    <option value="{{$overtime->date_type}}">
                                        <?php
                                        if ($overtime->date_type == 1) {
                                            echo "Weekday";
                                        } elseif ($overtime->date_type == 2) {
                                            echo "Weekend";
                                        } else {
                                            echo "Holiday";
                                        }
                                        ?>
                                    </option>
                                    <option value="1">Weekday</option>
                                    <option value="2">Weekend</option>
                                    <option value="3">Holiday</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4 form-group mb-3">
                                <label for="start">Time start :</label>
                                <input type="time" name="start" id="start" class="form-control"
                                       value="{{$overtime->time_start}}">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="end">Time end :</label>
                                <input type="time" id="end" name="end" class="form-control"
                                       value="{{$overtime->time_end}}">
                                <span class="error-time small"></span>
                            </div>
                        </div><br>
                        <div class="row form-group">
                            <label for="work">Work OT:</label>
                            <textarea class="work-text" id="work" name="work" rows="3"
                                      placeholder="Enter work OT">{{$overtime->work}}</textarea>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" class="form-submit btn btn-info" value="Update">
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
    <script src="js/validate-overtime.js"></script>
    <script>
        $('.sidebar__menu--over-time .now-active').addClass('active');
        $('.sidebar__menu--off-time .now-active,' +
            '.sidebar__menu--user .now-active,' +
            '.sidebar__menu--add-ot .now-active').removeClass('active');
    </script>
@endsection
