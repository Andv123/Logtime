@extends('layout.index')

@section('title')
    Add overtime
@endsection

@section('content')
    <?php //dd($overtime); ?>
    <!-- START -->
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">Over times</li>
                            <li class="breadcrumb-item active">Log Overtime</li>
                        </ol>
                    </div>
                </div>
                <hr class="divider my-4">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-2">Welcome to Log Overtime</h5><br>
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
                        <form action="../page/overtime/add/{{Auth::User()->id}}" method="POST"> <!--
                        id="formOT"> -->
                            <input name="overtimeId" type="hidden" value="<?php
                                if (isset($overtime['id'])) { echo $overtime['id'];} ?>">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <label for="dateOT">Date OT:</label>
                            <input class="text-left" id="dateOT" name="dateOT" value="<?php
                                if (isset($overtime['date'])) {
                                    echo $overtime['date'];
                                } else {
                                    $date = getdate();
                                    echo $date['year']."-".$date['mon']."-".$date['mday'];
                                }?>" readonly size="7"><br>
                            <label for="date_type">Date-type:</label>
                            <select class="" name="date_type" id="date_type">
                                <?php if (isset($overtime['data_type'])) {?>
                                <option value="{{$overtime['date_type']}}">
                                    <?php
                                    if ($overtime['date_type'] == 1) {
                                        echo "Weekday";
                                    } elseif ($overtime['date_type'] == 2) {
                                        echo "Weekend";
                                    } else {
                                        echo "Holiday";
                                    }
                                echo '</option>';
                                }?>
                                <option value="1">Weekday</option>
                                <option value="2">Weekend</option>
                                <option value="3">Holiday</option>
                            </select>
                            <p>Click button <button type="submit" class="btn btn-success startOT">Start</button>
                                to begin add log overtime !</p>
                            <span class="time-start"><?php
                                    if (isset($overtime['start'])) {
                                        echo 'Time start: '.$overtime['start']; }
                                    ?></span>
                            <input type="hidden" id="start" name="start" class="start-ot" value="<?php
                                if (isset($overtime['start'])) {
                                    echo $overtime['start'];
                                }?>">
                            <p class="endOT">Click button <button type="submit" class="btn btn-danger end">
                                End</button>
                                to end add log overtime !</p>
                            <span class="time-end"><?php
                                    if (isset($overtime['end'])) {
                                        echo 'Time end: '.$overtime['end'];
                                    }
                                    ?></span>
                            <input type="hidden" id="end" name="end" class="end-ot" value="<?php
                                    if (isset($overtime['end'])) {
                                        echo $overtime['end'];
                                    }
                                ?>">
                            <div class="form-group work-OT">
                                <label class="form-control" for="work">Work to Over time</label>
                                <textarea class="col-md-12" id="work" name="work"
                                    placeholder="Enter work OT"><?php
                                    if (isset($overtime['work'])) {
                                        echo $overtime['work'];
                                    }
                                    ?></textarea>
                            </div>
                            <input type="submit" value="Add" class="btn btn-info addOT">
                        </form>
                    </div>
                    <div class="col-md-6">
                        <iframe src="https://calendar.google.com/calendar/embed?src=vi.vietnamese%23holiday%40group.v.calendar.google.com&ctz=Asia%2FHo_Chi_Minh"
                                width="100%" height="490px" frameborder="0" scrolling="no"
                                class="calendar"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->
@endsection

@section('script')
    <script>
        $('.sidebar__menu--add-ot .now-active').addClass('active');
        $('.sidebar__menu--off-time .now-active,' +
            '.sidebar__menu--over-time .now-active,' +
            '.sidebar__menu--user .now-active').removeClass('active');
    </script>
    <script src="js/validate-overtime.js"></script>
@endsection
