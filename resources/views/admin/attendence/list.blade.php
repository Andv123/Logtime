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
                            <li class="breadcrumb-item active">List off time</li>
                        </ol>
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
                        <th>STT</th>
                        <th>Fullname</th>
                        <th>Date off</th>
                        <th>Off time</th>
                        <th>Reason</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                        @foreach($attendence as $att)
                            <tr class="odd gradeX" align="center">
                                <td>{{$i}}</td>
                                <td>{{$att->user->full_name}}</td>
                                <td>{{$att->date}}</td>
                                <td>{{$att->off_time}}(hours)</td>
                                <td class="text-left">{{$att->reason}}</td>
                                <td class="center">
                                    <a href="../admin/attendence/edit/{{$att->id}}" >
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                                <td class="center">
                                    <a href="../admin/attendence/delete/{{$att->id}}"
                                       onclick="return confirm('Are you sure you want to delete this attendence?');">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$attendence->links()}}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection

@section('script')
    <script>
        $('.off-title').addClass('active');
        $('.ot-title, .user-title').removeClass('active');
    </script>
@endsection
