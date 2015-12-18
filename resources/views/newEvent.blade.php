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
		<script>
$(function () {
	var Json = '[';
	var datos = "{{ json_encode($datos) }}";
	var datosJson = JSON.parse(datos.replace(/&quot;/g,'"'));
	for (var i = 0; i < datosJson.length; i++) {
			Json = Json + '{"title":"'+ datosJson[i].eventName +'",'+
			                '"start":"",'+
											'"end":"",'+
											'"backgroundColor":"#f56954",'+
											'"borderColor":"#00a65a"}';

			if(i < datosJson.length-1){ Json = Json + ','; }
	}
	Json = Json + ']';
	Json = JSON.parse(Json);
	for (var i = 0; i < datosJson.length; i++) {
		Json[i].start = new Date(datosJson[i].startEvent.anio,
													datosJson[i].startEvent.mes-1,
													datosJson[i].startEvent.dia,
													datosJson[i].startEvent.hora,
													datosJson[i].startEvent.minuto,
													datosJson[i].startEvent.segundo );

		Json[i].end = new Date(datosJson[i].endEvent.anio,
					datosJson[i].endEvent.mes-1,
					datosJson[i].endEvent.dia,
					datosJson[i].endEvent.hora,
					datosJson[i].endEvent.minuto,
					datosJson[i].endEvent.segundo );
	}
	/* initialize the calendar
	 -----------------------------------------------------------------*/
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		buttonText: {
			today: 'today',
			month: 'month',
			week: 'week',
			day: 'day'
		},
		//Random default events
		events: Json,
		editable: false,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function (date, allDay) { // this function is called when something is dropped

			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');

			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);

			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			copiedEventObject.backgroundColor = $(this).css("background-color");
			copiedEventObject.borderColor = $(this).css("border-color");

			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}

		}
	});

	/* ADDING EVENTS */
	var currColor = "#3c8dbc"; //Red by default
	//Color chooser button
	var colorChooser = $("#color-chooser-btn");
	$("#color-chooser > li > a").click(function (e) {
		e.preventDefault();
		//Save color
		currColor = $(this).css("color");
		//Add color effect to button
		$('#add-new-event').css({"background-color": currColor, "border-color": currColor});
	});
	$("#add-new-event").click(function (e) {
		e.preventDefault();
		//Get value and make sure it is not null
		var val = $("#new-event").val();
		if (val.length == 0) {
			return;
		}

		//Create events
		var event = $("<div />");
		event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
		event.html(val);
		$('#external-events').prepend(event);

		//Add draggable funtionality
		ini_events(event);

		//Remove event from text input
		$("#new-event").val("");
	});
});

$(function () {
	//Initialize Select2 Elements
	$(".select2").select2();

	//Datemask dd/mm/yyyy
	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	//Datemask2 mm/dd/yyyy
	$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
	//Money Euro
	$("[data-mask]").inputmask();

	//Date range picker
	$('#reservation').daterangepicker();
	//Date range picker with time picker
	$('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
	//Date range as a button
	$('#daterange-btn').daterangepicker(
			{
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				startDate: moment().subtract(29, 'days'),
				endDate: moment()
			},
			function (start, end) {
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			}
	);

	//iCheck for checkbox and radio inputs
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue'
	});
	//Red color scheme for iCheck
	$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		checkboxClass: 'icheckbox_minimal-red',
		radioClass: 'iradio_minimal-red'
	});
	//Flat red color scheme for iCheck
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

	//Colorpicker
	$(".my-colorpicker1").colorpicker();
	//color picker with addon
	$(".my-colorpicker2").colorpicker();

	//Timepicker
	$(".timepicker").timepicker({
		showInputs: false
	});
});
		</script>
@endsection
