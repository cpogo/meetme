@extends('app.layout')
@section('title', 'Dashboard')
@section('stylesheet_dashboard')        
		<!-- iCheck -->
		<link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
			<!-- Morris chart -->
		<link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
			<!-- jvectormap -->
		<link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
			<!-- Date Picker -->
		<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
			<!-- Daterange picker -->
		<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
			<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
		<!-- Bootstrap datetime Picker -->
		<link rel="stylesheet" href="{{ asset('plugins/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" >
@endsection
@section('main')
<script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="https://apis.google.com/js/client:platform.js" async defer></script>
        <script src="https://apis.google.com/js/client.js?onload=OnLoadCallback"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script>
	$(function() {
	$( "#datepicker" ).datepicker();
	});
	$(function() {
	$( "#eventDateI" ).datepicker();
	});
	$(function() {
	$( "#eventDateF" ).datepicker();
	});
</script>
<style type="text/css">
	.pac-container {
         z-index: 2000 !important;
    }
</style>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Dashboard
						<small>Control panel</small>
					</h1>
					<ol class="breadcrumb">
						<li class="active"><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">

					<!-- Small boxes (Stat box) -->
					<div class="row">						
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3><?php
echo DB::table('followers')->where('user_id', $user->id)->count();
?></h3>
									<p>Followers</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
{{--
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
--}}
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
									<h3><?php
echo DB::table('followers')->where('follower_id', $user->id)->count();
?></h3>
									<p>Following</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-stalker"></i>
								</div>
{{--
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
--}}
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-yellow">
								<div class="inner">
									<h3><?php
