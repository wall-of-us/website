
@if (Auth::check())
  <table class="table table-striped">
      <thead>
        <tr>
          <th width="100%">Your Representitives</th>
          
          <th>Call Script</th>
          
        </tr>
      </thead>
      <tbody>
        
        <tr>
          @if (isset($governor))
          <td><a href="/governors/{{ $governor->slug }}">Governor {{ $governor->first_name }} {{ $governor->last_name }}</a></td>
          
          
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
                      <h4 class="modal-title">{{ $governor->first_name }} {{ $governor->last_name }} -- Call {{ $governor->phone }}</h4>
                    </div>
                    <div class="modal-body">
                      <p>I am calling to ask Governor {{ $governor->last_name }} to stand up for healthcare in general and Medicaid in particular. I learned this week from the Congressional Budget Office’s report that the House’s Healthcare plan would cut $839 billion from Medicaid. Trump’s budget released this week would cut an additional $610 billion! The ACA expanded Medicaid for the states, giving coverage to our most vulnerable residents.
 
                      I am not just worried about Medicaid. The Congressional Budget Office’s report also estimated that many states would see increases in their premiums and that 23 Million Americans would eventually lose their coverage.
                       
                      What is Governor {{ $governor->last_name }}’s response to this? Has he/she made any public statements? Where can I find his/her statements?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

          </td>
          
          @endif
        </tr>
        <tr>

          @if (isset($senator_1->first_name))
          <td><a href="/reps/{{ $senator_1->slug }}">Senator {{ $senator_1->first_name }} {{ $senator_1->middle_name }} {{ $senator_1->last_name }}</a></td>
          
          
          <td>
          <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-body" data-toggle="modal" data-target="#myModal1">See Call Info</button>

              <!-- Modal -->
              <div id="myModal1" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">{{ $senator_1->first_name }} {{ $senator_1->middle_name }} {{ $senator_1->last_name }} -- Call {{ $senator_1->phone }}</h4>
                    </div>
                    <div class="modal-body">
                      <p>I am calling to ask Senator {{ $senator_1->last_name }} to stand up for healthcare in general and Medicaid in particular. I learned this week from the Congressional Budget Office’s report that the House’s Healthcare plan would cut $839 billion from Medicaid. Trump’s budget released this week would cut an additional $610 billion! The ACA expanded Medicaid for the states, giving coverage to our most vulnerable residents.
 
                      I am not just worried about Medicaid. The Congressional Budget Office’s report also estimated that many states would see increases in their premiums and that 23 Million Americans would eventually lose their coverage.
                       
                      What is Senator {{ $senator_1->last_name }}’s response to this? Has he/she made any public statements? Where can I find his/her statements?</p>
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
          <td>@if (isset($senator_2->first_name)) <a href="/reps/{{ $senator_2->slug }}">Senator {{ $senator_2->first_name }} {{ $senator_2->middle_name }} {{ $senator_2->last_name }}</a> @endif</td>
          
          
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
                      <h4 class="modal-title">Senator {{ $senator_2->first_name }} {{ $senator_2->middle_name }} {{ $senator_2->last_name }} -- Call {{ $senator_2->phone }}</h4>
                    </div>
                    <div class="modal-body">
                      <p>I am calling to ask Senator {{ $senator_2->last_name }} to stand up for healthcare in general and Medicaid in particular. I learned this week from the Congressional Budget Office’s report that the House’s Healthcare plan would cut $839 billion from Medicaid. Trump’s budget released this week would cut an additional $610 billion! The ACA expanded Medicaid for the states, giving coverage to our most vulnerable residents.
 
                      I am not just worried about Medicaid. The Congressional Budget Office’s report also estimated that many states would see increases in their premiums and that 23 Million Americans would eventually lose their coverage.
                       
                      What is Senator {{ $senator_2->last_name }}’s response to this? Has he/she made any public statements? Where can I find his/her statements?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

          </td>
          
          @else 
          <td colspan="3">
          You have no senators where you live. <a href="/reps">See all senators ></a>
          </td>
          @endif
        </tr>
      
      </tbody>
    </table>
    <p>If you have updated information email us at <a href="contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
    @else
      You must <a href="/login">login</a> to see the positions of your Representitives.
  @endif
  
