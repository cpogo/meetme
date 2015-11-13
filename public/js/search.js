$('#busqueda').keyup(function (){
	var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
    var dataString = ''+ texto;
    //console.log(dataString);
    if( texto != '' )//si no tiene ningun valor la caja de texto no realiza ninguna accion
    {
        $.ajax({//metodo ajax
	        type: "GET",//aqui puede  ser get o post
	        url: '/searching',//la url adonde se va a mandar la cadena a buscar
	        data: dataString,
	        cache: false,
	        success: function(data)//funcion que se activa al recibir un dato
	        {
	        	//console.log(data);
	        	$(".display").html(data).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
	        }
        });
    }return false;
});

$(document).mouseup(function (e)
{
    var container = $(".display");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
});