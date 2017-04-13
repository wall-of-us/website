@extends ('layouts.master')


@section ('content')
    
    <div class="sections-wrapper" style="margin-top:60px;">   
    <!-- ******BLOG LIST****** --> 
	<section id="why" class="section why">
            <div class="container"  style="max-width:800px;">
				<h2 class="intro" style="text-align:left;">4 WEEKLY ACTS OF RESISTANCE</h2>
                
	        	<div class="row">
	                <div id="blog-mansonry" class="blog-list">
	                    
					@foreach ($posts->slice(0, 4) as $post)
						@include('posts.post')
					@endforeach
	                    
	                </div><!--//blog-list-->  
				</div><!--//row-->
			</div><!--//container-->
      
			<div class="container" style="max-width:800px;">
                <h2 class="intro" style="text-align:left;">ARCHIVE</h2>
				
				<div class="blog-list blog-category-list">
                    @foreach ($archive as $post)
					@include('posts.archive')
					@endforeach         
                </div><!--//blog-list-->  
				
                
                
                
            </div><!--//container-->
        </section><!--//why-->  
        
        
        
        
        
        
        
		</div><!--//section-wrapper-->
@endsection