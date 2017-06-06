@extends ('layouts.about')


@section ('content')
      



<div class="sections-wrapper" style="margin-top:60px;">   
    <!-- ******BLOG LIST****** --> 
    <section id="why" class="section why">
        <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
        <h2 class="title text-center" style="color:#1f1f1f;">

        United States Governors
       </h2>
           
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
                                        <img class="img-responsive post-thumb-archive" src="/uploads/governors/{{ $member->picture }}" alt="">
                                    </a>
                                </figure><!--//post-thumb-->
                                <div class="content">
                                    <h3 class="post-title" style=""><a href="/{{ $reps }}/{{ $member->slug }}">{{ $member->first_name }} {{ $member->last_name }} ({{ $member->party }})</a></h3>
                                    <div class="post-entry">
                                        <p>
                                        {{ $member->mailing_address }}<br>@if($member->mailing_address2 != ""){{ $member->mailing_address2 }}<br>@endif{{ $member->city }}, {{ $member->st }} {{ $member->zip }}<br>
                                        Phone: &nbsp;{{ $member->phone }}<br>
                                        Fax: </i>&nbsp;{{ $member->fax }}<br>
                                        <a href="{{ $member->url }}" target="">Website</a></p>


                                        <p><a href="/{{ $reps }}/{{ $member->slug }}">View full profile ></a></p>
                                    

                                        <p>
                                        @if($member->twitter_account != "")<a href="https://twitter.com/{{ $member->twitter_account }}" target="_blank"><i class="fa fa-twitter" style="padding-right: 10px; color:#1f1f1f;"></i></a>@endif
                                        @if($member->facebook_account != "")<a href="{{ $member->facebook_account }}" target="_blank"><i class="fa fa-facebook" style="padding-right: 10px; color:#1f1f1f;"></i></a>@endif
                                        @if($member->contact_form != "")<a href="{{ $member->contact_form }}" target="_blank"><i class="fa fa-envelope" style="padding-right: 10px; color:#1f1f1f;"></i></a>@endif
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




