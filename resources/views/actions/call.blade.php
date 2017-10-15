
<!-- SENATE -->
@if ($post->call == 'Senate')
@if (Auth::check())

<table class="table table-striped">
<thead>
<tr>
  <th>Your Senators</th>
  <th>Phone Number</th>
  @if (isset($post->script))
  <th>Call Script</th>
  @endif
</tr>
</thead>
<tbody>

<tr>
  @if (isset($senator_1->first_name))
  <td><a href="/reps/{{ $senator_1->slug }}">{{ $senator_1->first_name }} {{ $senator_1->middle_name }} {{ $senator_1->last_name }}</a></td>
  <td>{{ $senator_1->phone }}</td>
  @if (isset($post->script))
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
             {!! str_replace(array('<name>'), array($senator_1->last_name), $post->script) !!}
              </p>
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
  <td>@if (isset($senator_2->first_name)) <a href="/reps/{{ $senator_2->slug }}">{{ $senator_2->first_name }} {{ $senator_2->middle_name }} {{ $senator_2->last_name }}</a> @endif</td>
  <td>{{ $senator_1->phone }}</td>
  @if (isset($post->script))
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
              {!! str_replace(array('<name>'), array($senator_2->last_name), $post->script) !!}
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

  </td>
  @endif
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
You must <a href="/login">login</a> to see the contact info and scripts for your senators.
@endif
@endif

<!-- HOUSE -->

@if ($post->call == 'House')
@if (Auth::check())

<table class="table table-striped">
<thead>
<tr>
  <th>Your representative</th>
  <th>Phone Number</th>
  @if (isset($post->script))
  <th>Call Script</th>
  @endif
</tr>
</thead>
<tbody>

<tr>
  @if (isset($rep))
  <td><a href="/house/{{ $rep_slug }}">representative {{ $rep }}</a></td>
  <td>{{ $rep_phone }}</td>
  @if (isset($post->script))
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
              <h4 class="modal-title">representative {{ $rep }} -- Call {{ $rep_phone }}</h4>
            </div>
            <div class="modal-body">
              <p>
             {!! str_replace(array('<name>'), array($rep), $post->script) !!}
              </p>
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

@endif


<p>If you have updated information email us at <a href="contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
@else
You must <a href="/login">login</a> to see the contact info and scripts for your representatives.
@endif
@endif

<!-- Combined Reps -->

@if ($post->call == 'Reps')
@if (Auth::check())

<table class="table table-striped">
<thead>
<tr>
  <th>Your representative(s)</th>
  <th>Phone Number</th>
  @if (isset($post->script))
  <th>Call Script</th>
  @endif
</tr>
</thead>
<tbody>
<tr>
  @if (isset($senator_1->first_name))
  <td><a href="/reps/{{ $senator_1->slug }}">Senator {{ $senator_1->first_name }} {{ $senator_1->middle_name }} {{ $senator_1->last_name }}</a></td>
  <td>{{ $senator_1->phone }}</td>
  @if (isset($post->script))
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
              <h4 class="modal-title">Senator {{ $senator_1->first_name }} {{ $senator_1->middle_name }} {{ $senator_1->last_name }} -- Call {{ $senator_1->phone }}</h4>
            </div>
            <div class="modal-body">
              <p>
             {!! str_replace(array('<name>'), array('Senator '.$senator_1->last_name), $post->script) !!}
              </p>
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
  <td>@if (isset($senator_2->first_name)) <a href="/reps/{{ $senator_2->slug }}">Senator {{ $senator_2->first_name }} {{ $senator_2->middle_name }} {{ $senator_2->last_name }}</a> @endif</td>
  <td>{{ $senator_2->phone }}</td>
  @if (isset($post->script))
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
              <h4 class="modal-title">Senator {{ $senator_2->first_name }} {{ $senator_2->middle_name }} {{ $senator_2->last_name }} -- Call {{ $senator_2->phone }}</h4>
            </div>
            <div class="modal-body">
            <p>
              {!! str_replace(array('<name>'), array('Senator '.$senator_2->last_name), $post->script) !!}
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

  </td>
  @endif
  @else 
  <td colspan="4">
  You have no senators where you live. <a href="/reps">See all senators ></a>
  </td>
  @endif
</tr>
<tr>
  @if (isset($rep))
  <td><a href="/house/{{ $rep_slug }}">representative {{ $rep }}</a></td>
  <td>{{ $rep_phone }}</td>
  @if (isset($post->script))
  <td>
  <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-body" data-toggle="modal" data-target="#myModal3">Call Script</button>

      <!-- Modal -->
      <div id="myModal3" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">representative {{ $rep }} -- Call {{ $rep_phone }}</h4>
            </div>
            <div class="modal-body">
              <p>
             {!! str_replace(array('<name>'), array('representative '.$rep), $post->script) !!}
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

  </td>
  @endif
@endif
</tr>

</tbody>
</table>



<p>If you have updated information email us at <a href="contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
@else
You must <a href="/login">login</a> to see the contact info and scripts for your representatives.
@endif
@endif

<!-- AGs -->

@if ($post->call == 'AGs')
@if (Auth::check())

<table class="table table-striped">
<thead>
<tr>
  <th>Your Attorney General</th>
  <th>Phone Number</th>
 
</tr>
</thead>
<tbody>

<tr>
  @if (isset($ags))
  <td>{{ $ags->first_name }} {{ $ags->last_name }}</td>
  <td>{{ $ags->phone }}</td>
  
</tr>

</tbody>
</table>

@endif


<p>If you have updated information email us at <a href="contact@wall-of-us.org">contact@wall-of-us.org</a>.</p>
@else
You must <a href="/login">login</a> to see the contact info and scripts for your representatives.
@endif
@endif