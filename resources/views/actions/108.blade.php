                 
                    @if (Auth::check())
                    <table class="table table-striped">
                    <thead>
                                  <tr>
                                    <th>Your Members of Congress</th>
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
                            
