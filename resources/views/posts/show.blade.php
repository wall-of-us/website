@extends ('layouts.master')


@section ('content')

		<!-- ******BLOG****** -->         
        <div class="blog-entry-wrapper"> 
            <!--
            <div class="blog-headline-bg">
            </div><!--//blog-headline-bg-->
            <div class="blog-entry">                 
                <article class="post">
                    <header class="blog-entry-heading"  style="background: url('https://s3-us-west-1.amazonaws.com/wallofus/posts/{{ $post->image }}') no-repeat 50%; background-size: cover;">
                                
                            <div class="container text-center">
                                <h2 class="title">action {{ $post->action }}: {{ $post->title }}</h2>
                            </div><!--//container-->

                            <nav class="post-nav post-nav-top">
                                @if($previous)
                                <span class="nav-previous"><a href="/posts/{{ $previous->id }}/{{ $previous->slug }}" rel="prev"><i class="fa fa-angle-left"></i>Action {{ $previous->action }}</a></span>
                                @endif
                                @if($next)
                                <span class="nav-next"><a href="/posts/{{ $next->id }}/{{ $next->slug }}" rel="next">Action  {{ $next->action }}<i class="fa fa-angle-right"></i></a></span>
                                @else
                                <span class="nav-next"><a href="/archive" rel="next">View Archive<i class="fa fa-angle-right"></i></a></span>
                                @endif
                            </nav><!--//post-nav-->
                                
                            
						
                    </header><!--//blog-entry-heading-->

                    <div class="container">
                        <div class="row">
                            <div class="blog-entry-content">

                            <div class="meta">
                                <ul class="meta-list list-inline">                                       
                                    <li class="post-time">Week of {{ Carbon\Carbon::parse($post->week)->format('F j, Y') }}</li>
                                </ul><!--//meta-list-->     
                            </div><!--meta-->
                            {!! $post->body !!}

                            @if ($post->cta == '1')
                                @include ('actions.call')
                            @endif
                            
                           @if ($post->id == '108') 
                                @include ('actions.108')
                            @endif
                            @if ($post->id == '115') 
                                @include ('actions.115')
                            @endif
                            @if ($post->id == '116') 
                                @include ('actions.116')
                            @endif
                            @if ($post->id == '119') 
                                @include ('actions.119')
                            @endif
                            @if ($post->id == '125') 
                                @include ('actions.125')
                            @endif
                            @if ($post->id == '135') 
                                @include ('actions.135')
                            @endif
                            @if ($post->id == '136') 
                                @include ('actions.136')
                            @endif
                            @if ($post->id == '137') 
                                @include ('actions.137')
                            @endif
                            @if ($post->id == '139') 
                                @include ('actions.139')
                            @endif
                            @if ($post->id == '143') 
                                @include ('actions.143')
                            @endif
                            @if ($post->id == '144') 
                                @include ('actions.144')
                            @endif
                            @if ($post->id == '147') 
                                @include ('actions.143')
                            @endif
                            @if ($post->id == '148') 
                                @include ('actions.148')
                            @endif
                                
                            </div><!--//blog-entry-content-->
                            
                        </div>
                         <div class="row">
                            <!--//Soical media buttons -->
                            <div class="share-container col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0" style="text-align: center">
                                @if (Auth::check())

                                    @if ($actions->count() > 0)

                                    <div class='search'>
                                        <button type="submit" class="btn btn-cta btn-cta-taken" disabled><i class="fa fa-check" style="color:#12464d"></i> I Took Action</button><br /><br />
                                        <!--{{ $post->actions->count() }} actions taken-->
                                    </div>

                                    @else 

                                    
                                    
                            <div class="blog-entry-content">
                                    <div id = 'msg'>
                                    <button type="button" id="button" onClick="getMessage()" class="btn btn-cta btn-cta-body" data-toggle="modal">I Took Action</button>
                                    
                                    </div>

                                      <script>
                                         function getMessage(){
                                            var _token = $('meta[name="_token"]').attr('content');

                                            $.ajax({
                                               type:'POST',
                                               url:'/getmsg',
                                               data: {_token: _token, post_id: "{{ $post->id }}", user_id: "{{ Auth::user()->id }}"},
                                               success:function(data){
                                                  $("#msg").html(data.msg);
                                               },
                                               error: function(data){
                                                    console.log(data);
                                               }
                                            });
                                         }
                                      </script>
                                      </div>
                                      


                                    @endif
                                    
                                    
                                    <ul class="social list-inline">
                                    <li><div data-network="twitter" class="st-custom-button"><i class="fa fa-twitter"></i></div>
                                    <li><div data-network="facebook" class="st-custom-button"><i class="fa fa-facebook"></i></div> 
                                    <li><div data-network="email" class="st-custom-button"><i class="fa fa-envelope"></i></div>
                                    </ul>
                                    </p>  
                                @else
                                    <p><a href="/login">Login</a> to record your actions.</p>

                                    <br /><br />
                                    <ul class="social list-inline">
                                    <li><div data-network="twitter" class="st-custom-button"><i class="fa fa-twitter"></i></div>
                                    <li><div data-network="facebook" class="st-custom-button"><i class="fa fa-facebook"></i></div> 
                                    <li><div data-network="email" class="st-custom-button"><i class="fa fa-envelope"></i></div>
                                    </ul>


                                    </p>
                                @endif
               
                            
                            
                            		
                                    <!-- Buttons end here -->
                            </div><!--//share-container--> 
                        </div>
                        
                        <div class="row post-nav">
                            <div class="col-6 nav-previous">
                            @if($previous)
                            <a href="/posts/{{ $previous->id }}/{{ $previous->slug }}" rel="prev">Action {{ $previous->action }}: {{ $previous->title }}</a>
                            @endif
                            </div>
                            <div class="col-6 nav-next">
                            @if($next)
                            <a href="/posts/{{ $next->id }}/{{ $next->slug }}" rel="next">Action  {{ $next->action }}: {{ $next->title }}</a>
                            @endif
                            </div>
                        </div>
                       
                        </div><!--//row-->
                    </div><!--//container-->    
                                                              
                </article><!--//post-->                                      
            </div><!--//blog-entry-->
        </div><!--//blog-entry-wrapper-->  
    </div><!--//wrapper-->
@endsection
