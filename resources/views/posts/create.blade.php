@extends ('layouts.master')


@section ('content')
	
<div class="blog-entry-wrapper"> 

<div class="container">
<div class="row">
<div class="blog-entry-content col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
<br /><h2>Publish a Post</h2>

<hr>

<form method="POST" action="/posts">
{{ csrf_field() }}
<div class="form-group">
    <label for="week">Week</label>
    <input type="text" class="form-control" id="week" name="week">
</div>
<div class="form-group">
    <label for="action">Action</label>
    <input type="text" class="form-control" id="action" name="action">
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  
  <div class="form-group">
    <label for="shortbody">Short Body</label>
    <input type="text" class="form-control" id="shortbody" name="shortbody">
</div>

<div class="form-group">
    <label for="image">Image URL</label>
    <input type="text" class="form-control" id="image" name="image">
</div>
  
  <div class="form-group">
    <label for="body">Body</label>
    <textarea id="body" class="form-control" name="body"></textarea>
    
  </div>
  
  @include ('layouts.errors')

  
  <button type="submit" class="btn btn-primary">Publish</button>
</form>



</div>
</div>
</div>
</div>

@endsection
