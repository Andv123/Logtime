@extends('layout.index')

@section('title')
    Search details
@endsection

@section('content')
    <?php
        //print_r($data);exit();
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">Details</li>
                            <li class="breadcrumb-item active">"{{$data['user']->full_name}}"</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    @if(session('global'))
                        <div class="alert alert-danger">
                            {{session('global')}}
                        </div>
                    @endif
                    <div class="breadcrumb-item"> Over time</div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr class="text-center">
                            <th>Stt</th>
                            <th>User name</th>
                            <th>Date</th>
                            <th>Date_type</th>
                            <th>Over time</th>
                            <th>Work</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($data['ot'] as $ot)
                            <tr class="odd gradeX" align="center">
                                <td>{{$i}}</td>
                                <td>{{$ot->user->full_name}}</td>
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
                                <td>{{$ot->over_time}}</td>
                                <td class="text-left">{{$ot->work}}</td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="breadcrumb-item"> Off time</div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>User name</th>
                            <th>Date off</th>
                            <th>Time off</th>
                            <th>Reason off</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['off'] as $off)
                            <tr class="odd gradeX" align="center">
                                <td>{{$off->id}}</td>
                                <td>{{$off->user->full_name}}</td>
                                <td>{{$off->date}}</td>
                                <td>{{$off->off_time}}</td>
                                <td class="text-left">{{$off->reason}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- /#page-wrapper -->
@endsection

@section('script')
@endsection
