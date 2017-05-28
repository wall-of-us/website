@extends ('layouts.master')


@section ('content')

		<!-- ******BLOG****** -->         
        <div class="blog-entry-wrapper"> 
            <!--
            <div class="blog-headline-bg">
            </div><!--//blog-headline-bg-->
            <div class="blog-entry">                 
                <article class="post">
                    <header class="blog-entry-heading"  style="background: url('/uploads/posts/{{ $post->image }}') no-repeat 50% top; background-size: cover;">
                                
                            <div class="container text-center">
                                <h2 class="title">action {{ $post->action }}: {{ $post->title }}</h2>
                            </div><!--//container-->

                            <nav class="post-nav post-nav-top">
                                @if($previous)
                                <span class="nav-previous"><a href="/posts/{{ $previous->id }}/{{ $previous->slug }}" rel="prev"><i class="fa fa-angle-left"></i>Action {{ $previous->action }}</a></span>
                                @endif
                                @if($next)
                                <span class="nav-next"><a href="/posts/{{ $next->id }}/{{ $next->slug }}" rel="next">Action  {{ $next->action }}<i class="fa fa-angle-right"></i></a></span>
                                @else
                                <span class="nav-next"><a href="/archive" rel="next">View Archive<i class="fa fa-angle-right"></i></a></span>
                                @endif
                            </nav><!--//post-nav-->
                                
                            
						
                    </header><!--//blog-entry-heading-->

                    <div class="container">
                        <div class="row">
                            <div class="blog-entry-content">

                            <div class="meta">
                                <ul class="meta-list list-inline">                                       
                                    <li class="post-time">Week of {{ Carbon\Carbon::parse($post->week)->format('F j, Y') }}</li>
                                </ul><!--//meta-list-->     
                            </div><!--meta-->
                            {!! $post->body !!}

                            
                            @if ($post->id == '108') 
                            @if (Auth::check())
                             <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Your Senators</th>
                                    <th>Their Position on Russia/Comey</th>
                                    <th>Source</th>
                                    <th>Call Script</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    @if (isset($senator_1->first_name))
                                    <td><a href="/reps/{{ $senator_1->slug }}">{{ $senator_1->first_name }} {{ $senator_1->middle_name }} {{ $senator_1->last_name }}</a></td>
                                    <td>@if (isset($position_1->position)) {{ $position_1->position }} @endif</td>
                                    <td>@if (isset($statement_1->source)) <a href="{{ $statement_1->desc }}" target="_blank">{{ $statement_1->source }}</a> @endif</td>
                                    <td>
                                    <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-body" data-toggle="modal" data-target="#myModal">See Call Info</button>

                                        <!-- Modal -->
                                        <div id="myModal" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">{{ $senator_1->first_name }} {{ $senator_1->middle_name }} {{ $senator_1->last_name }} -- Call {{ $senator_1->phone }}</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>{!! str_replace('<senator>', $senator_1->last_name, $position_1->script) !!}</p>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>

                                          </div>
                                        </div>

                                    </td>

                                  </tr>
                                  
                                  
                                  <tr>
                                    <td>@if (isset($senator_2->first_name)) <a href="/reps/{{ $senator_2->slug }}">{{ $senator_2->first_name }} {{ $senator_2->middle_name }} {{ $senator_2->last_name }}</a> @endif</td>
                                    <td>@if (isset($position_2->position)) {{ $position_2->position }} @endif</td>
                                    <td>@if (isset($statement_2->source)) <a href="{{ $statement_2->desc }}" target="_blank">{{ $statement_2->source }}</a> @endif</td>
                                    <td>

                                    <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-body" data-toggle="modal" data-target="#myModal2">See Call Info</button>

                                        <!-- Modal -->
                                        <div id="myModal2" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">{{ $senator_2->first_name }} {{ $senator_2->middle_name }} {{ $senator_2->last_name }} -- Call {{ $senator_2->phone }}</h4>
                                              </div>
                                              <div class="modal-body">
                                                @if ($position_2->position == "Calls for independent investigation")
                                                <p>{{ $call_script_1 }} {{ $senator_2->last_name }} {!! $call_script_2 !!}</p>
                                                @elseif ($position_2->position == "Calls for ‘special prosecutor' or similar")
                                                <p>{{ $call_script_3 }} {{ $senator_2->last_name }} {!! $call_script_4 !!}</p>
                                                @elseif ($position_2->position == "Has questions or concerns about Trump's decision")
                                                <p>{{ $call_script_5 }} {{ $senator_2->last_name }} {!! $call_script_6 !!}</p>
                                                @elseif ($position_2->position == "Is neutral or supports Trump's decision")
                                                <p>{{ $call_script_7 }} {{ $senator_2->last_name }} {!! $call_script_8 !!}</p>
                                                @elseif ($position_2->position == "No statement yet")
                                                <p>{{ $call_script_9 }} {{ $senator_2->last_name }} {!! $call_script_10 !!}</p>
                                                @endif
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>

                                          </div>
                                        </div>

                                    </td>
                                    @else 
                                    <td colspan="4">
                                    You have no senators where you live. <a href="/reps">See all senators ></a>
                                    </td>
                                    @endif
                                  </tr>
                                
                                </tbody>
                              </table>
                              <p>If you have updated information email us at <a href="contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
                              @else
                                You must <a href="/login">login</a> to see the positions of your Senators.
                            @endif
                            

                            @endif
                                
                            </div><!--//blog-entry-content-->
                            
                        </div>
                         <div class="row">
                            <!--//Soical media buttons -->
                            <div class="share-container col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0" style="text-align: center">
                                @if (Auth::check())

                                    @if ($actions->count() > 0)

                                    <div class='search'>
                                        <button type="submit" class="btn btn-cta btn-cta-taken" disabled><i class="fa fa-check" style="color:#12464d"></i> I Took Action</button><br />
                                        <!--{{ $post->actions->count() }} actions taken-->
                                    </div>

                                    @else 

                                    <div class='search'>
                                    <form action="/actions" method="POST" target="action">
                                        {{ csrf_field() }} 
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-cta btn-cta-body">I Took Action</button>
                                    </form></div>

                                    @endif
                                    
                                    <br /><br />
                                    <div class="sharethis-inline-share-buttons"></div>
                                    </p>  
                                @else
                                    <p style="text-align: center;"><a class="btn btn-cta btn-cta-body" href="/signup">I Took Action</a><br />

                                    <br /><br />
                                    <div class="sharethis-inline-share-buttons"></div>
                                    </p>
                                @endif
               
                            
                            
                            		
                                    <!-- Buttons end here -->
                            </div><!--//share-container--> 
                        </div>
                        
                        <div class="row post-nav">
                            <div class="col-6 nav-previous">
                            @if($previous)
                            <a href="/posts/{{ $previous->id }}/{{ $previous->slug }}" rel="prev">Action {{ $previous->action }}: {{ $previous->title }}</a>
                            @endif
                            </div>
                            <div class="col-6 nav-next">
                            @if($next)
                            <a href="/posts/{{ $next->id }}/{{ $next->slug }}" rel="next">Action  {{ $next->action }}: {{ $next->title }}</a>
                            @endif
                            </div>
                        </div>
                       
                        </div><!--//row-->
                    </div><!--//container-->    
                                                              
                </article><!--//post-->                                      
            </div><!--//blog-entry-->
        </div><!--//blog-entry-wrapper-->  
    </div><!--//wrapper-->
@endsection
