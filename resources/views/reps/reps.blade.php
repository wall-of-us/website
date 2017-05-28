@extends ('layouts.about')


@section ('content')
      



<div class="sections-wrapper" style="margin-top:60px;">   
    <!-- ******BLOG LIST****** --> 
    <section id="why" class="section why">
        <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
        <h2 class="title text-center" style="color:#1f1f1f;">
        @if ($reps == 'reps')
        United States Senators
        @else
        House of Representitives
        @endif</h2>
           
                    @foreach ($response as $member)
                    <?php $counter++; ?>
                    @if ($counter % 4 == 1)

                        
                        <div class="row">
                        <div id="blog-mansonry" class="blog-list">
                        @endif

                        <article class="post col-6 col-sm-3">
                            <div class="post-inner">
                                <figure class="post-thumb-archive">
                                    <a href="/{{ $reps }}/{{ $member->slug }}">
                                        <img class="img-responsive post-thumb-archive" src="https://theunitedstates.io/images/congress/225x275/{{ $member->prop_id }}.jpg" alt="">
                                    </a>
                                </figure><!--//post-thumb-->
                                <div class="content">
                                    <h3 class="post-title" style=""><a href="/{{ $reps }}/{{ $member->slug }}">{{ $member->first_name }} {{ $member->middle_name }} {{ $member->last_name }} ({{ $member->party }})</a></h3>
                                    <div class="post-entry">
                                        <p>
                                        {{ $member->office }}, Washington, DC 20510<br>
                                        Phone: &nbsp;{{ $member->phone }}<br>
                                        Fax: </i>&nbsp;{{ $member->fax }}<br>
                                        <a href="{{ $member->url }}" target="">Website</a></p>


                                        <p><a href="/{{ $reps }}/{{ $member->slug }}">View full profile ></a></p>
                                    

                                        <p>
                                        <a href="https://twitter.com/{{ $member->twitter_account }}" target="_blank"><i class="fa fa-twitter" style="padding-right: 10px; color:#1f1f1f;"></i></a>
                                        <a href="{{ $member->facebook_account }}" target="_blank"><i class="fa fa-facebook" style="padding-right: 10px; color:#1f1f1f;"></i></a>
                                        <a href="{{ $member->contact_form }}" target="_blank"><i class="fa fa-envelope" style="padding-right: 10px; color:#1f1f1f;"></i></a>
                                        </p>

                                        
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




