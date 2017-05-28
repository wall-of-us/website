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
        <section class="profile-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Update Your Profile</h2>                 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-5 col-centered">
                                   
                                        <form class="login-form" enctype="multipart/form-data" method="POST" action="/profile"> 
                                        {{ csrf_field() }}  
                                        <input id="id" name="id" type="hidden" value="{{ Auth::user()->id }}">
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                                        <img src="{{ Auth::user()->picture }}"
                                            alt="Alternate Text" class="user-big text-center"  id="imagedisplay" /><br><br>
                                           
                                        <div class="form-group">
                                        <div style="height:0px;overflow:hidden">
                                           <input type="file" name="picture" id="picture" value="{{ Auth::user()->picture }}" />
                                        </div>
                                        <a type="button" onclick="chooseFile();" style="cursor: pointer;"><i class="fa fa-upload"></i>  Upload a New Picture</a>

                                        <script>
                                           function chooseFile() {
                                              $("#picture").click();
                                           }

                                           $(document).ready(function() {

                                          $('#picture').change(function(e) {

                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                              $('#imagedisplay').attr('src', e.target.result);
                                            }
                                            reader.readAsDataURL(this.files[0]);

                                          });
                                        });
                                        </script>
                                            
                                        </div><!--//form-group-->
                                        <div class="form-group name">
                                            <label class="sr-only" for="name">Name</label>
                                            <input id="name" name="name" type="name" class="form-control login-name" value="{{ Auth::user()->name }}" placeholder="Add Name" autocomplete="off" required>
                                        </div><!--//form-group-->
                                        <div class="form-group email">
                                            <label class="sr-only" for="email">Email</label>
                    
                                            <input id="email" name="email" type="email" class="form-control login-email" value="{{ Auth::user()->email }}" placeholder="Add Email" autocomplete="off" required>
                                        </div><!--//form-group-->
                                        <!--<div class="form-group phone">
                                            <label class="sr-only" for="phone">Phone</label>
                                            <input id="phone" name="phone" type="phone" class="form-control login-phone" value="{{ Auth::user()->phone }}" placeholder="Add Phone">
                                        </div>//form-group-->
                                        <div class="form-group address">
                                            <label class="sr-only" for="address">Street Address</label>
                                            <input id="address" name="address" type="address" class="form-control login-address" value="{{ Auth::user()->address }}" placeholder="Add Street Address">
                                        </div><!--//form-group-->
                                        <div class="form-group city">
                                            <label class="sr-only" for="city">City</label>
                                            <input id="city" name="city" type="city" class="form-control login-city" value="{{ Auth::user()->city }}" placeholder="Add City">
                                        </div><!--//form-group-->
                                        <div class="form-group state">
                                            <label class="sr-only" for="state">State</label>
                                            <input id="state" name="state" type="state" class="form-control login-state" value="{{ Auth::user()->state }}" placeholder="Add State">
                                        </div><!--//form-group-->
                                        <div class="form-group zip">
                                            <label class="sr-only" for="zip">Zipcode</label>
                                            <input id="zip" name="zip" type="zip" class="form-control login-zip" value="{{ Auth::user()->zip }}" placeholder="Add Zip" required>
                                        </div><!--//form-group-->
                                        
                                        

                                        
                                        
                                        

                                        
                                        
                                        @include ('layouts.errors')
                                        <button type="submit" class="btn btn-block btn-cta-body">Save Profile</button>
                                        
                                          
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