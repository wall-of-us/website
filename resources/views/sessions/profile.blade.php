@extends ('layouts.profile')

@section ('content')
    <div class="bg-slider-wrapper">
        <div class="flexslider bg-slider">
            <ul class="slides">
                <li style="background: url('https://s3-us-west-1.amazonaws.com/wallofus/IMG_0132.JPG') no-repeat 50% top; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;" class="slide slide-1" ></li>
                
            </ul>
        </div>
    </div><!--//bg-slider-wrapper-->   
   

    <section class="profile-section section section-on-bg">
        <div class="profile-container container text-center"> 
            <div class="profile-container-inner" >                    
                <div class="text-center">
    <!-- ******Login Section****** --> 
                        <p><img src="/uploads/users/{{ Auth::user()->picture }}"
                            alt="Alternate Text" class="user text-center" /><br>
                        </p>
                        <h2 class="title text-center" style="color:#1f1f1f">{{ Auth::user()->name }}</h2>  
                        
                        <p><i class="fa fa-envelope"></i> {{ Auth::user()->email }}<br />
                        <i class="fa fa-map-marker"></i> {{ Auth::user()->city }}, {{ Auth::user()->state }} {{ Auth::user()->zip }}<br />
                        @if ( Auth::user()->phone )
                        <i class="fa fa-mobile"></i> {{Auth::user()->phone}}<br />
                        @else
                        <i class="fa fa-mobile"></i> <i><a href="/edit">Add Phone</a></i><br /> 
                        @endif
                        @if ( Auth::user()->facebook )
                        <i class="fa fa-facebook-official"></i> {{Auth::user()->facebook}}<br />
                        @else
                        <i class="fa fa-facebook-official"></i> <i><a href="/edit">Add Facebook Profile</a></i><br /> 
                        @endif
                        @if ( Auth::user()->twitter )
                        <i class="fa fa-twitter"></i> {{Auth::user()->twitter}}<br />
                        @else
                        <i class="fa fa-twitter"></i> <i><a href="/edit">Add Twitter Handle</a></i> <br />  
                        @endif
                        
                        </p>   
                        <p style="text-align: center;"><a class="btn btn-cta btn-cta-body" href="/edit">Update Profile</a>           
                   
                </div><!--//form-box-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//contact-section-->

    <!-- ******Features Section****** -->       
    
    

@endsection