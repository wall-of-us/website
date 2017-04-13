@extends ('layouts.master')


@section ('content')
<div class="blog-entry-wrapper"> 
            <!--
            <div class="blog-headline-bg">
            </div><!--//blog-headline-bg-->
            <div class="blog-entry" style="background: url('/uploads/posts/{{ $post->image }}') no-repeat 50% top;">                 
                <article class="post">
                    <header class="blog-entry-heading">
                        <div class="container text-center">                        
                            <h2 class="title">{{ $post->title }}</h2>
                            <div class="meta">
                                <ul class="meta-list list-inline">                                       
                                	<li class="post-time">{{ $post->week }}</li>
                            	</ul><!--//meta-list-->    	
                            </div><!--meta-->
                        </div><!--//container-->
                        
                    </header><!--//blog-entry-heading-->

                    <div class="container">
                        <div class="row">
                            <div class="blog-entry-content col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
                                {{ $post->body }}
                                
                                
		
                                                            
                            </div><!--//blog-entry-content-->
                            
                            <!--//Soical media buttons: https://github.com/kni-labs/rrssb (More examples) -->
                            <div class="share-container col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0"><!--//Soical media buttons: https://github.com/kni-labs/rrssb (More examples) -->
                                <span class="label">share this:</span>
                
                                <button type="button" class="btn btn-lg btn-fb"><i class="fa fa-facebook left"></i> Facebook</button><!-- Buttons end here -->
                            </div><!--//share-container--> 
                            
                            
                            
                            <nav class="post-nav col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
            						<!--<span class="nav-previous"><a href="#" rel="prev"><i class="fa fa-long-arrow-left"></i>Previous</a></span>-->
            						<span class="nav-next"><a href="#" rel="next">Next Action<i class="fa fa-long-arrow-right"></i></a></span>
            				</nav><!--//post-nav-->
            				
            				
            				
                        </div><!--//row-->
                    </div><!--//container-->                                               
                </article><!--//post-->                                      
            </div><!--//blog-entry-->
        </div><!--//blog-entry-wrapper-->  
		</div><!--//wrapper-->
@endsection