echo DB::table('group_user')->where('user_id', $user->id)->count()
?></h3>
									<p>Groups</p>
								</div>
								<div class="icon">
									<i class="ion ion-ios-people"></i>
								</div>
{{--
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
--}}
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div id="meetingHeader" class="inner">
									<h3></h3>
									<p>Meetings</p>
								</div>
								<div class="icon">
									<i class="ion ion-ios-calendar-outline"></i>
								</div>
{{--
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
--}}
							</div>
						</div><!-- ./col -->
					</div><!-- /.row -->

					<!-- Main row -->
					<div class="row">
						<!-- Left col -->
						<section class="col-lg-7 connectedSortable">
{{--
							<!-- Custom tabs (Charts with tabs)-->
							<div class="nav-tabs-custom">
								<!-- Tabs within a box -->
								<ul class="nav nav-tabs pull-right">
									<li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
									<li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
									<li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
								</ul>
								<div class="tab-content no-padding">
									<!-- Morris chart - Sales -->
									<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
									<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
								</div>
							</div><!-- /.nav-tabs-custom -->

							<!-- Chat box -->
							<div class="box box-success">
								<div class="box-header">
									<i class="fa fa-comments-o"></i>
									<h3 class="box-title">Chat</h3>
									<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
										<div class="btn-group" data-toggle="btn-toggle" >
											<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
											<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
										</div>
									</div>
								</div>
								<div class="box-body chat" id="chat-box">
									<!-- chat item -->
									<div class="item">
										<img src="{{ asset('images/user4-128x128.jpg') }}" alt="user image" class="online">
										<p class="message">
											<a href="#" class="name">
												<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
												Mike Doe
											</a>
											I would like to meet you to discuss the latest news about
											the arrival of the new theme. They say it is going to be one the
											best themes on the market
										</p>
										<div class="attachment">
											<h4>Attachments:</h4>
											<p class="filename">
												Theme-thumbnail-image.jpg
											</p>
											<div class="pull-right">
												<button class="btn btn-primary btn-sm btn-flat">Open</button>
											</div>
										</div><!-- /.attachment -->
									</div><!-- /.item -->
									<!-- chat item -->
									<div class="item">
										<img src="{{ asset('images/user3-128x128.jpg') }}" alt="user image" class="offline">
										<p class="message">
											<a href="#" class="name">
												<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
												{{$user->first_name}} {{$user->last_name}}
											</a>
											I would like to meet you to discuss the latest news about
											the arrival of the new theme. They say it is going to be one the
											best themes on the market
										</p>
									</div><!-- /.item -->
									<!-- chat item -->
									<div class="item">
										<img src="{{ asset('images/user2-160x160.jpg') }}" alt="user image" class="offline">
										<p class="message">
											<a href="#" class="name">
												<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
												Susan Doe
											</a>
											I would like to meet you to discuss the latest news about
											the arrival of the new theme. They say it is going to be one the
											best themes on the market
										</p>
									</div><!-- /.item -->
								</div><!-- /.chat -->
								<div class="box-footer">
									<div class="input-group">
										<input class="form-control" placeholder="Type message...">
										<div class="input-group-btn">
											<button class="btn btn-success"><i class="fa fa-plus"></i></button>
										</div>
									</div>
								</div>
							</div><!-- /.box (chat box) -->
--}}
							<!-- TO DO List -->
							<div class="box box-primary">
                        <div class="box-header">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title">Events of the month</h3>
                            <div class="box-tools pull-right">
                                <ul class="pagination pagination-sm inline">
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <ul id="listaEventos" class="todo-list">
                            <!--
                                <li>
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <input type="checkbox" value="" name="">
                                    <span class="text">Design a nice theme</span>
                                    <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                -->
                            </ul>
                        </div><!-- /.box-body -->                        
                    </div>
{{--
							<!-- quick email widget -->
							<div class="box box-info">
								<div class="box-header">
									<i class="fa fa-envelope"></i>
									<h3 class="box-title">Quick Email</h3>
									<!-- tools box -->
									<div class="pull-right box-tools">
										<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
									</div><!-- /. tools -->
								</div>
								<div class="box-body">
									<form action="#" method="post">
										<div class="form-group">
											<input type="email" class="form-control" name="emailto" placeholder="Email to:">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="subject" placeholder="Subject">
										</div>
										<div>
											<textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
										</div>
									</form>
								</div>
								<div class="box-footer clearfix">
									<button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
								</div>
							</div>
--}}
						</section><!-- /.Left col -->
						<!-- right col (We are only adding the ID to make the widgets sortable)-->
						<section class="col-lg-5 connectedSortable">
{{--
							<!-- Map box -->
							<div class="box box-solid bg-light-blue-gradient">
								<div class="box-header">
									<!-- tools box -->
									<div class="pull-right box-tools">
										<button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
										<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
									</div><!-- /. tools -->

									<i class="fa fa-map-marker"></i>
									<h3 class="box-title">
										Visitors
									</h3>
								</div>
								<div class="box-body">
									<div id="world-map" style="height: 250px; width: 100%;"></div>
								</div><!-- /.box-body-->
								<div class="box-footer no-border">
									<div class="row">
										<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
											<div id="sparkline-1"></div>
											<div class="knob-label">Visitors</div>
										</div><!-- ./col -->
										<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
											<div id="sparkline-2"></div>
											<div class="knob-label">Online</div>
										</div><!-- ./col -->
										<div class="col-xs-4 text-center">
											<div id="sparkline-3"></div>
											<div class="knob-label">Exists</div>
										</div><!-- ./col -->
									</div><!-- /.row -->
								</div>
							</div>
							<!-- /.box -->
							<!-- solid sales graph -->
							<div class="box box-solid bg-teal-gradient">
								<div class="box-header">
									<i class="fa fa-th"></i>
									<h3 class="box-title">Sales Graph</h3>
									<div class="box-tools pull-right">
										<button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
									</div>
								</div>
								<div class="box-body border-radius-none">
									<div class="chart" id="line-chart" style="height: 250px;"></div>
								</div><!-- /.box-body -->
								<div class="box-footer no-border">
									<div class="row">
										<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
											<input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
											<div class="knob-label">Mail-Orders</div>
										</div><!-- ./col -->
										<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
											<input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
											<div class="knob-label">Online</div>
										</div><!-- ./col -->
										<div class="col-xs-4 text-center">
											<input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
											<div class="knob-label">In-Store</div>
										</div><!-- ./col -->
									</div><!-- /.row -->
								</div><!-- /.box-footer -->
							</div><!-- /.box -->
--}}
							<!-- Calendar -->
							<div class="box box-solid bg-green-gradient">
								<div class="box-header">
									<i class="fa fa-calendar"></i>
									<h3 class="box-title">Calendar</h3>
									<!-- tools box -->
									<div class="pull-right box-tools">
										<!-- button with a dropdown -->
										<div class="btn-group">
											<button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
											<ul class="dropdown-menu pull-right" role="menu">
												<li><a href="#">Add new event</a></li>
												<li><a href="#">Clear events</a></li>
												<li class="divider"></li>
												<li><a href="#">View calendar</a></li>
											</ul>
										</div>
										<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
									</div><!-- /. tools -->
								</div><!-- /.box-header -->
								<div class="box-body no-padding">
									<!--The calendar -->
									<div id="calendar" style="width: 100%"></div>
								</div><!-- /.box-body -->								
							</div><!-- /.box -->

						</section><!-- right col -->

						<div class="col-md-2 col-sm-2 col-xs-12">
							<button type="button" id="authorize-button" style="visibility: hidden" class="btn btn-primary">Authorize</button>
						</div>

					</div><!-- /.row (main row) -->

				</section><!-- /.content -->

				<div class='modal fade' id="modalEditEvent" tabindex='0' role='dialog' aria-labelledby='myLargeModalLabel'>
					<div class='modal-dialog modal-lg'>
						<div class='modal-content'>
							<div class='modal-header' style="background-color:dimgrey">
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<h4 class='modal-title' id='gridSystemModalLabel' style="font-family:'Kaushan Script', cursive;color:white;">Edit event</h4>
							</div>
							<div class='modal-body'>
								<form id="editarEvento" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"><div class="form-group">
                                    <label>Title</label>
                                    <div class="input-group">
                                         <div class="input-group-addon">
                                                <i class="fa fa-tasks"></i>
                                         </div>
                                         <input id="eventTittle" name="event_title" type="text" class="form-control" placeholder="Event Title" required>
                                    </div>
                                    </div>
                                <!-- Event Description -->
                                     <div class="form-group">
                                     <label>Description</label>
                                     <div class="input-group">
                                          <div class="input-group-addon">
                                               <i class="fa fa-align-justify"></i>
                                          </div>
                                          <textarea id="eventDescription" name="event_description" class="form-control" rows="3" placeholder="Description ..." required></textarea>
                                     </div>
                                     </div>
                                <!--Location-->
                                    <div class="form-group">
                                    <label>Location</label>                                    
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                                <i class="fa fa-tasks"></i>
                                         </div>
                                        <input name="location" id="autocomplete" class="form-control" placeholder="Enter your address" type="text" required></input>
                                    </div>                                   
                                    </div>
                                <!--Groups by combo box-->
                                    <!--<div class="form-group">
                                    <label>Invite users</label>
                                    <div class="input-group">
                                    	<div class="input-group-addon">
                                            <i class="fa fa-search"></i>
                                        </div>
				                        <input type="text" name="agregarMiembro" id="addMemberEvent" class="form-control" placeholder="Invite an user..." required>	                   
				                    </div>
										<div class="displaygroupEvent"></div>                 
								    </div>-->
								    <!--Groups by combo box-->
                                    <div class="form-group">
	                                    <label>Groups</label>
	                                    <select id="gruposs" name="combo" class="form-control">                                
	                                        @if ( count( $grupos[ 0 ] )  == 0 && count( $grupos[ 1 ] ) == 0 )
	                                            <option value="NG">No groups :-(</option>
	                                        @endif
	                                        @if ( count( $grupos[ 0 ] ) > 0 )
	                                            <option value="CG">-Choose one group-</option>
	                                            @foreach ( $grupos[ 0 ] as $grupo )
	                                               <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
	                                            @endforeach
	                                            
	                                        @endif
	                                        @if ( count( $grupos[ 1 ] ) > 0 )
	                                            <option value="CG">-Choose one group-</option>
	                                            @foreach ( $grupos[ 1 ] as $grupo )
	                                               <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
	                                            @endforeach
	                                        @endif                                        
	                                    </select>

                                    </div>
								    <div class="form-group">
								    	<ul class="list-users list-group">
								    		
								    	</ul>
								    </div>
                                <!-- Event Date -->
                                    <div class="form-group">
                                    <label>Start Date</label>
                                    <div class='input-group date' id='datetimepickerinicio'>
                                         <input data-format="dd-MM-yyyy hh:mm:ss" type='text' name="fechaInicio" id="fechaInicio" class="form-control" required/>
                                    <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                    </div>
                                <!-- Event Date -->
                                    <div class="form-group">
                                    <label>End Date</label>
                                    <div class='input-group date' id='datetimepickerfin'>
                                            <input data-format="dd-MM-yyyy hh:mm:ss" type='text' name="fechaFin" id="fechaFin" class="form-control" required/>
                                             <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="btnEditEvents" class="btn btn-primary" >Edit Event</button>
                                    </div>
								</form>
							</div>							
						</div>
					</div>
		        </div>
				<!-- Ventana Flotante -->
				{{--<div id="flotante">
					<h1>Ventana flotante</h1>
					<h3><a onClick="flotante(2)">Cerrar ventana</a></h3>


				</div>  --}}
				{{--  <div id="contenedor" style="display:none"></div>
				<div id="fondo"></div>--}}


			</div><!-- /.content-wrapper -->
@endsection
@section('scripts') 
	@include('app.scripts_dashboard')
	<script src="{{ asset('js/calendarDashboard.js') }}"></script>
	<script src="https://apis.google.com/js/client.js?onload=handleClientLoad" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJpcHQH2zFckykgY9BTaiaMZ9nJSKnzbI&amp;signed_in=true&amp;libraries=places&amp;callback=initAutocomplete"
        async defer></script>
    <script src="{{ asset('js/locationEvent.js') }}"></script>
@endsection
