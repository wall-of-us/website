@extends ('layouts.about')


@section ('content')

@if (Auth::user()->role == 'admin')	
<div class="blog-entry-wrapper"> 

<div class="container">
<div class="row">
<div class="blog-entry-content col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
<br /><h2>Edit action</h2>

<hr>
@include ('layouts.errors')
<form method="POST" action="/posts" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" id="id" name="id" value="{{ $post->id }}">
<input type="hidden" id="pic" name="pic" value="{{ $post->image }}">
<div class="form-group">
    <label for="week">Week</label>
    <input class="form-control" type="date" value="{{ $post->week }}" id="week" name="week" required>
</div>
<div class="form-group">
    <label for="action">Action</label>
    <select class="form-control" id="action" name="action">
      <option selected="{{ $post->action }}">{{ $post->action }}</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
  </div>
  <div class="form-group">
    <label for="title">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}">
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  
     
  <div class="form-group">
    <label for="title">Image</label><br>
    <img src="https://s3-us-west-1.amazonaws.com/wallofus/posts/{{ $post->image }}"
      alt="Alternate Text" width="200"  id="imagedisplay" /><br><br>
  <div style="height:0px;overflow:hidden">
     <input type="file" name="picture" id="picture" value="{{ $post->image }}" />
  </div>
  <a type="button" onclick="chooseFile();" style="cursor: pointer;"><i class="fa fa-upload"></i>  Upload a New Picture</a>

  <script>
     function chooseFile() {
        $("#picture").click();
     }

     $(document).ready(function() {

    $('#picture').change(function(e) {

      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagedisplay').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);

    });
  });
  </script>
      
  </div><!--//form-group-->


  
  <div class="form-group">
    <label for="shortbody">Short Description</label>
    <input type="text" class="form-control" id="shortbody" name="shortbody" value="{{ $post->shortbody }}">
</div>

  <div class="form-group">
    <label for="body">Description</label>
   <textarea class="textarea" placeholder="Enter text ..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;" name="body" id="some-textarea">{{ $post->body }}</textarea>

  </div>

  <div class="form-group">
    
 
@if ($post->cta == '1')
<div class="form-group">
<label for="action">Call to Action</label>
 <select id="cta" name="cta" class="form-control" >
  <option> Select an Action Type</option>
  <option value="1" selected> Call your representatives</option>
  <!--<option value="2"> Donate money</option>
  <option value="3"> Sign a petition</option>-->
</select>
</div>
<!-- CTA: Call -->

  <div class="form-group">
  <label for="action">Who do you want people to call?</label>
  <select multiple id="call" name="call" class="form-control" >
    <option selected="{{ $post->call }}">{{ $post->call }}</option>
    <option value="Senate"> Senate</option>
    <option value="House"> House</option>
    <option value="Reps"> All Reps</option>
    
  </select>
  </div>
  <div class="form-group">
    <label for="shortbody">General script for everyone (insert a &lt;name&gt; tag where you want the reps name to appear)</label>
    <textarea class="form-control" id="script" name="script">{{ $post->script }}</textarea>
  </div>

@else
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
    <option selected="{{ $post->call }}">{{ $post->call }}</option>
    <option value="Senate"> Senate</option>
    <option value="House"> House</option>
    <option value="Reps"> All Reps</option>
    
  </select>
  </div>
  <div class="form-group">
    <label for="shortbody">General script for everyone (insert a &lt;name&gt; tag where you want the reps name to appear)</label>
    <textarea class="form-control" id="script" name="script">{{ $post->script }}</textarea>
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
@endif

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


  
  

  
  <button type="submit" class="btn btn-primary">Update</button>
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
