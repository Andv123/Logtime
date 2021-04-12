@extends('layout.index')

@section('title')
    Search
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
                            <li class="breadcrumb-item">Search</li>
                            <li class="breadcrumb-item active">"{{$data['key']}}"</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    @if(session('global'))
                        <div class="alert alert-danger">
                            {{session('global')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr class="text-center">
                            <th>Stt</th>
                            <th>User name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Phone number</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($data['user'] as $user)
                            <tr class="odd gradeX" align="center">
                                <td>{{$i}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->position}}</td>
                                <td>
                                    <?php
                                        if (isset($user->phone_number)) {
                                            echo '0'.$user->phone_number;
                                        } else {
                                            echo 'No information';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="../admin/details/{{$user->id}}" >
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
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
