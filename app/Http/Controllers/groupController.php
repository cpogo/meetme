<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use File;

class groupController extends Controller
{

    public function index()
    {
    	session_start();
        if ( isset( $_SESSION['key'] ) ) {
            $user = User::getUserById( $_SESSION[ 'key' ] );
            //$grupos = Group::GetGruposByOwner($_SESSION[ 'key' ]); Envia todos los grupos asociados al user
            $gruposProp = Group::getGruposDondeSoyProp($_SESSION[ 'key' ]);// Envia todos los grupos donde es propietario
            $gruposMiem = Group::getGruposDondeSoyMiem($_SESSION[ 'key' ]);
            $grupos=array($gruposProp,$gruposMiem);
            if( isset( $user ) ){
                return view( 'newgroup' , [ 'user' => $user ],[ 'grupos' => $grupos ] );
            }else{
                return view('errors/503' , [ 'error' => 'no se encontro el usuario en groupController@index' ] );
            }
        }else{
            return view('index');
        }

    }

    public function store(Request $request)
    {
        session_start();
        if(Group::existeGrupo($request->nombre_grupo)!=1)
            Group::crearGrupo($request);
        $user = User::getUserById( $_SESSION[ 'key' ] );
        return view('dashboard')->with('user',$user);
    }

    public function update(Request $req)
    {
        session_start();
        if(Group::existeGrupo($req->nombre_grupo)!=1)
            Group::UpdateGrupo($req);
        $user = User::getUserById( $_SESSION[ 'key' ] );
        return view('dashboard')->with('user',$user);

    }

    public function delete(Request $req) //Borra Grupo
    {
        session_start();
        Group::DeleteGrupo($req);
        $user = User::getUserById( $_SESSION[ 'key' ] );
        return view('dashboard')->with('user',$user);

    }

    public static function deleteMember(Request $req) //Permite al admin del grupo Borrar miembro
    {
        session_start();
        Group::DeleteMemberGrupo($req);
        $user = User::getUserById( $_SESSION[ 'key' ]);
        //return view('dashboard')->with('user',$user);



        if ( isset( $_SESSION['key'] ) ) {

            $grupo = Group::getGroupById($_SESSION['group']);
            $groupWithMembers = Group::GetGruposByMember($_SESSION[ 'key' ],$_SESSION['group']);
            $groupWithOwner = Group::getOwnerByGroup($_SESSION['group']);
            $groupInfo = array($grupo, $groupWithMembers, $groupWithOwner);

            return view( 'mygroup' , [ 'user' => $user ],[ 'grupoInformation' => $groupInfo ]);

        }else{
            return view('index');
        }

    }

    public static function leave(Request $req)
    { // Permite a un usuario dejar un grupo
        session_start();
        Group::LeaveGrupo($req);
        $user = User::getUserById( $_SESSION[ 'key' ] );
        return view('dashboard')->with('user',$user);
    }


}
