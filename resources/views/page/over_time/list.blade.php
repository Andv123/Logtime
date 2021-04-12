@extends('layout.index')
@section('title')
    List overtime
@endsection
@section('content')
    <?php
        //var_dump($overtime);exit();
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">Over times</li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="../page/overtime/add/{{Auth::User()->id}}"
                            class="btn btn-primary float-sm-right">
                            <i class="fas fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="row">
                    @if(session('error'))
                        <div class="alert alert-danger global">
                            {{session('error')}}
                        </div>
                    @endif
                    @if(session('global'))
                        <div class="alert alert-success global">
                            {{session('global')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Date</th>
                        <th>Type date</th>
                        <th>Username</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Work</th>
                        <th>Overtime</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($overtime))
                            <?php $i = 1; ?>
                            @foreach($overtime as $ot)
                            <tr class="odd gradeX" align="center">
                                <td>{{$i}}</td>
                                <td>{{$ot->date}}</td>
                                <td>
                                    <?php
                                        if ($ot->date_type == 1) {
                                            echo "weekday";
                                        } elseif ($ot->date_type == 2) {
                                            echo "weekend";
                                        } else {
                                            echo "holiday";
                                        }
                                    ?>
                                </td>
                                <td>{{$ot->user->full_name}}</td>
                                <td>{{$ot->time_start}}</td>
                                <td>{{$ot->time_end}}</td>
                                <td class="text-left">{{$ot->work}}</td>
                                <td>{{$ot->over_time}}</td>
                                <td class="center">
                                    <a href="../page/overtime/edit/{{$ot->id}}" >
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                                <td class="center">
                                    <a href="../page/overtime/delete/{{$ot->id}}"
                                        onclick="return confirm('Are you sure you want to delete this overtime ?');">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div>{{$overtime->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- /#page-wrapper -->

@endsection
@section('script')
    <script>
        $('.sidebar__menu--over-time .now-active').addClass('active');
        $('.sidebar__menu--off-time .now-active,' +
            '.sidebar__menu--user .now-active,' +
            '.sidebar__menu--add-ot .now-active').removeClass('active');
    </script>
@endsection
