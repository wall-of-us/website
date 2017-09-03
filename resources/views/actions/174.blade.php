

@if (Auth::check())
  <table class="table table-striped">
      <thead>
        <tr>
          
          <th>You Attorney General</th>
          <th>Contact</th>
          <th>Script</th>
          
        </tr>
      </thead>
      <tbody>
        
        <tr>
          @if (isset($ags))
          <td>{{ $ags->first_name }} {{ $ags->last_name }}</td>
          
          
          <td>{{ $ags->phone }}</td>
          
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
                      <h4 class="modal-title">{{ $ags->first_name }} {{ $ags->last_name }} -- Call {{ $ags->phone }}</h4>
                    </div>
                    <div class="modal-body">
                      <p>
                      {!! str_replace(array('<ag>'),
    array($ags->last_name), $ags->daca_script) !!}</p>
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
    
    <p>&nbsp;&nbsp;&nbsp;&nbsp;Check back here for updates, and share any new intel you learn by emailing <a href="mailto:contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
    @else
    
    <p>You must <a href="/login">login</a> to see the contact information for your AG and a personalized script.</p>
  @endif
  
