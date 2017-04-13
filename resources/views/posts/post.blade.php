

<article class="post col-6 col-sm-3">
	<div class="post-inner">
        <figure class="post-thumb">
            <a href="/posts/{{ $post->id }}"><div style="height:235px; width:175px; background-image: url('/uploads/posts/{{ $post->image }}'); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"  /></div>                                
        </figure><!--//post-thumb-->
        <div class="content">
            <h3 class="post-title" style="text-transform:uppercase"><a href="/posts/{{ $post->id }}">ACTION {{ $post->action }}: {{ $post->title }}</a></h3>
            <div class="post-entry">
                <!--<p>{{ $post->shortbody }}</p>-->
				<p><a href="/posts/{{ $post->id }}">Read more -></a></p>
            </div>
            
        </div><!--//content-->
    </div><!--//post-inner-->
</article><!--//post-->
