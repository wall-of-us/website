@extends ('layouts.about')


@section ('content')

@if (Auth::user()->role == 'admin')
<div class="blog-entry-wrapper"> 

<div class="container">
<div class="row">
<div class="blog-entry-content col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
<br /><h2>Post a new action</h2>

<hr>
@include ('layouts.errors')
<form method="POST" action="/posts" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
    <label for="week">Week</label>
    <input class="form-control" type="date" value="" id="week" name="week">
</div>
<div class="form-group">
    <label for="action">Action</label>
    <select class="form-control" id="action" name="action">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="title">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Upload an Image</label>
    <input type="file" class="form-control-file" id="picture" name="picture">
  </div>
  <div class="form-group">
    <label for="shortbody">Short Description</label>
    <input type="text" class="form-control" id="shortbody" name="shortbody">
</div>

  <div class="form-group">
    <label for="body">Description</label>
   <textarea class="textarea" placeholder="Enter text ..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;" name="body" id="some-textarea"></textarea>

  </div>

  <div class="form-group">
    
 

<div class="form-group">
<label for="action">Call to Action</label>
 <select id="cta" name="cta" class="form-control" >
  <option> Select an Action Type</option>
  <option value="1"> Call your representatives</option>
  <!--<option value="2"> Donate money</option>
  <option value="3"> Sign a petition</option>-->
</select>
</div>
<!-- CTA: Call -->
<div class="myDiv" id="1">
  <div class="form-group">
  <label for="action">Who do you want people to call?</label>
  <select multiple id="call" name="call" class="form-control" >
    <option value="Senate"> Senate</option>
    <option value="House"> House</option>
    <option value="Reps"> All Reps</option>
    
  </select>
  </div>
  <div class="form-group">
    <label for="shortbody">General script for everyone (insert a &lt;name&gt; tag where you want the reps name to appear)</label>
    <textarea class="form-control" id="script" name="script"></textarea>
  </div>
  
</div>
<!-- CTA: Donation -->
<div class="myDiv" id="2">
  <div class="form-group">
    <label for="shortbody">Embed donation code</label>
    <textarea class="form-control" id="code" name="code"></textarea>
  </div>
  <div class="form-group">
    <label for="title">Or link to donation page</label>
    <input type="text" class="form-control" id="link" name="link">
  </div>
</div>


<!-- CTA: Petition -->
<div class="myDiv" id="3">
  <div class="form-group">
      <label for="shortbody">Embed petition code</label>
      <textarea class="form-control" id="code" name="code"></textarea>
  </div>
  <div class="form-group">
    <label for="title">Or link to petition page</label>
    <input type="text" class="form-control" id="link" name="link">
  </div>
</div>




<script type="text/javascript">
  
  document.getElementById('cta').onchange = function() {
    var i = 1;
    var myDiv = document.getElementById(i);
    while(myDiv) {
        myDiv.style.display = 'none';
        myDiv = document.getElementById(++i);
    }
    document.getElementById(this.value).style.display = 'block';
};
</script>


  
 

  
  <button type="submit" class="btn btn-primary">Publish</button>
</form>



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
