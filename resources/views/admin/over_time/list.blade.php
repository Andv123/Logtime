@extends('layout.index')
@section('title')
    List User overtime
@endsection
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">Over times</li>
                            <li class="breadcrumb-item active">List over time</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    @if(session('global'))
                        <div class="alert alert-success global">
                            {{session('global')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr class="text-center">
                            <th>Stt</th>
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
                                        <a href="../admin/overtime/edit/{{$ot->id}}" >
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="../admin/overtime/delete/{{$ot->id}}"
                                           onclick="return confirm('Are you sure you want to delete this over time?');">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{$overtime->links()}}
                    </div>
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
        $('.ot-title').addClass('active');
        $('.off-title, .user-title').removeClass('active');
    </script>
@endsection
