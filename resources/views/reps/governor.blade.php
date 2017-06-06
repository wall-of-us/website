@extends ('layouts.about')


@section ('content')


<section class="profile-section-reps section section-on-bg">
    <div class="profile-container container"> 
        <div class="profile-container-inner" >                    
            <div class="row" style="padding-top: 125px; padding-left: 15px; padding-bottom: 50px;">
                
                <div class="col-sm-3 blog-entry-content">
                <h2 class="post-title" style="font-size: 24px;">{{ $member->first_name }} {{ $member->last_name }} ({{ $member->party }})</h2>
                    <figure class="post-thumb-archive">
                        <img class="img-responsive post-thumb-archive" src="/uploads/governors/{{ $member->picture }}" alt="">
                    </figure><!--//post-thumb-->

                    

                    <p class="blog-entry-content">
                    <br>
                    
                    
                    {{ $member->mailing_address }}<br>@if($member->mailing_address2 != ""){{ $member->mailing_address2 }}<br>@endif{{ $member->city }}, {{ $member->st }} {{ $member->zip }}<br>
                    Phone: &nbsp;{{ $member->phone }}<br>
                    Fax: </i>&nbsp;{{ $member->fax }}<br>
                    <a href="{{ $member->url }}" target="">Website</a></p>

                    <p>
                    <a href="https://twitter.com/{{ $member->twitter_account }}" target="_blank"><i class="fa fa-twitter" style="padding-right: 10px; color:#1f1f1f;"></i></a>
                    <a href="{{ $member->facebook_account }}" target="_blank"><i class="fa fa-facebook" style="padding-right: 10px; color:#1f1f1f;"></i></a>
                    <a href="{{ $member->contact_form }}" target="_blank"><i class="fa fa-envelope" style="padding-right: 10px; color:#1f1f1f;"></i></a>
                    </p>

                    
                </div>
                <div  class="col-sm-8 blog-entry-content">
                    
                <h2 class="post-title" style="font-size: 24px;">Positions</h2>
                  <p>See how {{ $member->first_name }} {{ $member->last_name }} stacks up on the issues:</p>            
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Issue</th>
                        <th>Position</th>
                        <th>Source</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($positions as $position)
                      <tr>
                        <td>{{ $position->issue }}</td>
                        <td>{!! $position->position !!}</td>
                        <td>
                        <a href="{!! $position->source !!}" target="_blank">{!! $position->desc_source !!}</a><br>
                        </td>
                      </tr>
                    @endforeach
                      
                    </tbody>
                  </table>

                  

                    
                    

                </div>
            </div><!--//row-->
        </div><!--//container-->    
    </div><!--//blog-entry-wrapper-->  
</section>





@endsection




