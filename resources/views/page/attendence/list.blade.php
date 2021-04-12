@extends('layout.index')
@section('title')
    List Offtime
@endsection
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">Off times</li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="../page/attendence/add/{{Auth::User()->id}}"
                           class="btn btn-primary float-sm-right">
                            <i class="fas fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->

                @if(session('global'))
                    <div class="alert alert-success global">
                        {{session('global')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>Date off</th>
                        <th>Off time</th>
                        <th>Reason</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                        @foreach($attendence as $att)
                            <tr class="odd gradeX" align="center">
                                <td>{{$i}}</td>
                                <td>{{$att->user->full_name}}</td>
                                <td>{{$att->date}}</td>
                                <td>
                                    <?php
                                        if ($att->off_time == 1) {
                                            echo '1 (hour)';
                                        } elseif ($att->off_time == 4) {
                                            echo '1/2 (day)';
                                        } else {
                                            echo '1 (day)';
                                        }
                                    ?>
                                </td>
                                <td class="text-left">{{$att->reason}}</td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
                <div>{{$attendence->links()}}</div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection

@section('script')
    <script>
        $('.sidebar__menu--off-time .now-active').addClass('active');
        $('.sidebar__menu--over-time .now-active,' +
            ' .sidebar__menu--user .now-active,' +
            ' .sidebar__menu--add-ot .not-active').removeClass('active');
    </script>
@endsection
