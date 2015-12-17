$(document).ready(function(){

    $('td #btnEdit').on('click',function(){
        $('#modalEditGrupo').modal('show');
        $(this).html($(this).data('botonEdit'));
    });

    $('td #btnDelete').on('click',function(){
        $('#modalDeleteGrupo').modal('show');
    });

    });

