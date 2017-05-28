@extends ('layouts.about')


@section ('content')
      
    <div class="blog-entry-wrapper"> 
     <div class="blog-entry">                 
        <article class="post">
          <div class="container">
            <div class="row">
              <div class="blog-entry-content">
                <div class="text-center">
                  <h3 class="title">Sorry, something went wrong. Try refreshing, or start what ever you were doing over.</h3>
                </div>
                <p style="font-size: 200px; text-align: center;">500</p>
                
                @if (Auth::check())
                <p class="text-center"><a class="btn btn-cta btn-cta-body" href="/actions">Take Action</a></p>   
                @else
                <p class="text-center"><a class="btn btn-cta btn-cta-body" href="/signup">Sign Up Now</a></p>
                @endif
                </div>
              
            </div><!--//container-->
     
          
          
          
          

          
                         
                        
                        
                       
                        </div><!--//row-->
                    </div><!--//container-->    
                                                              
                </article><!--//post-->                                      
            </div><!--//blog-entry-->
        </div><!--//blog-entry-wrapper-->  
    </div><!--//wrapper-->
    
@endsection