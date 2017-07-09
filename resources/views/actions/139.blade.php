
<p>Here’s how:</p>
<ol>
<li>Call your state official using the contact info and script below.</li>


@if (Auth::check())
  <table class="table table-striped">
      <thead>
        <tr>
          
          <th>Position</th>
          <th>Rep</th>
          <th>Contact</th>
          <th>Call Script</th>
          
        </tr>
      </thead>
      <tbody>
        
        <tr>
          @if (isset($positions_voting))
          <td><a href="{{ $positions_voting->source }}" target="_blank">{{ $positions_voting->position }}</a></td>
          
          <td>{{ $positions_voting->rep }}, {{ $positions_voting->title }}</td>
          <td>{{ $positions_voting->contact }}</td>
          
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
                      <h4 class="modal-title">{{ $positions_voting->rep }}, {{ $positions_voting->title }} -- Call {{ $positions_voting->contact }}</h4>
                    </div>
                    <div class="modal-body">
                      <p>
                      {!! str_replace(array('<rep>', '<state>', '<title>'),
    array($positions_voting->rep, $positions_voting->state, $positions_voting->title), $positions_voting->script) !!}</p>
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
    <li>Share this action on social media.</li>
</ol>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;Check back here for updates, and share any new intel you learn by emailing <a href="mailto:contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
    @else
    <li>Share this action on social media.</li>
    </ol>
    <p>You must <a href="/login">login</a> to see the contact information for your reps and a personalized script.</p>
  @endif
  
