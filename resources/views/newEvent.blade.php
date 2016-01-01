@extends('app.layout')
@section('title', 'New Event')
@section('stylesheet_pages')
		@include('app.styles_pages')
@endsection
@section('main')
<script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="https://apis.google.com/js/client:platform.js" async defer></script>
        <script src="https://apis.google.com/js/client.js?onload=OnLoadCallback"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
                                        <label>Título</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                            <input id="eventTittle" name="event_title" type="text" class="form-control" placeholder="Event Title">
                                        </div>
                                    </div>
                                    <!-- Event Objective -->
                                    <div class="form-group">
                                        <label>Objetivo</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-hand-o-right"></i>
                                            </div>
                                            <input id="eventObjective" name="event_objective" type="text" class="form-control" placeholder="Event objective">
                                        </div>
                                    </div>
                                    <!-- Event Description -->
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-align-justify"></i>
                                            </div>
                                            <textarea id="eventDescription" name="event_description" class="form-control" rows="3" placeholder="Description ..."></textarea>
                                        </div>
                                    </div>
                                    <!-- Event Date -->
                                    <div class="form-group">
                                        <label>Fecha de Inicio</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input id="eventDateI" name="event_date" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="">
                                        </div>
                                    </div>
                                    <!-- Event Date -->
                                    <div class="form-group">
                                        <label>Fecha Final</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input id="eventDateF" name="event_date" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="">
                                        </div>
                                    </div>
                                    <!-- Event Time -->
                                    <div class="bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><span class="bootstrap-timepicker-hour">02</span></td> <td class="separator">:</td><td><span class="bootstrap-timepicker-minute">15</span></td> <td class="separator">&nbsp;</td><td><span class="bootstrap-timepicker-meridian">PM</span></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div>
                                        <div class="form-group">
                                            <label>Hora de Inicio</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <input id="eventTimeI" type="text" class="form-control timepicker">
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                                    <!-- Event Time -->
                                    <div class="bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><span class="bootstrap-timepicker-hour">02</span></td> <td class="separator">:</td><td><span class="bootstrap-timepicker-minute">15</span></td> <td class="separator">&nbsp;</td><td><span class="bootstrap-timepicker-meridian">PM</span></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div>
                                        <div class="form-group">
                                            <label>Hora Final</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <input id="eventTimeF" type="text" class="form-control timepicker">
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                                    <!-- Event Suggestions -->
                                    <div class="form-group">
                                        <label>Sugerencias</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-commenting-o"></i>
                                            </div>
                                            <textarea id="eventSuggestion" name="event_suggestion" class="form-control" rows="3" placeholder="Event Suggestions"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">Crear</button>
                                            </div><!-- /btn-group -->
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
										<button id="authorize-button" style="visibility: hidden" class="btn btn-primary">Authorize</button>
									</div>
                                </form>

								</div><!-- /.box-body -->
							</div>
						</div><!-- /.col -->


						<!-- CALENDARIO RESPONSIVE -->

						<div class="col-md-9">
							<div class="box box-primary">
								<div class="box-body no-padding">
									<!-- THE CALENDAR -->
									<div id="calendar"></div>
								</div><!-- /.box-body -->
							</div><!-- /. box -->
						</div><!-- /.col -->


					</div><!-- /.row -->
<pre id="output"></pre>

			<div class="container" style="float: left; width:300px">
            <div class="row" style="float: left">
                
                <!-- .col -->
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="panel panel-danger" id="result-panel">
                        <div class="panel-heading">
                            <h1>
                                My Calendar</h1>
                            <h3 class="panel-title" id="result-title">
                                Application Not Authorized</h3>
                            &nbsp;
                            <p>
                                Insert Event into Public Calendar&hellip;</p>
                        </div>
                    </div>
                    <!--  <input id="txtEventDetails" type="text" /> -->
                    <button id="btnCreateEvents" class="btn btn-primary" onclick="makeApiCall();">
                        Create Events</button>
                    <button id="btnDeleteEvents" class="btn btn-primary" onclick="deleteEvent();">
                        Delete Events</button>
                    <div id="event-response">
                    </div>
                    <div id="divifm">

                        <iframe id="ifmCalendar" src="https://calendar.google.com/calendar/embed?src=marcoxavibsc%40gmail.com&ctz=America/Guayaquil" style="border: 0" width="800" height="600" frameborder="0" scrolling="no">
                        </iframe>
            
                    </div>
                    <!--
                    <div id="divifm">
                        <iframe id="ifmCalendar" src="https://calendar.google.com/calendar/embed?src=mmendozaquelal%40gmail.com&ctz=America/Guayaquil" style="border: 0" width="800" height="600" frameborder="0" scrolling="no">
                        </iframe>
                    </div>
                    -->

                    
                </div>
                

            </div>
        </div>



				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			
