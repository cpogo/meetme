@extends('app.layout')
@section('title', 'Error 404 Page not found')
@section('main')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						404 Error Page
					</h1>
					<ol class="breadcrumb">
						<li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">404 error</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="error-page">
						<h2 class="headline text-yellow"> 404</h2>
						<div class="error-content">
							<h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
							<p>
								We could not find the page you were looking for.
								Meanwhile, you may <a href="{{ url('dashboard') }}">return to dashboard</a> or try using the search form.
							</p>
							<form class="search-form">
								<div class="input-group">
									<input type="text" name="search" class="form-control" placeholder="Search">
									<div class="input-group-btn">
										<button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
									</div>
								</div><!-- /.input-group -->
							</form>
						</div><!-- /.error-content -->
					</div><!-- /.error-page -->
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
@endsection
@section('scripts')
		<!-- jQuery 2.1.4 -->
		<script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- FastClick -->
		<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('js/app.min.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('js/demo.js') }}"></script>
@endsection
