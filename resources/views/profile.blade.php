@extends('app.layout')
@section('title', 'Profile')
@section('main')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Profile
					</h1>
					<ol class="breadcrumb">
						<li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li class="active">Profile</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">

					<div class="row">
						<div class="col-md-3">

							<!-- Profile Image -->
							<div class="box box-primary">
								<div class="box-body box-profile">
									<img class="profile-user-img img-responsive img-circle" src="{{ asset('img/user'. $profile->id .'.jpg') }}" alt="{{ $profile->full_name }}">
									<h3 class="profile-username text-center">{{$profile->full_name}}</h3>
									<p class="text-muted text-center">{{$profile->username}}</p>

									<ul class="list-group list-group-unbordered">
										<li class="list-group-item">
											<b>Followers</b> <a class="pull-right">{{count($followers)}}</a>
										</li>
										<li class="list-group-item">
											<b>Following</b> <a class="pull-right">{{count($following)}}</a>
										</li>
										<li class="list-group-item">
											<b>Groups</b> <a class="pull-right">{{count($groups)}}<?php if( count($groups_owner) > 0 ){ ?> ( Owner of {{count($groups_owner)}} )<?php } ?></a>
										</li>
<!--
										<li class="list-group-item">
											<b>Meetings</b> <a class="pull-right">{{count($meetings)}}<?php if( count($meetings_owner) > 0 ){ ?> ( Owner of {{count($meetings_owner)}} )<?php } ?></a>
										</li>
-->
{{--
										<li class="list-group-item">
											<b>Friends</b> <a class="pull-right">13,287</a>
										</li>
--}}
									</ul>
@if ($user->id != $profile->id)
<?php
if(!$follow_profile){
?>
									<form class="form-horizontal" action="{{ url('profile/'.$profile->username.'/follow') }}" method="post">
										{{ csrf_field() }}
										<button type="submit" class="btn btn-primary btn-block"><b>Follow</b></button>
									</form>
<?php
} else {
?>
									<form class="form-horizontal" action="{{ url('profile/'.$profile->username.'/unfollow') }}" method="post">
										{{ csrf_field() }}
										<button type="submit" class="btn btn-success btn-block followButton"><i class="fa fa-check"></i> <b>Following</b></button>
									</form>
<?php
}
?>
@endif


								</div><!-- /.box-body -->
							</div><!-- /.box -->

{{--
							<!-- About Me Box -->
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">About Me</h3>
								</div><!-- /.box-header -->
								<div class="box-body">

									<strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
									<p class="text-muted">
										B.S. in Computer Science from the University of Tennessee at Knoxville
									</p>

									<hr>

									<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
									<p class="text-muted">Malibu, California</p>

									<hr>

									<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
									<p>
										<span class="label label-danger">UI Design</span>
										<span class="label label-success">Coding</span>
										<span class="label label-info">Javascript</span>
										<span class="label label-warning">PHP</span>
										<span class="label label-primary">Node.js</span>
									</p>

									<hr>

									<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

								</div><!-- /.box-body -->
							</div><!-- /.box -->
--}}
						</div><!-- /.col -->
						<div class="col-md-9">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
{{--									<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>--}}
{{--									<li><a href="#timeline" data-toggle="tab">Timeline</a></li>--}}
									<li class="active"><a href="#followers" data-toggle="tab">Followers ({{count($followers)}})</a></li>
									<li><a href="#following" data-toggle="tab">Following ({{count($following)}})</a></li>
@if ($user->id == $profile->id && false)
									<li><a href="#settings" data-toggle="tab">Settings</a></li>
