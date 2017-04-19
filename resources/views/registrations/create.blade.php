@extends ('layouts.profile')

@section ('content')


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
                            <h2 class="title text-center">Sign Up</h2>                 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-5 col-centered">
                                    <form class="login-form" method="POST" action="/signup"> 
										{{ csrf_field() }}	
										<div class="form-group name">
                                            <label class="sr-only" for="name">Name</label>
                                            <input id="name" name="name" type="name" class="form-control login-name" placeholder="Name" required>
                                        </div><!--//form-group-->
                                        <div class="form-group email">
                                            <label class="sr-only" for="email">Email</label>
                                            <input id="email" name="email" type="email" class="form-control login-email" placeholder="Email" required>
                                        </div><!--//form-group-->
                                        <div class="form-group zip">
                                            <label class="sr-only" for="zip">Zipcode</label>
                                            <input id="zip" name="zip" type="zip" class="form-control login-zip" placeholder="Zipcode" required>
                                        </div><!--//form-group-->
                                        <div class="form-group password">
                                            <label class="sr-only" for="password">Password</label>
                                            <input id="password" name="password" type="password" class="form-control login-password" placeholder="Password" required>
										</div><!--//form-group-->
                                        <div class="form-group password">
                                            <label class="sr-only" for="password_confirmation">Password</label>
                                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control login-password" placeholder="Confirm Password" required>
                                        </div><!--//form-group-->
										<br />
										@include ('layouts.errors')
                                        <button type="submit" class="btn btn-block btn-cta-body">Sign Up</button>
                                        <div class="checkbox remember">
                                            <label>
                                                <input type="checkbox"> Remember me
                                            </label>
                                        </div><!--//checkbox-->
                                         <p class="lead">Already have a wall-of-us account? <br /><a class="signup-link" href="/login">Log in now</a></p>  
										  
                                    </form>
                                </div><!--//form-container-->
                                
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//contact-section-->
    </div><!--//upper-wrapper-->

@endsection