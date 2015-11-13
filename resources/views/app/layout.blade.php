<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>MeetMe |  @yield('title', 'A Better Meeting Planner')</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<!-- Ionicons -->
		<!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
		<link rel="stylesheet" href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}">
@yield('stylesheet_pages')
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
		<!--style.css-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
@yield('stylesheet_dashboard')

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition skin-blue sidebar-mini">

<!--
{{ var_dump(session()->all()) }}
@if(isset($_SESSION))
{{ var_dump($_SESSION) }}
@endif
-->

		<div class="wrapper">

			@include('app.header')

			@include('app.sidebar')

@yield('main')

			@include('app.footer')

			@include('app.control_sidebar')

		</div><!-- ./wrapper -->

@yield('scripts')

	</body>
</html>