@endif
								</ul>
								<div class="tab-content">
{{--
									<div class="active tab-pane" id="activity">

										<!-- Post -->
										<div class="post">
											<div class="user-block">
												<img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
												<span class='username'>
													<a href="#">Jonathan Burke Jr.</a>
													<a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
												</span>
												<span class='description'>Shared publicly - 7:30 PM today</span>
											</div><!-- /.user-block -->
											<p>
												Lorem ipsum represents a long-held tradition for designers,
												typographers and the like. Some people hate it and argue for
												its demise, but others ignore the hate as they create awesome
												tools to help create filler text for everyone from bacon lovers
												to Charlie Sheen fans.
											</p>
											<ul class="list-inline">
												<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
												<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
												<li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
											</ul>

											<input class="form-control input-sm" type="text" placeholder="Type a comment">
										</div><!-- /.post -->

										<!-- Post -->
										<div class="post clearfix">
											<div class='user-block'>
												<img class='img-circle img-bordered-sm' src='../../dist/img/user7-128x128.jpg' alt='user image'>
												<span class='username'>
													<a href="#">Sarah Ross</a>
													<a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
												</span>
												<span class='description'>Sent you a message - 3 days ago</span>
											</div><!-- /.user-block -->
											<p>
												Lorem ipsum represents a long-held tradition for designers,
												typographers and the like. Some people hate it and argue for
												its demise, but others ignore the hate as they create awesome
												tools to help create filler text for everyone from bacon lovers
												to Charlie Sheen fans.
											</p>

											<form class='form-horizontal'>
												<div class='form-group margin-bottom-none'>
													<div class='col-sm-9'>
														<input class="form-control input-sm" placeholder="Response">
													</div>
													<div class='col-sm-3'>
														<button class='btn btn-danger pull-right btn-block btn-sm'>Send</button>
													</div>
												</div>
											</form>
										</div><!-- /.post -->

										<!-- Post -->
										<div class="post">
											<div class='user-block'>
												<img class='img-circle img-bordered-sm' src='../../dist/img/user6-128x128.jpg' alt='user image'>
												<span class='username'>
													<a href="#">Adam Jones</a>
													<a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
												</span>
												<span class='description'>Posted 5 photos - 5 days ago</span>
											</div><!-- /.user-block -->
											<div class='row margin-bottom'>
												<div class='col-sm-6'>
													<img class='img-responsive' src='../../dist/img/photo1.png' alt='Photo'>
												</div><!-- /.col -->
												<div class='col-sm-6'>
													<div class='row'>
														<div class='col-sm-6'>
															<img class='img-responsive' src='../../dist/img/photo2.png' alt='Photo'>
															<br>
															<img class='img-responsive' src='../../dist/img/photo3.jpg' alt='Photo'>
														</div><!-- /.col -->
														<div class='col-sm-6'>
															<img class='img-responsive' src='../../dist/img/photo4.jpg' alt='Photo'>
															<br>
															<img class='img-responsive' src='../../dist/img/photo1.png' alt='Photo'>
														</div><!-- /.col -->
													</div><!-- /.row -->
												</div><!-- /.col -->
											</div><!-- /.row -->

											<ul class="list-inline">
												<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
												<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
												<li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
											</ul>

											<input class="form-control input-sm" type="text" placeholder="Type a comment">
										</div><!-- /.post -->

									</div><!-- /.tab-pane -->
--}}

{{--
									<div class="tab-pane" id="timeline">
										<!-- The timeline -->
										<ul class="timeline timeline-inverse">
											<!-- timeline time label -->
											<li class="time-label">
												<span class="bg-red">
													10 Feb. 2014
												</span>
											</li>
											<!-- /.timeline-label -->
											<!-- timeline item -->
											<li>
												<i class="fa fa-envelope bg-blue"></i>
												<div class="timeline-item">
													<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
													<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
													<div class="timeline-body">
														Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
														weebly ning heekya handango imeem plugg dopplr jibjab, movity
														jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
														quora plaxo ideeli hulu weebly balihoo...
													</div>
													<div class="timeline-footer">
														<a class="btn btn-primary btn-xs">Read more</a>
														<a class="btn btn-danger btn-xs">Delete</a>
													</div>
												</div>
											</li>
											<!-- END timeline item -->
											<!-- timeline item -->
											<li>
												<i class="fa fa-user bg-aqua"></i>
												<div class="timeline-item">
													<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
													<h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
												</div>
											</li>
											<!-- END timeline item -->
											<!-- timeline item -->
											<li>
												<i class="fa fa-comments bg-yellow"></i>
												<div class="timeline-item">
													<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
													<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
													<div class="timeline-body">
														Take me to your leader!
														Switzerland is small and neutral!
														We are more like Germany, ambitious and misunderstood!
													</div>
													<div class="timeline-footer">
														<a class="btn btn-warning btn-flat btn-xs">View comment</a>
													</div>
												</div>
											</li>
											<!-- END timeline item -->
											<!-- timeline time label -->
											<li class="time-label">
												<span class="bg-green">
													3 Jan. 2014
												</span>
											</li>
											<!-- /.timeline-label -->
											<!-- timeline item -->
											<li>
												<i class="fa fa-camera bg-purple"></i>
												<div class="timeline-item">
													<span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
													<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
													<div class="timeline-body">
														<img src="http://placehold.it/150x100" alt="..." class="margin">
														<img src="http://placehold.it/150x100" alt="..." class="margin">
														<img src="http://placehold.it/150x100" alt="..." class="margin">
														<img src="http://placehold.it/150x100" alt="..." class="margin">
													</div>
												</div>
											</li>
											<!-- END timeline item -->
											<li>
												<i class="fa fa-clock-o bg-gray"></i>
											</li>
										</ul>
									</div><!-- /.tab-pane -->
--}}


									<div class="active tab-pane" id="followers">
										<div class="box-body no-padding">
