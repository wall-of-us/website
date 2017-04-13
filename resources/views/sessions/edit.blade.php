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
        <section class="login-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Update Your Profile</h2>                 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-5">
                                   



                                        <form class="login-form" enctype="multipart/form-data" method="POST" action="/edit"> 
                                        {{ csrf_field() }}  
                                        <input id="id" name="id" type="hidden" value="{{ Auth::user()->id }}">
                                        <div class="form-group picture">
                                            <label class="sr-only" for="picture">Picture</label>
                                            <input type="file" name="picture" id="picture" class="form-control login-picture" value="{{ Auth::user()->picture }}" placeholder="Update Profile Picture">
                                        </div><!--//form-group-->
                                        <div class="form-group name">
                                            <label class="sr-only" for="name">Name</label>
                                            <input id="name" name="name" type="name" class="form-control login-name" value="{{ Auth::user()->name }}" placeholder="Add Name" required>
                                        </div><!--//form-group-->
                                        <div class="form-group email">
                                            <label class="sr-only" for="email">Email</label>
                    
                                            <input id="email" name="email" type="email" class="form-control login-email" value="{{ Auth::user()->email }}" placeholder="Add Email" required>
                                        </div><!--//form-group-->
                                        <div class="form-group phone">
                                            <label class="sr-only" for="phone">Phone</label>
                                            <input id="phone" name="phone" type="phone" class="form-control login-phone" value="{{ Auth::user()->phone }}" placeholder="Add Phone">
                                        </div><!--//form-group-->
                                        <div class="form-group city">
                                            <label class="sr-only" for="city">City</label>
                                            <input id="city" name="city" type="city" class="form-control login-city" value="{{ Auth::user()->city }}" placeholder="Add City" required>
                                        </div><!--//form-group-->
                                        <div class="form-group state">
                                            <label class="sr-only" for="state">State</label>
                                            <input id="state" name="state" type="state" class="form-control login-state" value="{{ Auth::user()->state }}" placeholder="Add State" required>
                                        </div><!--//form-group-->
                                        <div class="form-group zip">
                                            <label class="sr-only" for="zip">Zipcode</label>
                                            <input id="zip" name="zip" type="zip" class="form-control login-zip" value="{{ Auth::user()->zip }}" placeholder="{{ Auth::user()->zip }}" required>
                                        </div><!--//form-group-->
                                        
                                        <div class="form-group facebook">
                                            <label class="sr-only" for="facebook">Facebook</label>
                                            <input id="facebook" name="facebook" type="facebook" class="form-control login-facebook" value="{{ Auth::user()->facebook }}" placeholder="Add Facebook URL">
                                        </div><!--//form-group-->
                                        <div class="form-group twitter">
                                            <label class="sr-only" for="twitter">Twitter</label>
                                            <input id="twitter" name="twitter" type="twitter" class="form-control login-twitter" value="{{ Auth::user()->twitter }}" placeholder="Add Twitter Handle">
                                        </div><!--//form-group-->

                                        
                                        
                                        

                                        
                                        
                                        @include ('layouts.errors')
                                        <button type="submit" class="btn btn-block btn-cta-primary">Update</button>
                                        
                                          
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