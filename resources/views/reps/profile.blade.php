@extends ('layouts.about')


@section ('content')


<section class="profile-section-reps section section-on-bg">
    <div class="profile-container container"> 
        <div class="profile-container-inner" >                    
            <div class="row" style="padding-top: 125px; padding-left: 15px; padding-bottom: 50px;">
                
                <div class="col-sm-3 blog-entry-content">
                <h2 class="post-title" style="font-size: 24px;">{{ $member->first_name }} {{ $member->middle_name }} {{ $member->last_name }} ({{ $member->party }})</h2>
                    <figure class="post-thumb-archive">
                        <img class="img-responsive post-thumb-archive" src="https://theunitedstates.io/images/congress/225x275/{{ $member->prop_id }}.jpg" alt="">
                    </figure><!--//post-thumb-->

                    

                    <p class="blog-entry-content">
                    <br>
                    <strong>{{ $role }}, {{ $member->state }}</strong><br>
                    Has served for {{ $member->seniority }} years<br>
                    @if ($member->next_election == '2018')
                    <span style="background-color: #99cccc;">Up for re-election in {{ $member->next_election }}</span><br>
                    @else
                    Up for re-election in {{ $member->next_election }}<br>
                    @endif
                    {{ $member->office }}<br>Washington, DC 20510<br>
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
                  <p>See how {{ $member->first_name }} {{ $member->middle_name }} {{ $member->last_name }} stacks up on the issues:</p>            
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
                        <td>@foreach ($statements as $statement)
                        @if ($position->issue == 'Russia')
                        <a href="{!! $statement->desc !!}" target="_blank">{{ $statement->source }}</a><br>
                        @endif
                        @endforeach</td>
                      </tr>
                    @endforeach
                      
                    </tbody>
                  </table>

                  @if ($funders != "")
                  <h2 class="post-title" style="font-size: 24px; padding-top: 20px;">Top Contributors 2016</h2>
                  <p>Below are the top 10 contributors to {{ $member->first_name }} {{ $member->middle_name }} {{ $member->last_name }} in the 2015-2016 cycle. For more information visit <a href="https://www.opensecrets.org/politicians/contrib.php?cycle=2016&cid={{ $member->crp_id }}&type=I&newmem=N" target="">OpenSecrets.org</a>.</p>            
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Contributor</th>
                        <th>Pacs</th>
                        <th>Individuals</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($funders as $res)
                    <tr>
                        <td>{{ $res->org_name }}</td>
                        <td>${{ $res->pacs }}</td>
                        <td>${{ $res->indivs }}</td>
                        <td>${{ $res->total }}</td>
                      </tr>
                    @endforeach
                    
                      
                    </tbody>
                  </table>
                  @endif  

                    
                    

                </div>
            </div><!--//row-->
        </div><!--//container-->    
    </div><!--//blog-entry-wrapper-->  
</section>





@endsection




