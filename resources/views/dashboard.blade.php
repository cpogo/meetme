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
<style>
#fondo {
	width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 990;opacity: 0.8;background:#000;
	overflow: scroll;
}
#flotante {
	z-index: 999; border: 8px solid #fff; margin-top: -756px; margin-left: -153px; top: 50%; left: 50%; 
	padding: 12px; position: fixed; width: 265px; background-color: #fff; border-radius: 3px;

}
#contenedor {
	overflow: scroll;width: 100%; height: 100%;
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
{{--
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3>150</h3>
									<p>New Orders</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
									<h3>53<sup style="font-size: 20px">%</sup></h3>
									<p>Bounce Rate</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-yellow">
								<div class="inner">
									<h3>44</h3>
									<p>User Registrations</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>65</h3>
									<p>Unique Visitors</p>
								</div>
								<div class="icon">
									<i class="ion ion-pie-graph"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
					</div><!-- /.row -->
--}}
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

						<div class="col-md-2 col-sm-2 col-xs-12">
								 <button type="button" id="authorize-button" style="visibility: hidden" class="btn btn-primary">Authorize</button>
						</div>

					</div><!-- /.row (main row) -->

				</section><!-- /.content -->

				<!-- Ventana Flotante -->
				<div id="flotante">
					<h1>Ventana flotante</h1>
					<h3><a onClick="flotante(2)">Cerrar ventana</a></h3>

					
				</div>
				<div id="contenedor" style="display:none">
				<div id="fondo"></div>


			</div><!-- /.content-wrapper -->
@endsection
@section('scripts')
	@include('app.scripts_dashboard')
	
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
                mostrarLista();
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
		        iEdEv.setAttribute("onclick","flotante(1);");
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

		//Efecto Flotante
		function flotante(tipo){
	
			if (tipo==1){
				//Si hacemos clic en abrir mostramos el fondo negro y el flotante
				$('#contenedor').show();
			    $('#flotante').animate({
			      marginTop: "-200px"
			    });
			    var fondo = document.getElementById("fondo");
			    var contenedor = document.getElementById("contenedor");
			    var alto = $(window).height();
			    fondo.setAttribute("height",alto);
			    contenedor.setAttribute("height",alto);
			}
			if (tipo==2){
				//Si hacemos clic en cerrar, deslizamos el flotante hacia arriba
			    $('#flotante').animate({
			      marginTop: "-900px"
			    });
				//Una vez ocultado el flotante cerramos el fondo negro
				setTimeout(function(){
				$('#contenedor').hide();
					
				},500)
			}

		}
	</script>
	<script src="https://apis.google.com/js/client.js?onload=handleClientLoad" type="text/javascript"></script>
@endsection
