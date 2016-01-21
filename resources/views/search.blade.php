@extends('app.layout')
@section('title', 'Search')
@section('main')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Search
						<small>Users and Groups</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li class="active">Search</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">

					<!-- START CUSTOM TABS -->
					<h2 class="page-header">Results for <strong>"{{ $query }}"</strong></h2>

					<div class="row">
						<div class="col-md-12">
							<!-- Custom Tabs -->
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Users ({{ $found_users->count() }})</a></li>
									<li><a href="#tab_2" data-toggle="tab">Groups ({{ $found_groups->count() }})</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
@if(count($found_users) == 0)
											No Results
@else
											<ul class="users-list clearfix">
@foreach($found_users as $found_user)
												<li>
													<a href="{{ url('profile/'.$found_user->username) }}">
														<img class="profile-user-img img-responsive img-circle" src="{{ asset('img/user'. $found_user->id .'.jpg') }}" alt="{{ $found_user->full_name }}">
													</a>
													<a class="users-list-name" href="{{ url('profile/'.$found_user->username) }}">{{ $found_user->full_name }}</a>
													<a href="{{ url('profile/'.$found_user->username) }}">
														<span class="users-list-date">{{ $found_user->username }}</span>
													</a>
												</li>
@endforeach
											</ul>
											<!-- /.users-list -->
@endif
									</div>
									<!-- /.tab-pane -->
									<div class="tab-pane" id="tab_2">
@if(count($found_groups) == 0)
											No Results
@else
											<ul class="users-list clearfix">
@foreach($found_groups as $found_group)
												<li>
													<a class="users-list-name" href="{{ url('mygroup/' . $found_group->id) }}">{{ $found_group->name }}</a>
													<a href="{{ url('mygroup/' . $found_group->id) }}">
														<span class="users-list-date">{{ $found_group->description }}</span>
													</a>
												</li>
@endforeach
											</ul>
											<!-- /.users-list -->
@endif
									</div>
									<!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->
							</div>
							<!-- nav-tabs-custom -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
					<!-- END CUSTOM TABS -->

				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
@endsection
@section('scripts')
		<!-- jQuery 2.1.4 -->
		<script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- Slimscroll -->
		<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
		<!-- FastClick -->
		<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('js/app.min.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('js/demo.js') }}"></script>
		<script src="{{ asset('js/search.js') }}"></script>
@endsection