@endsection

@section('scripts')
		@include('app.scripts_pages')
        <script type="text/javascript">
            var now = new Date();
            today = now.toISOString();

            var twoHoursLater = new Date(now.getTime() + (2 * 1000 * 60 * 60));
            twoHoursLater = twoHoursLater.toISOString();
            var resource;
            var eventos = [];
            
            var apiKey = 'AIzaSyBfJKuCHTCGJWhGjsn6Lvtr0856WJVKU4o';
            var CLIENT_ID = '952399997521-fv95fniurkli0gb3ldahffpfuje34i35.apps.googleusercontent.com';

            var SCOPES = ["https://www.googleapis.com/auth/calendar"];


            function handleClientLoad() {
                gapi.client.setApiKey(apiKey);
                window.setTimeout(checkAuth, 1);
            }

            

            /**
	       * Check if current user has authorized this application.
	       */
			function checkAuth() {
                gapi.auth.authorize(
                    {
                        'client_id': CLIENT_ID,
                        'scope': SCOPES.join(' '),
                        'immediate': true
                    }, handleAuthResult);
            }

            // show/hide the 'authorize' button, depending on application state
            function handleAuthResult(authResult) {
                var authorizeButton = document.getElementById('authorize-button');
                var eventButton = document.getElementById('btnCreateEvents');
                var resultPanel = document.getElementById('result-panel');
                var resultTitle = document.getElementById('result-title');

                if (authResult && !authResult.error) {
                    authorizeButton.style.visibility = 'hidden'; 		// if authorized, hide button
                    resultPanel.className = resultPanel.className.replace(/(?:^|\s)panel-danger(?!\S)/g, '')	// remove red class
                    resultPanel.className += ' panel-success'; 			// add green class
                    resultTitle.innerHTML = 'Application Authorized'		// display 'authorized' text
                    eventButton.style.visibility = 'visible';
                    $("#txtEventDetails").attr("visibility", "visible");
                    //alert("aqui estoy");
                    loadCalendarApi();
                } else {													// otherwise, show button
                    authorizeButton.style.visibility = 'visible';
                    $("#txtEventDetails").attr("visibility", "hidden");
                    eventButton.style.visibility = 'hidden';
                    resultPanel.className += ' panel-danger'; 			// make panel red
                    authorizeButton.onclick = handleAuthClick; 			// setup function to handle button click
                }
            }

            function loadCalendarApi() {
                gapi.client.load('calendar', 'v3', listUpcomingEvents);
                
            }

            function listUpcomingEvents() {
                var request = gapi.client.calendar.events.list({
                    'calendarId': 'primary',
                    //'timeMin': (new Date()).toISOString(),
                    'showDeleted': false,
                    'singleEvents': true,
                    //'maxResults': 10,
                    'orderBy': 'startTime'
                });
                request.execute(function(resp) {
                    var events = resp.items;
                    eventos = resp.items;
                    appendPre('Upcoming events:');

                    if (events.length > 0) {
                        for (i = 0; i < events.length; i++) {
                            var event = events[i];
                            var when = event.start.dateTime;
                            if (!when) {
                                when = event.start.date;
                            }
                            appendPre(event.summary + ' (' + when + ')')
                        }
                    } else {
                        appendPre('No upcoming events found.');
                    }

                    parsearDatos();
                	cargarCalendario();
                });

                
            }

            // function triggered when user authorizes app
            function handleAuthClick(event) {
                gapi.auth.authorize(
                    {
                        'client_id': CLIENT_ID,
                        'scope': SCOPES,
                        'immediate': false
                    }, handleAuthResult);
                return false;
            }

            function refreshICalendarframe() {
                var iframe = document.getElementById('divifm')
                iframe.innerHTML = iframe.innerHTML;
            }
            
            
            function llenarResource(){
                var tituloE = document.getElementById("eventTittle").value;
                var objetiveE = document.getElementById("eventObjective").value;
                var descriptionE = document.getElementById("eventDescription").value;
                var dateEI = document.getElementById("eventDateI").value;
                var dateEF = document.getElementById("eventDateF").value;
                var timeEI = document.getElementById("eventTimeI").value;
                var timeEF = document.getElementById("eventTimeF").value;
                var suggestionE = document.getElementById("eventSuggestion").value;
				var diaI = dateEI.substring(3, 5);
				var diaF = dateEF.substring(3, 5);
				var mesI = dateEI.substring(0, 2);
				var mesF = dateEF.substring(0, 2);
				var anioI = dateEI.substring(6);
				var anioF = dateEF.substring(6);

                
                resource = {
                    "summary": tituloE,
                    "start": {
                        "dateTime": anioI+"-"+mesI+"-"+diaI+"T"+"09:00:00-07:00"   //"2015-12-20T09:00:00-07:00"
                    },
                    "end": {
                        "dateTime": anioF+"-"+mesF+"-"+diaF+"T"+"09:00:00-07:00" //"2015-12-26T17:00:00-10:00"
                    },
                    "description":descriptionE,
                    "location":"EC",
                    "attendees":[
                        {
                            "email":"mmendozaquelal@gmail.com",
                            "displayName":"Marco",
                            "organizer":true,
                            "self":false,
                            "resource":false,
                            "optional":false,
                            "responseStatus":"needsAction",
                            "comment":"This is event first",
                            "additionalGuests":3
                        },
                        {
                            "email":"jaalrome@gmail.com",
                            "displayName":"Jairo",
                            "organizer":true,
                            "self":false,
                            "resource":false,
                            "optional":false,
                            "responseStatus":"needsAction",
                            "comment":"This is event first",
                            "additionalGuests":3
                        }
                    ],
                };
            }

            
            
            // function load the calendar api and make the api call
            function makeApiCall() {
                var eventResponse = document.getElementById('event-response');
                
                llenarResource();

                gapi.client.load('calendar', 'v3', function () {					// load the calendar api (version 3)
                    var request = gapi.client.calendar.events.insert
                    ({
                        'calendarId': 'primary', // calendar ID
                        "resource": resource							// pass event details with api call
                    });

                    // handle the response from our api call
                    request.execute(function (resp) {
                        if (resp.status == 'confirmed') {
                            eventResponse.innerHTML = "Event created successfully. View it <a href='" + resp.htmlLink + "'>online here</a>.";
                            eventResponse.className += ' panel-success';
                            refreshICalendarframe();
                        } else {
                            document.getElementById('event-response').innerHTML = "There was a problem. Reload page and try again.";
                            eventResponse.className += ' panel-danger';
                        }
                    });
                });
            }

            function appendPre(message) {
                var pre = document.getElementById('output');
                var textContent = document.createTextNode(message + '\n');
                pre.appendChild(textContent);
            }
            
            // FUNCTION TO DELETE EVENT
            function deleteEvent() {
                gapi.client.load('calendar', 'v3', function() {
                    var request = gapi.client.calendar.events.delete({
                        'calendarId': 'primary',
                        'eventId': eventos[0].id
                    });
                    request.execute(function(resp) {
                        if (resp.status == 'confirmed') {
                            alert("Event was successfully removed from the calendar!");
                        }
                        else{
                            alert('An error occurred, please try again later.')
                        }
                    });
                });
   			}
        
<!-- CALENDARIO RESPONSIVE -->

function parsearDatos() {
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
}

function cargarCalendario() {
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
}
		</script>

		<script src="https://apis.google.com/js/client.js?onload=handleClientLoad" type="text/javascript"></script>
@endsection
