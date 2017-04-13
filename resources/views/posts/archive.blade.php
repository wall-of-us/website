
<article class="post ">
    <div class="post-inner">
        <div class="content">
            <div class="date-label">
                <span class="month">{{ Carbon\Carbon::parse($post->week)->format('F j, Y') }}</span>
            </div>
            <h3 class="post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
			
            <div class="post-entry">
                <p>{!! str_limit(strip_tags($post->body), $limit = 400, $end = '...') !!}</p>
                <a class="read-more" href="/posts/{{ $post->id }}">Read more <i class="fa fa-long-arrow-right"></i></a>
            </div>                                
        </div><!--//content-->
    </div><!--//post-inner-->
</article><!--//post-->