<!DOCTYPE html>
<!--
	Spectral by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>MeetMe - @yield('title', 'A Better Meeting Planner')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('css/ie8.css') }}" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('css/ie9.css') }}" /><![endif]-->
	</head>
	<body class="landing">

<!--
{{ var_dump(session()->all()) }}
@if(isset($_SESSION))
{{ var_dump($_SESSION) }}
@endif
-->

		<!-- Page Wrapper -->
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header">
				<h1><a href="{{ url('/') }}">MeetMe</a></h1>
				<nav id="nav">
					<ul>
						<li class="special">
							<a href="#menu" class="menuToggle"><span>Menu</span></a>
							<div id="menu">
								<ul>
									<li><a href="{{ url('/') }}">Home</a></li>
									<li><a href="{{ url('signIn') }}">Sign In Google</a></li>
									{{--  <li><a href="{{ url('register') }}">Sign Up</a></li>--}}
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</header>

@yield('main')

		</div>

@yield('form')

		<!-- Scripts -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/jquery.scrollex.min.js') }}"></script>
		<script src="{{ asset('js/jquery.scrolly.min.js') }}"></script>
		<script src="{{ asset('js/skel.min.js') }}"></script>
		<script src="{{ asset('js/util.js') }}"></script>
		<!--[if lte IE 8]><script src="{{ asset('js/ie/respond.min.js') }}"></script><![endif]-->
		<script src="{{ asset('js/main.js') }}"></script>

	</body>
</html>