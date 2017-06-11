@extends ('layouts.master')


@section ('content')
    
<div class="sections-wrapper" style="margin-top:60px;">   
    <!-- ******BLOG LIST****** --> 
    <section id="why" class="section why">
        <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
            
                    @foreach ($posts as $post)
                    <?php $counter++; ?>

                        @if ($counter % 4 == 1)
                        <h2 class="intro" style="text-align:left; text-transform: uppercase; font-weight: normal;">Week of {{ Carbon\Carbon::parse($post->week)->format('F j, Y') }}</h2>
                        <div class="row">
                        <div id="blog-mansonry" class="blog-list">
                        @endif

                        <article class="post col-6 col-sm-3">
                            <div class="post-inner">
                                <figure class="post-thumb-archive">
                                    <a href="/posts/{{ $post->id }}/{{ $post->slug }}">
                                        <img class="img-responsive post-thumb-archive" src="https://s3-us-west-1.amazonaws.com/wallofus/posts/{{ $post->image }}" alt="">
                                    </a>
                                </figure><!--//post-thumb-->
                                <div class="content">
                                    <h3 class="post-title" style=""><a href="/posts/{{ $post->id }}/{{ $post->slug }}">Action {{ $post->action }}: {{ $post->title }} </a></h3>
                                    <div class="post-entry">
                                        <p>{{ $post->shortbody }}</p>
                                        <p><a href="/posts/{{ $post->id }}/{{ $post->slug }}">Read more -></a></p>
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




