<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log time | Log in</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="public/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="public/login/css/style.css">
</head>
<body>
<?php //dd($_COOKIE);?>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="public/login/images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form action="page/login" method="POST" class="register-form" id="loginForm">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif

                            @if (session('global'))
                                <div class="alert alert-danger">
                                    {{session('global')}}
                                </div>
                            @endif
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="lb-login" for="name">
                                    <i class="zmdi zmdi-account material-icons-name"></i>
                                </label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php
                                    if (isset($_COOKIE['name']))
                                        { echo $_COOKIE['name']; }?>">
                            </div>
                            <div class="form-group">
                                <label class="lb-login" for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                       value="<?php
                                            if (isset($_COOKIE['pass']))
                                                { echo $_COOKIE['pass']; }?>">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"
                                    <?php if(isset($_COOKIE['name'])) { echo 'checked="checked"'; }
                                        else { echo ""; }?>>
                                <label for="remember-me" class="label-agree-term">
                                    <span><span></span></span>Remember me
                                </label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Log in">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/jquery.validate.min.js"></script>
    <script src="public/js/main.js"></script>
</body>
</html>
