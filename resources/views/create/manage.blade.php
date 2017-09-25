@extends ('layouts.about')


@section ('content')
	

@if (Auth::user()->role == 'admin')
<div class="blog-entry-wrapper"> 

<div class="container">
<div class="row">
<div class="blog-entry-content" style="padding-right: 50px; padding-left: 50px;">

<br /><h2>Manage actions <a class="btn btn-cta btn-cta-body" href="/create" style="float: right;">+ Add action</a></h2>

<br>
<table class="table">
  <thead>
    <tr>
      <th>Date</th>
      <th>#</th>
      <th>Action</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      @if ($post->week > date('Y-m-d'))
      <tr style="background-color:#eee">
      @else
      <tr>
      @endif
    
      <td scope="row">{{ Carbon\Carbon::parse($post->week)->format('m/d/y') }}</td>
      <td>{{ $post->action }}</td>
      <td width="100%">{{ $post->title }}</td>
      <td nowrap="nowrap" align="right">
        @if ($post->week > date('Y-m-d'))
        <form id="myform" method="POST" action="/delete" onsubmit="return ConfirmDelete();">
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{ $post->id }}">
        <button type="submit" class="btn-link" style="color:#000000; padding: 0px; margin: 0px;"><i class="fa fa-trash"></i></button>&nbsp;&nbsp;&nbsp;
        <a href="/update/{{ $post->id }}/{{ $post->slug }}" style="color:#000000;"><i class="fa fa-pencil-square-o"></i></a> &nbsp;&nbsp;&nbsp;<a href="/posts/{{ $post->id }}/{{ $post->slug }}" style="color:#000000;"><i class="fa fa-eye"></i></a>
        </form>

        @else
        <a href="/update/{{ $post->id }}/{{ $post->slug }}" style="color:#000000;"><i class="fa fa-pencil-square-o"></i></a> &nbsp;&nbsp;&nbsp;<a href="/posts/{{ $post->id }}/{{ $post->slug }}" style="color:#000000;"><i class="fa fa-eye"></i></a>
        @endif

      </td>
    </tr>
    @endforeach
    <script>
      function ConfirmDelete()
      {
      var x = confirm("Are you sure you want to delete this action?");
      if (x)
        return true;
      else
        return false;
      }
    </script>

    <tr>
      <td colspan="4"> 
    {{ $posts->links() }}
  </td></tr>
  </tbody>
</table>
</div>
</div>
</div>
</div>
@else
<div class="blog-entry-wrapper"> 
     <div class="blog-entry">                 
        <article class="post">
          <div class="container">
            <div class="row">
              <div class="blog-entry-content">
                <div class="text-center">
                  <h3 class="title">Sorry, you are not a registered admin.</h3>
                </div>
                <p style="font-size: 200px; text-align: center;">401</p>
                
                @if (Auth::check())
                <p class="text-center"><a class="btn btn-cta btn-cta-body" href="/actions">Take Action</a></p>   
                @else
                <p class="text-center"><a class="btn btn-cta btn-cta-body" href="/signup">Sign Up Now</a></p>
                @endif
                </div>
              
            </div><!--//container-->
     
                       
                        </div><!--//row-->
                    </div><!--//container-->    
                                                              
                </article><!--//post-->                                      
            </div><!--//blog-entry-->
        </div><!--//blog-entry-wrapper-->  
    </div><!--//wrapper-->
@endif





@endsection
