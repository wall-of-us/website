@extends('layouts.profile')

@section('content')
<div class="bg-slider-wrapper">
        <div class="flexslider bg-slider">
            <ul class="slides">
                <li style="background: url('https://s3-us-west-1.amazonaws.com/wallofus/IMG_0132.JPG') no-repeat 50% top; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;" class="slide slide-1" ></li>
                
            </ul>
        </div>
    </div><!--//bg-slider-wrapper-->   


<!-- ******Login Section****** --> 
        <!-- ******Login Section****** --> 
        <section class="profile-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                <div class="title text-center">Reset Password</div>
                <div class="form-container col-centered">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="login-form" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <div class="form-group email">
                                <label class="sr-only" for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control login-email" placeholder="Your Email Address" value="{{ old('email') }}" required>
                             </div><!--//form-group-->
                            @include ('layouts.errors')
                            <button type="submit" class="btn btn-block btn-cta-body">
                                    Send Password Reset Link
                                </button>
                        </div>

                        <br><br>
                    </form>
                </div>
            </div><!--//row-->
                        
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//contact-section-->
    </div><!--//upper-wrapper-->

@endsection
