@extends ('layouts.master')


@section ('content')

		<!-- ******BLOG****** -->         
        <div class="blog-entry-wrapper"> 
            <!--
            <div class="blog-headline-bg">
            </div><!--//blog-headline-bg-->
            <div class="blog-entry">                 
                <article class="post">
                    <header class="blog-entry-heading"  style="background: url('https://s3-us-west-1.amazonaws.com/wallofus/posts/{{ $post->image }}') no-repeat 50% top; background-size: cover;">
                                
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
                                
                            </div><!--//blog-entry-content-->
                            
                        </div>
                         <div class="row">
                            <!--//Soical media buttons -->
                            <div class="share-container col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0" style="text-align: center">
                                @if (Auth::check())

                                    @if ($actions->count() > 0)

                                    <div class='search'>
                                        <button type="submit" class="btn btn-cta btn-cta-taken" disabled><i class="fa fa-check" style="color:#12464d"></i> I Took Action</button><br />
                                        <!--{{ $post->actions->count() }} actions taken-->
                                    </div>

                                    @else 

                                    <div class='search'>
                                    <form action="/actions" method="POST" target="action">
                                        {{ csrf_field() }} 
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-cta btn-cta-body">I Took Action</button>
                                    </form></div>

                                    @endif
                                    
                                    <br /><br />
                                    <div class="sharethis-inline-share-buttons"></div>
                                    </p>  
                                @else
                                    <p style="text-align: center;"><a class="btn btn-cta btn-cta-body" href="/signup">I Took Action</a><br />

                                    <br /><br />
                                    <div class="sharethis-inline-share-buttons"></div>
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
