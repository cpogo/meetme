var now = new Date();
        //today = now.toISOString();
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
                liEv.id = ""+i;
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
		    }
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

        $("#listaEventos").on("click","li",function (){
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
                        }
                        else{
                            console.log('An error occurred, please try again later.')
                        }
                    });
                });
        });