
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
          <td>{{ $positions->position }}</td>
          
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
                      <p>
                      @if ($positions->position != 'Joined state coalition to uphold the Paris Accord, accepts science, strong state record')
                      <p>I am calling about the Paris Agreement and Governors {{ $governor->last_name }}’s position on it. Over the past few days, Governors around the country have expressed their support for the agreement and have vowed to honor it. These Governors are fulfilling their duty to protect the environment of their states. Is Governor {{ $governor->last_name }} planning to join these leaders and express his/her support? </p>

                      <p>If yes, when?</p>

                      <p>If no, I am deeply disappointed that Governor {{ $governor->last_name }} is putting politics over planet and depriving current and future generations from clean air and water, which are basic human rights.</p>

                      @else
                      
                      <p>I am calling to thank Governor {{ $governor->last_name }} for vowing to honor the Paris Agreement. As former President Barack Obama recently said, States are going to lead the way on climate change. Governor {{ $governor->last_name }}’s commitment to our planet is an example of that leadership.</p>

                      @endif</p>
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
    <p>&nbsp;&nbsp;&nbsp;&nbsp;3. Share any intel you learn about your governor by emailing <a href="contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
    @else
      You must <a href="/login">login</a> to see the positions of your Representitives.
  @endif
  
