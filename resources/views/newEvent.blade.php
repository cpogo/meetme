@extends('app.layout')
@section('title', 'New Event')
@section('stylesheet_pages')
		@include('app.styles_pages')
@endsection
@section('main')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						New Event
						<small>Control panel</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li class="active">New Event</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-md-3">
							<div class="box box-primary">
								<div class="box-header">
									<h3 class="box-title">Create Event</h3>
								</div>
								<div class="box-body">
									<form action="createEvent" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<!-- Event Title -->
										<div class="form-group">
											<label>Title</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-tasks"></i>
												</div>
												<input name="event_title" type="text" class="form-control" placeholder="Event Title">
											</div>
										</div>
										<!-- Event Objective -->
										<div class="form-group">
											<label>Objective</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-hand-o-right"></i>
												</div>
												<input name="event_objective" type="text" class="form-control" placeholder="Event objective">
											</div>
										</div>
										<!-- Event Description -->
										<div class="form-group">
											<label>Description</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-align-justify"></i>
												</div>
												<textarea name="event_description" class="form-control" rows="3" placeholder="Description ..."></textarea>
											</div>
										</div>
										<!-- Event Date -->
										<div class="form-group">
											<label>Date</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input name="event_date" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="">
											</div>
										</div>
										<!-- Event Time -->
										{{--<div class="bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><span class="bootstrap-timepicker-hour">02</span></td> <td class="separator">:</td><td><span class="bootstrap-timepicker-minute">15</span></td> <td class="separator">&nbsp;</td><td><span class="bootstrap-timepicker-meridian">PM</span></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div>--}}
										{{--<div class="form-group">--}}
										{{--<label>Time</label>--}}
										{{--<div class="input-group">--}}
										{{--<div class="input-group-addon">--}}
										{{--<i class="fa fa-clock-o"></i>--}}
										{{--</div>--}}
										{{--<input type="text" class="form-control timepicker">--}}
										{{--</div><!-- /.input group -->--}}
										{{--</div><!-- /.form group -->--}}
										{{--</div>--}}
										<!-- Event Suggestions -->
										<div class="form-group">
											<label>Suggestions</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-commenting-o"></i>
												</div>
												<textarea name="event_suggestion" class="form-control" rows="3" placeholder="Event Suggestions"></textarea>
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-btn">
													<button type="submit" class="btn btn-primary">Create</button>
												</div><!-- /btn-group -->
											</div>
										</div>
									</form>

								</div><!-- /.box-body -->
							</div>
						</div><!-- /.col -->
						<div class="col-md-9">
							<div class="box box-primary">
								<div class="box-body no-padding">
									<!-- THE CALENDAR -->
									<div id="calendar"></div>
								</div><!-- /.box-body -->
							</div><!-- /. box -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
@endsection
@section('scripts')
		@include('app.scripts_pages')
@endsection
