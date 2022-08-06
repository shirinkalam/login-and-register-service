
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Responsive Menu,Mobile Dropdown Menu, Mobile Menu, Jquery Dropdown Menu, HTML,CSS,jQuery,JavaScript,Mobile">
	<meta name="author" content="Kushal Vedant Mahajan">
	<link rel="stylesheet" href="css/app.css" type="text/css" media="screen" title="Responsive Menu" charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js" type="text/javascript"></script>
	</head>
	<body>
		<nav id="menu" class="navbar navbar-default">
			<div class="container">

				<div id="navbar">
					<ul class="nav navbar-nav">
                        @guest
                        <li><a href="#about">@lang('public.login')</a></li>
						<li><a href="#contact">@lang('public.register')</a></li>
                        <li><a href="#support">@lang('public.home')</a></li>
                        @endguest

                        @auth()
                        <a href="index.html"><li class="active">@lang('auth.profile')</li></a>
                        @endauth

					</ul>
				</div>

			</div>
		</nav>
		<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="{{asset('js/app.js')}}" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