@if(count($followers) == 0)
<?php if($user->id == $profile->id){ ?>
											You don't have followers.
<?php } else { ?>
											{{ $profile->full_name }} doesn't have followers.
<?php } ?>
@else
											<ul class="users-list clearfix">
@foreach($followers as $follower)
<?php
$follower_data = DB::table('users')
		->where('id', $follower->follower_id)
		->select('id', 'full_name', 'email', 'username')
		->first();
?>
												<li>
													<a href="{{ url('profile/'.$follower_data->username) }}">
														<img class="profile-user-img img-responsive img-circle" src="{{ asset('img/user'. $follower_data->id .'.jpg') }}" alt="{{ $follower_data->full_name }}">
													</a>
													<a class="users-list-name" href="{{ url('profile/'.$follower_data->username) }}">{{ $follower_data->full_name }}</a>
													<a href="{{ url('profile/'.$follower_data->username) }}">
														<span class="users-list-date">{{ $follower_data->username }}</span>
													</a>
												</li>
@endforeach
											</ul>
											<!-- /.users-list -->
@endif
										</div>
										<!-- /.box-body -->
									</div><!-- /.tab-pane -->

									<div class="tab-pane" id="following">
										<div class="box-body no-padding">
@if(count($following) == 0)
<?php if($user->id == $profile->id){ ?>
											You don't follow anyone.
<?php } else { ?>
											{{ $profile->full_name }} doesn't follow anyone.
<?php } ?>
@else
											<ul class="users-list clearfix">
@foreach($following as $follow)
<?php
$follow_data = DB::table('users')
		->where('id', $follow->user_id)
		->select('id', 'full_name', 'email', 'username')
		->first();
?>
												<li>
													<a href="{{ url('profile/'.$follow_data->username) }}">
														<img class="profile-user-img img-responsive img-circle" src="{{ asset('img/user'. $follow_data->id .'.jpg') }}" alt="{{ $follow_data->full_name }}">
													</a>
													<a class="users-list-name" href="{{ url('profile/'.$follow_data->username) }}">{{ $follow_data->full_name }}</a>
													<a href="{{ url('profile/'.$follow_data->username) }}">
														<span class="users-list-date">{{ $follow_data->username }}</span>
													</a>
												</li>
@endforeach
											</ul>
											<!-- /.users-list -->
@endif
										</div>
										<!-- /.box-body -->
									</div><!-- /.tab-pane -->

@if ($user->id == $profile->id && false)
									<div class="tab-pane" id="settings">
										<form class="form-horizontal" action="{{ url('profile_settings') }}" method="post">
											{{ csrf_field() }}
{{--
											<div class="form-group">
												<label for="inputEmail" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-10">
													<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" autofocus="autofocus">
												</div>
											</div>
--}}
											<!--<div class="form-group">
												<label for="inputFirstName" class="col-sm-2 control-label">First Name</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="First Name" value="{{ $user->first_name }}" autofocus="autofocus">
												</div>
											</div>
											<div class="form-group">
												<label for="inputLastName" class="col-sm-2 control-label">Last Name</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Last Name" value="{{ $user->last_name }}">
												</div>
											</div>-->
											<div class="form-group">
												<label for="inputFirstName" class="col-sm-2 control-label">Full Name</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="FullName" name="inputFullName" placeholder="Full name" value="{{ $user->full_name }}" autofocus="autofocus">
												</div>
											</div>
											<div class="form-group">
												<label for="inputUserName" class="col-sm-2 control-label">Username</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputUserName" name="inputUserName" placeholder="Username" value="{{ $user->username }}">
												</div>
											</div>
{{--
											<div class="form-group">
												<label for="inputExperience" class="col-sm-2 control-label">Experience</label>
												<div class="col-sm-10">
													<textarea class="form-control" id="inputExperience" name="inputExperience" placeholder="Experience"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="inputSkills" class="col-sm-2 control-label">Skills</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputSkills" name="inputSkills" placeholder="Skills">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-10">
													<div class="checkbox">
														<label>
															<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
														</label>
													</div>
												</div>
											</div>
--}}
											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-10">
													<button type="submit" class="btn btn-danger">Submit</button>
												</div>
											</div>
										</form>
									</div><!-- /.tab-pane -->
@endif
								</div><!-- /.tab-content -->
							</div><!-- /.nav-tabs-custom -->
						</div><!-- /.col -->
					</div><!-- /.row -->

				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
@endsection
@section('scripts')
		@include('app.scripts_page_')
		<script src="{{ asset('js/follow.js') }}"></script>
@endsection
