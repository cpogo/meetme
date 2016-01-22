var now = new Date();
        //today = now.toISOString();
        var eventos = [];
        var id2;
        var apiKey = 'AIzaSyBfJKuCHTCGJWhGjsn6Lvtr0856WJVKU4o';
        var CLIENT_ID = '952399997521-fv95fniurkli0gb3ldahffpfuje34i35.apps.googleusercontent.com';

        var SCOPES = ["https://www.googleapis.com/auth/calendar"];

        $('#datetimepickerinicio,#datetimepickerfin').datetimepicker({
            viewMode: 'days'
        });

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

            if (authResult && !authResult.error) {
                authorizeButton.style.visibility = 'hidden'; 		// if authorized, hide button
                loadCalendarApi();
            } else {													// otherwise, show button
                authorizeButton.style.visibility = 'visible';
                authorizeButton.onclick = handleAuthClick; 			// setup function to handle button click
            }
        }

        function loadCalendarApi() {
            gapi.client.load('calendar', 'v3', listUpcomingEvents);

        }

        function listUpcomingEvents() {
            var request = gapi.client.calendar.events.list({
                'calendarId': 'primary',
                'showDeleted': false,
                'singleEvents': true,
                'orderBy': 'startTime'
            });
            request.execute(function(resp) {
                eventos = resp.items;
                if (eventos.length > 0) {
                    for (i = 0; i < eventos.length; i++) {
                        var event = eventos[i];
                        var when = event.start.dateTime;
                        if (!when) {
                            when = event.start.date;
                        }
                    }
                }
                $("#meetingHeader > h3").text(""+eventos.length);
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
                iEdEv.id = ""+i;
                iTrEv.id = ""+i;
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
		    }
		}

		//Efecto Flotante
		function flotante(tipo){
	
			/*if (tipo==1){
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
			}*/

		}

        $("#listaEventos").on("click","li div.tools i.fa-trash-o",function (){
            // FUNCTION TO DELETE EVENT
                var id = parseInt( $(this).attr('id') );                
                gapi.client.load('calendar', 'v3', function() {
                    var request = gapi.client.calendar.events.delete({
                        'calendarId': 'primary',
                        'eventId': eventos[id].id
                    });
                    request.execute(function(resp) {
                        if (resp.status == 'confirmed') {
                            console.log("Event was successfully removed from the calendar!");
                            $('<div class="row"><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Fail!</h4>An error occurred, please try again later.</div></div>').prependTo('section.content');                                    
                        }
                        else{
                            console.log('An error occurred, please try again later.');
                            $('<div class="row"><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Great!</h4>You have deleted an event</div></div>').prependTo('section.content');                                    
                        }
                    });
                });
                $(this).parents('li').slideToggle("slow");
                $(this).parents('li').remove();
        });

        $("#listaEventos").on("click","li div.tools i.fa-edit",function (){
            $('#modalEditEvent').modal('show');   
            id2 = parseInt( $(this).attr('id') );
            //var formValues = {};  
            //var reggie = /(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})/;         
            $.each($("#editarEvento").serializeArray(), function(i,field){
                switch(field.name){
                    case 'event_title':
                        $("input[name='event_title']").attr("value", eventos[id2].summary);
                    break;
                    case 'event_description':
                        $("textarea#eventDescription").val( eventos[id2].description );
                    break;                    
                    case 'fechaInicio':                        
                       $("input[name='fechaInicio']").attr("value", eventos[id2].start.dateTime);
                    break;
                    case 'fechaFin':
                        $("input[name='fechaFin']").attr("value", eventos[id2].end.dateTime);
                    break;
                    case 'location':
                        $("input[name='location']").attr("value", eventos[id2].location);
                    break;                    
                }
            });
        });//2015-12-20T09:00:00-07:00  01/21/2016 12:00 AM

/*$('input').keyup(function (){
    var texto = $(this).val();
    var dataString = ''+ texto;


    if( $(this).is('#addMemberEvent') ){
        if( texto != '' )//si no tiene ningun valor la caja de texto no realiza ninguna accion
        {
            $.ajax({//metodo ajax
                type: "GET",//aqui puede  ser get o post
                url: '/lfmember',//la url adonde se va a mandar la cadena a buscar
                data: { 'agregarMiembro' : dataString, 'editEvent':1 },
                cache: false,
                success: function(data)//funcion que se activa al recibir un dato
                {   //console.log(data);
                    $(".displaygroupEvent").html(data).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
                }
            });
        }return false;
    }
});

$(document).mouseup(function (e)
{
    var container = $(".display");
    var container2 = $('.displaygroupEvent');


    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();

    }
    if(!container2.is(e.target) && container2.has(e.target).length === 0)
    {
        container2.hide();

    }

});

$(document).on("click", "#members", function(evento){
        //console.log($(evento.target).attr('data-id'));
        $('.list-users').append($('<li class=" list-group-item list-group-item-success">'+$(evento.target).attr('data-id')+'<button id="close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>'));
        
});*/

        /*
<div class="alert alert-warning alert-dismissible fade in" role="alert"> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span></button> <strong>Holy guacamole!</strong> 
Best check yo self, you're not looking too good. </div>
        */
    function llenarResource2(){
                var combo = null;
                var tituloE = document.getElementById("eventTittle").value;
                var descriptionE = document.getElementById("eventDescription").value;
                var location = document.getElementById("autocomplete").value;
                var dateI = $("#datetimepickerinicio").data("DateTimePicker").date()._d;
                var dateF = $("#datetimepickerfin").data("DateTimePicker").date()._d;
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
                        "dateTime": anioI+"-"+mesI+"-"+diaI+"T"+horaI+":"+minI+":00-05:00"//"2015-12-20T09:00:00-07:00"
                    },
                    "end": {
                        "dateTime": anioF+"-"+mesF+"-"+diaF+"T"+horaF+":"+minF+":00-05:00"//"2015-12-26T17:00:00-10:00"
                    },
                    "creator":{},
                    "description":descriptionE,
                    "location":location,
                    "attendees":[],
                    "reminders": {
                        "useDefault": false,
                        "overrides": [
                          {
                            "method": "email",
                            "minutes": 1440
                          }
                        ]
                    },
                    "anyoneCanAddSelf": true                                      
                };                
                $.each($('#editarEvento').serializeArray(), function (i, field){
                    if(field.name == "combo"){
                        combo = field.value;
                    }
                });
                if( combo == "CG" ){
                    alert("Choose a group");                    
                }else if( combo == "NG" ){
                    alert("You don't have joined any group, please create one");
                    return false;
                }else{
                    console.log(combo);
                    $.ajax({
                        type:"POST",
                        url: '/event',
                        cache: false,
                        dataType: 'JSON',
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf-token"]').attr('content');
                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {'resource':resource , 'grupo':combo},
                        success: function(data)
                        {
                            gapi.client.load('calendar', 'v3', function () {// load the calendar api (version 3)
                                var request = gapi.client.calendar.events.update
                                ({
                                    'calendarId': 'primary',
                                    'eventId':eventos[id2].id,
                                    "resource": data // pass event details with api call
                                });
                                // handle the response from our api call
                                request.execute(function (resp) {
                                    if (resp.status == 'confirmed') {                        
                                        console.log("se actualizo con exito el evento");
                                        $('#modalEditEvent').modal('hide');
                                        //$('<div class="row"><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Great!</h4>You have created an event</div></div>').prependTo('section.content');        
                                    } else {                                            
                                        console.log("no se creo el evento");
                                    }
                                });
                            });
                        }
                    });
                }                
            }
    $('#editarEvento').submit(function (evt){
        llenarResource2();
        evt.preventDefault();
    });  
    
    