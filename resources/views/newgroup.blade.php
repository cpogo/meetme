@extends('app.layout')
@section('title', 'New Group')
@section('stylesheet_pages')
		@include('app.styles_pages')
@endsection
@section('main')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						New Group
						<small>Configure your new group</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li class="active">New Group</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-md-3">
							<div class="box box-primary">
								<div class="box-header">
									<h3 class="box-title">Create Group</h3>
								</div>
								<div class="box-body">
									<form action="createGroup" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<!-- Event Title -->
										<div class="form-group">
											<label>Group Name</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-tasks"></i>
												</div>
												<input name="nombre_grupo" type="text" class="form-control" placeholder="Your group's name">
											</div>
										</div>
										<!-- Event Objective -->
										<!--<div class="form-group">
										  <label>Objective</label>
										  <div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-hand-o-right"></i>
											</div>
											<input name="event_objective" type="text" class="form-control" placeholder="Event objective">
										  </div>
										</div>-->
										<!-- Event Description -->
										<div class="form-group">
											<label>Description</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-align-justify"></i>
												</div>
												<textarea name="grupo_descripcion" class="form-control" rows="3" placeholder="Short descrption of your group ..."></textarea>
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
										<!--<div class="form-group">
										  <label>Suggestions</label>
										  <div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-commenting-o"></i>
											</div>
											<textarea name="event_suggestion" class="form-control" rows="3" placeholder="Event Suggestions"></textarea>
										  </div>
										</div>-->

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-btn">
													<button type="submit" class="btn btn-primary">Create Group</button>
												</div><!-- /btn-group -->
											</div>
										</div>
									</form>

								</div><!-- /.box-body -->
							</div>
						</div><!-- /.col -->
						<div >
							<h3 align="center">Your groups are:</h3><br/>

								<table align="center">
									@forelse ($grupos as $grupo)
									<tr>
										<td><a href="mygroup">{{ $grupo->name }}&nbsp;&nbsp;</a></td>
										<td>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit </button></td>
										<td>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i> Delete </button></td>
									</tr>
										<tr>
											<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
										</tr>

									@empty
										<h4 align="center">You do not have groups created yet :(</h4>
									@endforelse
								</table>
						</div>
					</div>
				</section>
			</div>
@endsection
@section('scripts')
		@include('app.scripts_pages')
@endsection
