@extends('layout.index')

@section('title')
    {{Auth::User()->full_name}}
@endsection

@section('content')
    <div class="content"><br>
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <img src="dist/img/{{Auth::User()->picture}}"
                     class="img-responsive img-circle tm-border w-100" alt="">
                <p class="h1 text-center bold">{{Auth::User()->full_name}}</p>
            </div>
            <div class="col-md-1 col-sm-1"></div>
            <div class="col-md-4">
                <!-- contact -->
                <div class="contact">
                    <h2>Information</h2>
                    <hr class="divider mr-2">
                    <p><i class="fa fa-user-alt"></i> Username: {{Auth::User()->user_name}}</p>
                    <p><i class="fa fa-envelope"></i> Position: {{Auth::User()->position}}</p>
                    <p><i class="fa fa-envelope"></i> Email: {{Auth::User()->email}}</p>
                    <p><i class="fa fa-phone"></i> Phone number:
                        <?php
                        if (isset(Auth::User()->phone_number)) {
                            echo  '0'.Auth::User()->phone_number;
                        } else {
                            echo "No information";
                        }
                        ?>
                    </p>
                </div>
                <a href="../page/profile/edit/{{Auth::User()->id}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div><br>


@endsection
@section('script')
    <script>
        $('.sidebar__menu--over-time .now-active').removeClass('active');
        $('.sidebar__menu--off-time .now-active').removeClass('active');
        $('.sidebar__menu--user .now-active').addClass('active');
        $('.sidebar__menu--add-ot .now-active').removeClass('active');
    </script>
@endsection
