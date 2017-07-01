
@if (Auth::check())
  <table class="table table-striped">
      <thead>
        <tr>
          <th>Your Governor</th>
          <th>Position</th>
          <th>Call Script</th>
          
        </tr>
      </thead>
      <tbody>
        
        <tr>
          @if (isset($governor))
          <td><a href="/governors/{{ $governor->slug }}">Governor {{ $governor->first_name }} {{ $governor->last_name }}</a></td>
          <td>{{ $positions_health->position }}</td>
          
          <td>
          <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-body" data-toggle="modal" data-target="#myModal">Click for Script</button>

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
                      <p>
                      {!! str_replace(array('<governor>', '<state>'),
    array($governor->last_name, $governor->state), $positions_health->script) !!}</p>
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
        
      
      </tbody>
    </table>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;3. Share any intel you learn about your governor by emailing <a href="mailto:contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
    @else
      You must <a href="/login">login</a> to see the contact information for your Governor and a personalized script.
  @endif
  
