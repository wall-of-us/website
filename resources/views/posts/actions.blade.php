@extends ('layouts.master')


@section ('content')
    
<div class="sections-wrapper" style="margin-top:60px;">   
    <!-- ******BLOG LIST****** --> 
	<section id="why" class="section why" style="padding-top: 60px; padding-bottom: 60px;">
    	<div class="container" style="padding-right: 40px; padding-left: 40px;">
			<h2 class="intro" style="text-align:left;">4 WEEKLY ACTS OF RESISTANCE</h2>
            <div class="row">
	         	<div id="blog-mansonry" class="blog-list">
	                    
					@foreach ($posts->slice(0, 4) as $post)
						@include('posts.post')
					@endforeach
	                    
	            </div><!--//blog-list-->  
			</div><!--//row-->

			<a href="/archive"><h2 class="intro" style="text-align:left;">VIEW THE ARCHIVE <i class="fa fa-angle-right"></i></h2></a>
		</div><!--//container-->
     </section><!--//why-->  	
</div><!--//section-wrapper-->
@endsection