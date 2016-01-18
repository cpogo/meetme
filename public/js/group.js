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

    $('td #btnLeaveGroup').on('click',function(){
        $('#modalLeaveGrupo').modal('show');
        var $idgrupoleave=$(this).attr('data-botonLeave');
        $('input[name=grupoLeave]').val($idgrupoleave);
    });


});

$(document).on('click','.delMem',function(){
    $('#modalDeleteMember').modal('show');
    var $idUserToLeave=$(this).attr('data-botonLeaveMember');
    $('input[name=memberLeave]').val($idUserToLeave);

});





