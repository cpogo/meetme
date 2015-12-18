$(document).ready(function(){


    $('td #btnEdit').on('click',function(){
        $('#modalEditGrupo').modal('show');
        var $idgrupoedit=$(this).attr('data-botonEdit');

        // $('#lolo').html($idgrupoedit);
            $('input[name=grupoid]').val($idgrupoedit);

    });

    $('td #btnDelete').on('click',function(){
        $('#modalDeleteGrupo').modal('show');
        var $idgrupodel=$(this).attr('data-botonDel');
        $('input[name=grupoidd]').val($idgrupodel);
    });





});

