@extends('layout.index')

@section('title')
    Home
@endsection

@section('content')
    <?php
        //dd($_COOKIE['name']);
    ?>
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">Page</li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-7">
                        <h1 class="text-uppercase text-white font-weight-bold">We're coming soon...</h1>
                    </div>
                    <div class="col-lg-7 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">If you would like to
                            contact to us.<br>
                            Please send to email
                            <a class="text-white" href="mailto:mail@domain.com"
                                onClick="javascript:window.open('mailto:mail@domain.com', 'Mail');
                                event.preventDefault()"> contact@allogical.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </header><br>
        <!-- Services-->
        <section class="page-section">
            <div class="container">
                <h2 class="text-center text-bold text-dark mt-0">Service</h2>
                <hr class="col-10 divider my-2">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-2">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h4 class="h5 mb-2">Publishing software</h4>
                            <p class="text-muted mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-2">
                            <i class="fas fa-4x fa-ad text-primary mb-4"></i>
                            <h4 class="h5 mb-2">Advertisement</h4>
                            <p class="text-muted mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-2">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h4 class="h5 mb-2">Specialized design activities</h4>
                            <p class="text-muted mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-2">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h4 class="h5 mb-2">Computer Programming</h4>
                            <p class="text-muted mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section><br>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-fluid" src="../public/dist/img/homepage/1.jpg" alt="">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-fluid" src="../public/dist/img/homepage/2.jpg" alt="">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-fluid" src="../public/dist/img/homepage/3.jpg" alt="">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-fluid" src="../public/dist/img/homepage/4.jpg" alt="">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-fluid" src="../public/dist/img/homepage/5.jpg" alt="">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-fluid" src="../public/dist/img/homepage/6.jpg" alt="">
                    </div>
                </div>
            </div>
        </div><br>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Please In Touch!</h2>
                        <hr class="divider my-2">
                        <p class="text-muted mb-5">Give us a call or send us an email and we will
                            get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-3 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-1 text-muted"></i><br>
                        <a href="tel:0905841816">+84 905 841 816</a>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-1 text-muted"></i>
                        <a class="d-block" href="mailto:mail@domain.com"
                            onClick="javascript:window.open('mailto:mail@domain.com', 'Mail');event.preventDefault()">
                            contact@allogical.com</a>
                    </div>
                </div>
            </div>
        </section>
        <br>
    </div>
    <!-- /.content -->
@endsection

@section('script')

@endsection
