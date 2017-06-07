
@if (Auth::check())
  <table class="table table-striped">
      <thead>
        <tr>
          <th>Your Representitives</th>
          
          <th>Call Script</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          @if (isset($rep))
          <td><a href="/house/{{ $rep_slug }}">Representitive {{ $rep }}</a></td>
          
          
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
                      <h4 class="modal-title">{{ $rep }} -- Call {{ $rep_phone }}</h4>
                    </div>
                    <div class="modal-body">
                      <p>Hi, my name is {{ Auth::user()->name }} and I’m a constituent from {{ Auth::user()->city }}, {{ Auth::user()->zip }}. I live at @if (Auth::user()->address)
                      {{ Auth::user()->address }}
                      @else
                      [tell them your street address]
                      @endif.</p>

                      <p>I’m calling to urge Representitive {{ $rep }} to reject the Trump’s administration’s proposed cuts to the Education Budget. </p>

                      <p>(Share a personal story or reason this matters to you. See the following prompts:)</p>

                     <p> --- I (or someone close to you) am a product of the public school system and I think more effort should be spent on improving it, not abandoning it. [provide more details about your experience and how public school helped you)</p>

                     <p> -- I (or someone close to you) relied on federal assistance to pay for higher education, and I support the programs that make it easier for students to do so and to protect them from abuse by lending companies.</p>

                     <p> -- It is important to me that my children (or young people close to you) have access to reasonable class sizes, well-trained teachers, special education resources.  </p>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

          </td>
          <td></td>
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
                      <p>Hi, my name is {{ Auth::user()->name }} and I’m a constituent from {{ Auth::user()->city }}, {{ Auth::user()->zip }}. I live at @if (Auth::user()->address)
                      {{ Auth::user()->address }}
                      @else
                      [tell them your street address]
                      @endif.</p>

                      <p>I’m calling to urge Senator {{ $senator_1->last_name }} to reject the Trump’s administration’s proposed cuts to the Education Budget. </p>

                      <p>(Share a personal story or reason this matters to you. See the following prompts:)</p>

                     <p> --- I (or someone close to you) am a product of the public school system and I think more effort should be spent on improving it, not abandoning it. [provide more details about your experience and how public school helped you)</p>

                     <p> -- I (or someone close to you) relied on federal assistance to pay for higher education, and I support the programs that make it easier for students to do so and to protect them from abuse by lending companies.</p>

                     <p> -- It is important to me that my children (or young people close to you) have access to reasonable class sizes, well-trained teachers, special education resources.  </p>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

          </td>
          <td></td>
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
                      <p><p>Hi, my name is {{ Auth::user()->name }} and I’m a constituent from {{ Auth::user()->city }}, {{ Auth::user()->zip }}. I live at @if (Auth::user()->address)
                      {{ Auth::user()->address }}
                      @else
                      [tell them your street address]
                      @endif.</p>

                      <p>I’m calling to urge Senator {{ $senator_2->last_name }} to reject the Trump’s administration’s proposed cuts to the Education Budget. </p>

                      <p>(Share a personal story or reason this matters to you. See the following prompts:)</p>

                     <p> --- I (or someone close to you) am a product of the public school system and I think more effort should be spent on improving it, not abandoning it. [provide more details about your experience and how public school helped you)</p>

                     <p> -- I (or someone close to you) relied on federal assistance to pay for higher education, and I support the programs that make it easier for students to do so and to protect them from abuse by lending companies.</p>

                     <p> -- It is important to me that my children (or young people close to you) have access to reasonable class sizes, well-trained teachers, special education resources.  </p>
                      </p></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

          </td>
          <td></td>
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
      You must <a href="/login">login</a> to see the contact info for your Representitives.
  @endif
  
