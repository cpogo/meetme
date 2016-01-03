$('#busqueda').keyup(function (){
	var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
    var dataString = ''+ texto;
    //console.log(dataString);
    if( texto != '' )//si no tiene ningun valor la caja de texto no realiza ninguna accion
    {
        $.ajax({//metodo ajax
	        type: "GET",//aqui puede  ser get o post
	        url: '/searching',//la url adonde se va a mandar la cadena a buscar
	        data: { 'buscar' : dataString },
	        cache: false,
	        success: function(data)//funcion que se activa al recibir un dato
	        {
	        	//console.log(data);
	        	$(".display").html(data).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
	        }
        });
    }return false;
});

$('input').keyup(function (){
    var texto = $(this).val();
    var dataString = ''+ texto;


    if( $(this).is('#addmember') ){
        //evento( dataString , $('#addmember') , 'addmember' );

        if( texto != '' )//si no tiene ningun valor la caja de texto no realiza ninguna accion
        {
            $.ajax({//metodo ajax
                type: "GET",//aqui puede  ser get o post
                url: '/lfmember',//la url adonde se va a mandar la cadena a buscar
                data: { 'agregarMiembro' : dataString },
                cache: false,
                success: function(data)//funcion que se activa al recibir un dato
                {   //console.log(data);
                    $(".displaygroup").html(data).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
                }
            });
        }return false;
    }
});

$(document).mouseup(function (e)
{
    var container = $(".display");
    var container2 = $('.displaygroup');


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

$(document).on("click", "#grupo", function(evento){
		//console.log($(evento.target).attr('data-id'));
		$.ajax({
				type:"POST",
				url: '/addmember',//la url adonde se va a mandar la cadena a buscar
				cache: false,
				beforeSend: function (xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
				data: { "usuario": $(evento.target).attr('data-id') },
				success: function(data)
				{
					$(".membersgroup").append(data);// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
				    $('#nomember').remove();
                }
		});
});
