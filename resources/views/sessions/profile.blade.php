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
                <div >
    <!-- ******Login Section****** --> 
                    <div class="row" style="padding: 30px;">
                        <div class="col-sm-4">
                        <p><img src="{{ Auth::user()->picture }}"
                            alt="{{ Auth::user()->name }}" class="user-big text-center" /><br><br>
                        </p>

                        </div>
                        <div  class="col-sm-6">
                        <h2 class="post-title" style="text-transform:uppercase">{{ Auth::user()->name }}</h2>  
                        
                        <p class="post-entry"><i class="fa fa-envelope"></i> {{ Auth::user()->email }}<br />
                        @if ( Auth::user()->address )
                        <i class="fa fa-map-marker"></i> {{ Auth::user()->address }}, {{ Auth::user()->city }}, {{ Auth::user()->state }} {{ Auth::user()->zip }}<br />
                        @else
                            @if ( Auth::user()->zip )
                            <i class="fa fa-map-marker"></i> <i><a href="/edit">Add Address</a></i>, {{ Auth::user()->zip }}<br />
                            <i>* For more personalized information about your representatives, a full address is needed.</i>
                            @else
                            <i class="fa fa-map-marker"></i> <i><a href="/edit">Please add your address to see personalized content</a></i><br />
                            @endif
                        @endif
                        <!--@if ( Auth::user()->phone )
                        <i class="fa fa-phone"></i> {{Auth::user()->phone}}<br />
                        @else
                        <i class="fa fa-phone"></i> <i><a href="/edit">Add Phone</a></i><br /> 
                        @endif-->
                        </p> 
                        <p><a class="btn btn-cta btn-cta-body" href="/edit">Update Profile</a> </p>

                        <p style="line-height: 1.8;" class="post-entry"><i class="fa fa-sign-out"></i> <i><a href="/logout">Sign Out</a></i>
                        </p>
                       <!-- <p><a href="/logout"  class="text-muted" style="text-decoration: underline; color:#467c83;">Sign Out</a></p>-->


                        </div>
                    </div>
                          
                        
                        <div class="row"  style="background-color: #eee; padding: 30px;">
                        <div class="col-sm-4 text-center">
                        <p style="font-size: 75px">{{ $newaction_count }}</p>
                        <p>actions taken <a href="/actions">this week</a></p> 
                        </div>
                        <div class="col-sm-4 text-center">
                        <p style="font-size: 75px">{{ $action_count }}</p><p>total actions taken</p> 
                        </div>
                        <div class="col-sm-4 text-center">
                        <p style="font-size: 75px">{{ $leftthisweek }}</p><p>actions left <a href="/actions">this week</a></p> 
                        </div>
                        
                        </div>
                        <br>
                        <h2 class="title text-center" style="color:#1f1f1f;">My Representatives</h2>

                        <div class="row text-center"  style="padding-bottom: 30px;">
                        @if ( Auth::user()->zip )

                        @foreach ($response['offices'] as $res)
                            
                            
                            @foreach ($res['officialIndices'] as $i)
                            <?php $counter++; ?>
                                @if ($res['name'] != "President of the United States")
                                @if ($res['name'] != "Vice-President of the United States")
                                
                                @if ($counter % 3 == 1)
                                <div class="row text-center"  style="padding-bottom: 30px;">
                                @endif
                                 <div class="col-md-4" style="padding: 20px;"">

                                    @if(isset($response['officials'][$i]['photoUrl']))
                                        <img class="rep text-center"  src="{{ $filename = $response['officials'][$i]['photoUrl'] }}" alt="">
                                    @else
                                    <img class="rep text-center"  src="/uploads/users/fpo-boxart-no-image.jpg" alt="">
                                    @endif

                                    
                                    <h2 class="post-title" style="text-transform:uppercase">
                                    @if(isset($response['officials'][$i]['name']))
                                    {{ $response['officials'][$i]['name'] }} 
                                    @endif
                                    @if(isset($response['officials'][$i]['party'][0]))
                                    ({{ $response['officials'][$i]['party'][0] }})
                                    @endif
                                    </h3>
                                    <p>
                                    @if(isset($res['name']))
                                    {{ $res['name'] }}
                                    @endif
                                    @if(isset($response['officials'][$i]['phones'][0]))
                                    <br><a href="tel:{{ $response['officials'][$i]['phones'][0] }}">{{ $response['officials'][$i]['phones'][0] }}</a><br>
                                    @endif
                                    @if(isset($response['officials'][$i]['address'][0]['line1']))
                                    {{ $response['officials'][$i]['address'][0]['line1'] }} 
                                    @endif
                                    @if(isset($response['officials'][$i]['address'][0]['line2']))
                                    {{ $response['officials'][$i]['address'][0]['line2'] }}
                                    @endif
                                    @if(isset($response['officials'][$i]['address'][0]['city']))
                                    <br>{{ $response['officials'][$i]['address'][0]['city'] }},
                                    @endif
                                    @if(isset($response['officials'][$i]['address'][0]['state']))
                                    {{ $response['officials'][$i]['address'][0]['state'] }}
                                    @endif
                                    @if(isset($response['officials'][$i]['address'][0]['zip']))
                                    {{ $response['officials'][$i]['address'][0]['zip'] }}
                                    @endif
                                    <br></p>
                                     @if($res['name'] == "United States Senate")
                                    <p><a href="/reps/{{ str_slug($response['officials'][$i]['name']) }}">View full profile ></a></p>
                                    @endif
                                     @if(strpos($res['name'], 'United States House of Representatives') !== false)
                                     <p><a href="/house/{{ str_slug($response['officials'][$i]['name']) }}">View full profile ></a></p>
                                     @endif
                                     @if ($res['name'] == "Governor")
                                     @if(isset($governor_slug)) 
                                     <p><a href="/governors/{{ $governor_slug }}">View full profile ></a></p>
                                     @endif
                                     @endif
                                    
                                    @if(isset($response['officials'][$i]['channels']))
                                    @foreach ($response['officials'][$i]['channels'] as $channel)
                                    @if (($channel['type'] == "Twitter")||($channel['type'] == "Facebook"))
                                     <a href="http://www.{{ $channel['type'] }}.com/{{ $channel['id'] }}"><i class="fa fa-{{ strtolower($channel['type']) }}" aria-hidden="true" style="font-size: 20px; color: #333; padding: 10px;"></i></i></a> 
                                     @endif
                                    @endforeach
                                    @endif

                                    

                                </div>
                                @if ($counter % 3 == 1)
                                </div>
                                @endif

                                @endif
                                @endif

                            @endforeach


                        @endforeach

                        @else
                        <p><i><a href="/edit">You need to add your address to see personalized content</a></i><br /></p>
                        <p><a class="btn btn-cta btn-cta-body" href="/edit">Update Profile</a> </p>

                        @endif
                        </div><br>
                        
                        <p><i>* This data is pulled from the <a href="https://developers.google.com/civic-information/">Google Civic API</a>. If you see missing or incorrect information for an elected official, please <a href="https://docs.google.com/a/wall-of-us.org/forms/d/e/1FAIpQLScA45a5Acnn6hK1R6dd45ttoVbI4tWc7oXl-pjQ-84yx7yuxA/viewform" target="_blank">report it here</a>.</i></p>
                   
                </div><!--//form-box-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//contact-section-->

    <!-- ******Features Section****** -->       
    
    

@endsection