                 
                    @if (Auth::check())
                    <table class="table table-striped">
                    <thead>
                                  <tr>
                                    <th>Your Senators</th>
                                    
                                    <th>Call Script</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    @if (isset($senator_1->first_name))
                                    <td><a href="/reps/{{ $senator_1->slug }}">{{ $senator_1->first_name }} {{ $senator_1->middle_name }} {{ $senator_1->last_name }}</a></td>
                                    
                                    
                                    <td>
                                    <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-body" data-toggle="modal" data-target="#myModal">Call Script</button>

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
                                                <p>
                                               @if ($senator_1->party == "R")
                                               
                                                I am calling about Donald, Jr.’s apparent collusion with the Russian government. Enough is enough--when will Senator {{ $senator_1->last_name }} put country over party? I would like Senator {{ $senator_1->last_name }} to make a public statement denouncing the Trump administration’s cooperation with the Russian government during the campaign.  Senator {{ $senator_1->last_name }} should also ask the Department of Justice to investigate whether the Trump campaign violated federal election laws. 


                                                @else
                                                
                                                I am calling about Donald, Jr.’s apparent collusion with the Russian government. Election experts have concluded this violates federal criminal election laws. Has Senator {{ $senator_1->last_name }} read the complaint filed by Common Cause which asks the DOJ to investigate whether Donald, Jr.’s actions violate the Federal Election Campaign Act? Common Cause explains that the DOJ has the right to investigate this violation. I am calling to ask that Senator {{ $senator_1->last_name }} write to the DOJ in support of the Common Cause letter and to ask the DOJ to investigate whether Trump violated federal election laws.


                                                @endif
                                                </p>
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
                                    
                                    <td>

                                    <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-body" data-toggle="modal" data-target="#myModal2">Call Script</button>

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
                                              <p>
                                                @if ($senator_2->party == "R")
                                               
                                                I am calling about Donald, Jr.’s apparent collusion with the Russian government. Enough is enough--when will Senator {{ $senator_2->last_name }} put country over party? I would like Senator {{ $senator_2->last_name }} to make a public statement denouncing the Trump administration’s cooperation with the Russian government during the campaign.  Senator {{ $senator_2->last_name }} should also ask the Department of Justice to investigate whether the Trump campaign violated federal election laws. 

                                                @else
                                                
                                                I am calling about Donald, Jr.’s apparent collusion with the Russian government. Election experts have concluded this violates federal criminal election laws. Has Senator {{ $senator_2->last_name }} read the complaint filed by Common Cause which asks the DOJ to investigate whether Donald, Jr.’s actions violate the Federal Election Campaign Act? Common Cause explains that the DOJ has the right to investigate this violation. I am calling to ask that Senator {{ $senator_2->last_name }} write to the DOJ in support of the Common Cause letter and to ask the DOJ to investigate whether Trump violated federal election laws.

                                                @endif
                                                </p>
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
                                You must <a href="/login">login</a> to see the contact info and scripts for your Senators.
                            @endif
                            
