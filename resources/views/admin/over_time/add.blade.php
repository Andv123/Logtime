@extends('layout.index')

@section('title')
    Add User overtime
@endsection

@section('content')

    <!-- START -->
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">Over times</li>
                            <li class="breadcrumb-item active">Add new over time</li>
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
                    <div class="alert alert-danger global">
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
                    <form action="../admin/overtime/add" method="POST" id="formOT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label>Username :</label>
                                <select class="form-control" name="username">
                                    <option></option>
                                    @foreach ($user as $us)
                                        <option value="{{$us->id}}">{{$us->full_name}}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="dateOT">Date OT :</label>
                                <input type="date" id="dateOT" name="dateOT" class="form-control">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="dateOT">Date type :</label>
                                <select class="form-control" name="date_type">
                                    <option value="1">Weekday</option>
                                    <option value="2">Weekend</option>
                                    <option value="3">Holiday</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4 form-group mb-3">
                                <label for="start">Time start :</label>
                                <input type="time" name="start" id="start" class="form-control">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="end">Time end :</label>
                                <input type="time" id="end" name="end" class="form-control">
                                <span class="error-time"></span>
                            </div>
                        </div><br>
                        <div class="row form-group">
                            <label for="work">Work OT:</label>
                            <textarea class="work-text" id="work" name="work" rows="3"
                                      placeholder="Enter work OT"></textarea>
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
    <script src="js/validate-overtime.js"></script>
    <script>
        $('.ot-title').addClass('active');
        $('.off-title, .user-title').removeClass('active');
    </script>
@endsection
