@extends ('layouts.home')

@section ('content')
	<div class="bg-slider-wrapper">
        <div class="flexslider bg-slider">
            <ul class="slides">
                <li style="background: url('https://s3-us-west-1.amazonaws.com/wallofus/IMG_0132.JPG') no-repeat 50% top; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;" class="slide slide-1" ></li>
				
            </ul>
        </div>
    </div><!--//bg-slider-wrapper-->     
	
	<section class="promo section section-on-bg">
        <div class="container text-center">                
            <h3 class="sub-title">he promised a wall.</h3><span class="title">he will be stopped by a wall of us.</span>
            <p class="intro">FOUR CONCRETE ACTS OF RESISTANCE
				DELIVERED TO YOUR INBOX EACH WEEK</p>
				<br />
			@if (Auth::check())
            <p><a class="btn btn-cta btn-cta-secondary" href="/actions">Take Action</a></p>   
			@else
			<p><a class="btn btn-cta btn-cta-secondary" href="/signup">Sign Up Now</a></p>
			@endif
            
        </div><!--//container-->
    </section><!--//promo-->
    
    <div class="sections-wrapper">   
    <!-- ******BLOG LIST****** --> 
	<section id="why" class="section why" style="padding-top: 80px; padding-bottom: 60px;">
		<div class="container" style="padding-right: 40px; padding-left: 40px;">
            <h2 class="intro" style="text-align:left;">4 WEEKLY ACTS OF RESISTANCE</h2>
			
            <div class="row">
                <div id="blog-mansonry" class="blog-list">
                    
				@foreach ($posts->slice(0, 4) as $post)
					@include('posts.post')
				@endforeach
                    
                </div><!--//blog-list-->  
			</div><!--//row-->
                
		</div><!--//container-->
	</section><!--//why-->  
	</div><!--//section-wrapper-->
@endsection