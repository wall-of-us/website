@extends ('layouts.bricks')


@section ('content')
    
<div class="sections-wrapper" style="margin-top:60px;">   
    <!-- ******BLOG LIST****** --> 
    <section id="why" class="section why">
            
        <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
            <h3 class="intro" style="text-align:left;">BRICK-BY-BRICK</h3><p>It's working people.&nbsp;So many ugly things have been stopped by the big, beautiful Wall-of-Us!&nbsp;Here's proof. So take a moment for a "high-five" and then let's get back to building.&nbsp;</p><br>
            
                    @foreach ($bricks as $brick)
                    <?php $counter++; ?>

                        @if ($counter % 4 == 1)
                        <div class="row">
                        <div id="blog-mansonry" class="blog-list">
                        @endif

                        <article class="post col-6 col-sm-3">
                            <div class="post-inner">
                                <figure class="post-thumb-archive">
                                    <a href="{{ $brick->link }}">
                                        <img class="img-responsive post-thumb-archive" src="https://s3-us-west-1.amazonaws.com/wallofus/bricks/{{ $brick->image }}" alt="">
                                    </a>
                                </figure><!--//post-thumb-->
                                <div class="content">
                                    <h3 class="post-title" style="text-transform:uppercase"><a href="{{ $brick->link }}" target="_blank">{{ $brick->title }}</a>  <i class="fa fa-external-link"></i></h3>
                                    <div class="post-entry">
                                        <p>{{ Carbon\Carbon::parse($brick->date)->format('F j, Y') }}</p>
                                    </div>
                                    
                                </div><!--//content-->
                            </div><!--//post-inner-->
                        </article><!--//post-->

                        @if ($counter % 4 == 0)
                        </div><!--//blog-list-->  
                        </div><!--//row-->
                        @endif
                    
                    @endforeach

                    </div><!--//blog-list-->  
                        </div><!--//row-->
                        
                </div><!--//blog-list-->  
            </div><!--//row-->


           
     </section><!--//why-->     
</div><!--//section-wrapper-->
@endsection




