<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  

<head>
    
    <title>Action {{ $post->action }}: {{ $post->title }} -- wall-of-us</title>
    <base href="https://www.wallofus.org/" />
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $post->shortbody }}">
    <meta name="author" content="wall-of-us"> 

    <meta property="og:url" content="{{ $url }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Action {{ $post->action }}: {{ $post->title }}" />
    <meta property="og:description" content="{{ $post->shortbody }}" />
    <meta property="og:image" content="https://s3-us-west-1.amazonaws.com/wallofus/posts/{{ $post->image }}" />

    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58f845f484ae8700129bcc7a&product=inline-share-buttons"></script>

	<script src="https://use.typekit.net/oht7xro.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'> 
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
  
    <!-- Global CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.css">
    <!-- Theme CSS -->
	 <!-- social media buttons -->
	 <link rel="stylesheet" href="https://nneditch.github.io/wall-of-us/assets/plugins/rrssb/css/rrssb.css" />
	
    <link id="theme-style" rel="stylesheet" href="/css/app.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 


<body class="blog-page blog-page-single">
  
    <div class="wrapper">
        <!-- ******HEADER****** --> 
        <header id="header" class="header header-blog">  
            <div class="container">       
                <h1 class="logo">
                    <a href="/"><span class="text">wall-of-us</span></a>
                </h1><!--//logo-->
                <nav class="main-nav navbar-right" role="navigation">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button><!--//nav-toggle-->
                    </div><!--//navbar-header-->
                    <div id="navbar-collapse" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a href="/">Home</a></li>
						<li class="nav-item"><a href="/actions">Weekly Acts</a></li>
						<!--<li class="nav-item"><a href="/bricks">Brick-by-brick</a></li>-->
                        <li class="nav-item"><a href="/about">About Us</a></li>
						@if (Auth::check())
						
                        <li class="nav-item"><a href="/profile"><img src="{{ Auth::user()->picture }}" alt="Alternate Text" class="user-tiny" />&nbsp;
                            @if ($flash = session('message')){{ $flash }}@endif {{ Auth::user()->name }}
                        </a>
                        </li>

						@else 
							<li class="nav-item"><a href="/login">Log in</a></li>
							<li class="nav-item"><a class="" href="/signup">Sign Up</a></li>
						@endif
                        </ul><!--//nav-->
                        
                        
                        
                    </div><!--//navabr-collapse-->
                </nav><!--//main-nav-->                     
            </div><!--//container-->
        </header><!--//header-->                
      
    @yield('content')
    
	@include ('layouts.footer')
	
	
	</body>
	</html> 