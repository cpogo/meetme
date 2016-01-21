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
									<!--action="createEvent"-->
						<form action="#" method="post">
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
									<label>Start Date</label>
									<div class='input-group date' id='datetimepickerinicio'>
						                 <input data-format="dd-MM-yyyy hh:mm:ss" type='text' name="fechaInicio" id="fechaInicio" class="form-control"/>
						            <span class="input-group-addon">
						                  <span class="glyphicon glyphicon-calendar"></span>
						            </span>
						            </div>
								</div>
								<!-- Event Date -->
						
                        		<div class="form-group">
									<label>End Date</label>
									<div class='input-group date' id='datetimepickerfin'>
						                	<input data-format="dd-MM-yyyy hh:mm:ss" type='text' name="fechaFin" id="fechaFin" class="form-control"/>
							                 <span class="input-group-addon">
							                     <span class="glyphicon glyphicon-calendar"></span>
							                 </span>
							        </div>
								</div>
                        </form>
								<div class="form-group">
										 <button id="btnCreateEvents" class="btn btn-primary" onclick="makeApiCall();">Create Events</button>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-12">
										 <button type="button" id="authorize-button" style="visibility: hidden" class="btn btn-primary">Authorize</button>
								</div>
                        {{--<button id="btnCreateEvents" class="btn btn-primary" onclick="makeApiCall();">
			                        	Create Events</button>
			                    	<button id="btnDeleteEvents" class="btn btn-primary" onclick="deleteEvent();">
			                        	Delete Events</button>--}}
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

                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title">To Do List</h3>
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
                        <div class="box-footer clearfix no-border">
                            <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
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
	           **/
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
                    //resultPanel.className = resultPanel.className.replace(/(?:^|\s)panel-danger(?!\S)/g, '')	// remove red class
                    //resultPanel.className += ' panel-success'; 			// add green class
                    //resultTitle.innerHTML = 'Application Authorized'		// display 'authorized' text
                    //eventButton.style.visibility = 'visible';
                    $("#txtEventDetails").attr("visibility", "visible");
                    //alert("aqui estoy");
                    loadCalendarApi();
                } else {													// otherwise, show button
                    authorizeButton.style.visibility = 'visible';
                    $("#txtEventDetails").attr("visibility", "hidden");
                    //eventButton.style.visibility = 'hidden';
                    //resultPanel.className += ' panel-danger'; 			// make panel red
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

            /*function refreshICalendarframe() {
                var iframe = document.getElementById('divifm')
                iframe.innerHTML = iframe.innerHTML;
            }*/


            function llenarResource(){
                var tituloE = document.getElementById("eventTittle").value;
                var descriptionE = document.getElementById("eventDescription").value;
                //var dateI = document.getElementById("fechaInicio").value;
				var dateI = $("#datetimepickerinicio").data("DateTimePicker").date()._d;
				//var dateF = document.getElementById("fechaFin").value;
				var dateF = $("#datetimepickerfin").data("DateTimePicker").date()._d;
				//var lngFecha = dateI.length;
				var diaI = dateI.getDate();
				if( diaI < 10 ){ diaI = "0" + diaI; }
				var mesI = dateI.getMonth() + 1;
				if( mesI < 10 ){ mesI = "0" + mesI; }
				var anioI = dateI.getFullYear();
				var horaI = dateI.getHours();
				var minI = dateI.getMinutes();

				var diaF = dateF.getDate();
				if( diaF < 10 ){ diaF = "0" + diaF; }
				var mesF = dateF.getMonth() + 1;
				if( mesF < 10 ){ mesF = "0" + mesF; }
				var anioF = dateF.getFullYear();
				var horaF = dateF.getHours();
				var minF = dateF.getMinutes();
                resource = {
                    "summary": tituloE,
                    "start": {
                        "dateTime": anioI+"-"+mesI+"-"+diaI+"T"+horaI+":"+minI+":00-05:00"   //"2015-12-20T09:00:00-07:00"
                    },
                    "end": {
                        "dateTime": anioF+"-"+mesF+"-"+diaF+"T"+horaF+":"+minF+":00-05:00" //"2015-12-26T17:00:00-10:00"
                    },
                    "description":descriptionE,
                    "location":"EC",
                    "attendees":[
                        {
                            "email":"metacris93@gmail.com",
                            "displayName":"Cristian",
                            "organizer":true,
                            "self":false,
                            "resource":false,
                            "optional":false,
                            "responseStatus":"needsAction",
                            "comment":"This is event first",
                            "additionalGuests":3
                        },
                        {
                            "email":"darthcristian93@gmail.com",
                            "displayName":"Cristian2",
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
                //var eventResponse = document.getElementById('event-response');
                llenarResource();
								console.log(resource);
                gapi.client.load('calendar', 'v3', function () {					// load the calendar api (version 3)
                var request = gapi.client.calendar.events.insert
                    ({
                        'calendarId': 'primary', // calendar ID
                        "resource": resource							// pass event details with api call
                    });

                    // handle the response from our api call
                    request.execute(function (resp) {
                        if (resp.status == 'confirmed') {
                            //eventResponse.innerHTML = "Event created successfully. View it <a href='" + resp.htmlLink + "'>online here</a>.";
                            //eventResponse.className += ' panel-success';
                            //refreshICalendarframe();
							console.log("se creo con exito el evento");
                        } else {
                            //document.getElementById('event-response').innerHTML = "There was a problem. Reload page and try again.";
                            //eventResponse.className += ' panel-danger';
							console.log("no se creo el evento");
                        }
                    });
                });
            }

            /*function appendPre(message) {
                var pre = document.getElementById('output');
                var textContent = document.createTextNode(message + '\n');
                pre.appendChild(textContent);
            }*/

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
	var datos = "[";// = "{{ json_encode($datos) }}";
	//var datos = "{{ json_encode($datos) }}";
	var datosTmp = datos.replace(/&quot;/g,'"');
	var anio, mes, dia;                //"2013-09-19T11:00:00-05:00";
	var hora, min, seg;

	for (var i=0; i<eventos.length; i++){
		anio = eventos[i].start.dateTime.substring(0, 4);
		mes =  eventos[i].start.dateTime.substring(5, 7);
		dia =  eventos[i].start.dateTime.substring(8, 10);
		hora =  eventos[i].start.dateTime.substring(11, 13);
		min =  eventos[i].start.dateTime.substring(14, 16);
		seg =  eventos[i].start.dateTime.substring(17, 19);
		datos = datos + "{" + '"eventName":' + '"' + eventos[i].summary + '","startEvent":{"anio":"' + anio + '","mes":"'
				+ mes + '","dia":"' + dia + '","hora":"' + hora + '","minuto":"' + min + '","segundo":"' + seg + '"},';

		anio = eventos[i].end.dateTime.substring(0, 4);
		mes =  eventos[i].end.dateTime.substring(5, 7);
		dia =  eventos[i].end.dateTime.substring(8, 10);
		hora =  eventos[i].end.dateTime.substring(11, 13);
		min =  eventos[i].end.dateTime.substring(14, 16);
		seg =  eventos[i].end.dateTime.substring(17, 19);

		datos = datos + '"endEvent":{"anio":"' + anio + '","mes":"'
				+ mes + '","dia":"' + dia + '","hora":"' + hora + '","minuto":"' + min + '","segundo":"' + seg + '"}}';

		if(i != (eventos.length - 1)){
			datos = datos + ",";
		}
	}
	datos = datos + "]";

	var datosJson = JSON.parse(datos);
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
	/*
	$(".timepicker").timepicker({
		showInputs: false
	});*/
	$('#datetimepickerinicio,#datetimepickerfin').datetimepicker({
			viewMode: 'days'
	});

    mostrarLista();
}


//Mostrar Lista de eventos
function mostrarLista(){
    var ulEv = document.getElementById("listaEventos");
    
    for (var i=0; i < eventos.length; i++) {
        //Crear elementos
        var liEv = document.createElement("li");
        var spanEv = document.createElement("span");
        var iEv = document.createElement("i");
        var inputEv = document.createElement("input");
        var spanTextEv = document.createElement("span");
        var smallEv = document.createElement("small");
        var divEv = document.createElement("div");
        var iEdEv = document.createElement("i");
        var iTrEv = document.createElement("i");
        spanEv.className = "handle";
        iEv.className = "fa fa-ellipsis-v";
        inputEv.type = "checkbox";
        spanTextEv.className = "text";
        divEv.className = "tools";
        iEdEv.className = "fa fa-edit";
        iTrEv.className = "fa fa-trash-o";
        //Ingresar Evento
        var texto = document.createTextNode(eventos[i].summary);
        spanTextEv.appendChild(texto);

        //Insertar elementos en ul
        //spanEv.appendChild(iEv);
        divEv.appendChild(iEdEv);
        divEv.appendChild(iTrEv);
        liEv.appendChild(spanEv);
        liEv.appendChild(inputEv);
        liEv.appendChild(spanTextEv);
        //liEv.appendChild(smallEv);
        liEv.appendChild(divEv);

        ulEv.appendChild(liEv);
    };
}
		</script>

		<script src="https://apis.google.com/js/client.js?onload=handleClientLoad" type="text/javascript"></script>
@endsection
