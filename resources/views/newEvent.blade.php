@extends('app.layout')
@section('title', 'New Event')
@section('stylesheet_pages')
		@include('app.styles_pages')
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

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    New Event
                    <small>Control panel</small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content" style="float: left; width:350px">
                <div class="row">
                    <div class="col-md-3" style="float: left; width:350px">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Crear Evento</h3>
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
                    <!--
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-body no-padding">
                                
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                    -->
                </div><!-- /.row -->
            </section><!-- /.content -->

            <!--  _______________________________CALENDARIO 2_____________________________________  -->
            <div class="row">
                
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
								<div class="box-footer text-black">
									<div class="row">
										<div class="col-sm-6">
											<!-- Progress bars -->
											<div class="clearfix">
												<span class="pull-left">Task #1</span>
												<small class="pull-right">90%</small>
											</div>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 90%;"></div>
											</div>

											<div class="clearfix">
												<span class="pull-left">Task #2</span>
												<small class="pull-right">70%</small>
											</div>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 70%;"></div>
											</div>
										</div><!-- /.col -->
										<div class="col-sm-6">
											<div class="clearfix">
												<span class="pull-left">Task #3</span>
												<small class="pull-right">60%</small>
											</div>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 60%;"></div>
											</div>

											<div class="clearfix">
												<span class="pull-left">Task #4</span>
												<small class="pull-right">40%</small>
											</div>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 40%;"></div>
											</div>
										</div><!-- /.col -->
									</div><!-- /.row -->
								</div>
							</div><!-- /.box -->

						</section><!-- right col -->
						</div>

<p>Date: <input type="text" id="datepicker"></p>
            <!--  _______________________________CALENDARIO 1_____________________________________  -->
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


        
    </div><!-- /.content-wrapper -->
        
        
        
        
        <!-- Page Content -->
        

        <script type="text/javascript">
            // date variables
            var now = new Date();
            today = now.toISOString();

            var twoHoursLater = new Date(now.getTime() + (2 * 1000 * 60 * 60));
            twoHoursLater = twoHoursLater.toISOString();

            // Google api console clientID and apiKey
            //var CLIENT_ID = '952399997521-fv95fniurkli0gb3ldahffpfuje34i35.apps.googleusercontent.com';
            var apiKey = 'AIzaSyBfJKuCHTCGJWhGjsn6Lvtr0856WJVKU4o';
            // enter the scope of current project (this API must be turned on in the Google console)
            //var SCOPES2 = ["https://www.googleapis.com/auth/calendar.readonly"];
            //var SCOPES = 'https://www.googleapis.com/auth/plus.me';
            // OAuth2 functions
            function handleClientLoad() {
                gapi.client.setApiKey(apiKey);
                window.setTimeout(checkAuth, 1);
            }

            // Your Client ID can be retrieved from your project in the Google
            // Developer Console, https://console.developers.google.com
            var CLIENT_ID = '952399997521-fv95fniurkli0gb3ldahffpfuje34i35.apps.googleusercontent.com';

            var SCOPES = ["https://www.googleapis.com/auth/calendar"];

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
                    'timeMin': (new Date()).toISOString(),
                    'showDeleted': false,
                    'singleEvents': true,
                    'maxResults': 10,
                    'orderBy': 'startTime'
                });
                request.execute(function(resp) {
                    var events = resp.items;
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
                });
                llenarEventos();
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

            var resource;
            
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
                //pre.appendChild(textContent);
            }
            var eventos = [];
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
            /*
para ejecutar este script se levanta un servidor en este caso python: python -m SimpleHTTPServer 8000
se accede a la url y listo
*/
            function llenarEventos(){
                var requestList = gapi.client.calendar.events.list({
                    'calendarId': 'primary',
                    'timeMin': (new Date()).toISOString(),
                    'showDeleted': false,
                    'singleEvents': true,
                    'maxResults': 10,
                    'orderBy': 'startTime'
                });

                requestList.execute(function(resp) {
                    var events = resp.items;
                    eventos = resp.items;
                    //appendPre('Upcoming events:');

                    if (events.length > 0) {
                        for (i = 0; i < events.length; i++) {
                            var event = events[i];
                            var when = event.start.dateTime;
                            if (!when) {
                                when = event.start.date;
                            }
                            //appendPre(event.summary + ' (' + when + ')')
                        }
                    } else {
                        //appendPre('No upcoming events found.');
                    }

                });
            }
        </script>
        <script src="https://apis.google.com/js/client.js?onload=handleClientLoad" type="text/javascript"></script>

        
@endsection
@section('scripts')
		@include('app.scripts_pages')
		@include('app.scripts_dashboard')
@endsection
