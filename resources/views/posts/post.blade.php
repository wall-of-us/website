

<article class="post col-6 col-sm-3">
	<div class="post-inner">
        <figure class="post-thumb">
            <a href="/posts/{{ $post->id }}/{{ $post->slug }}">
                <img class="img-responsive post-thumb" src="/uploads/posts/{{ $post->image }}" alt="">
            </a>
        </figure><!--//post-thumb-->
        <div class="content">
            <h3 class="post-title" style="text-transform:uppercase"><a href="/posts/{{ $post->id }}/{{ $post->slug }}">ACTION {{ $post->action }}: {{ $post->title }}</a></h3>
            <div class="post-entry">
                <p>{{ $post->shortbody }}</p>
				<p><a href="/posts/{{ $post->id }}/{{ $post->slug }}">Read more -></a></p>
            </div>
            
        </div><!--//content-->
    </div><!--//post-inner-->
</article><!--//post-->
