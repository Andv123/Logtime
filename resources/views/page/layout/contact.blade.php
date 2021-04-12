@extends('layout.index')

@section('title')
    Contact
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">Page</li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-12">
                    <div class="form h-100">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger global">
                                @foreach ($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if (session('global'))
                            <div class="alert alert-success">
                                {{session('global')}}
                            </div>
                        @endif
                        <h3>Get Started</h3>
                        <form action="../page/contact" class="mb-5" method="POST" id="contactForm">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name" class="col-form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Your fullname" value="{{Auth::User()->full_name}}">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                           placeholder="Your email" value="{{Auth::User()->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="message" class="col-form-label">Message</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="4"
                                              placeholder="Write your message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="submit" value="Send Message"
                                           class="btn btn-primary rounded-0 py-2 px-4">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0992073843!2d105.
                        83899031440667!3d20.98865999452316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!
                        1s0x3135ac68849aed43%3A0x9364f2e26b504b14!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gQWxsb2dpY2
                        FsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1616494411205!5m2!1svi!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
@endsection

@section('script')
    <script src="js/main.js"></script>
@endsection
