<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class mygroupController extends Controller
{

    public function index()
    {
    	session_start();
        if ( isset( $_SESSION['key'] ) ) {
            $user = User::getUserById( $_SESSION[ 'key' ] );
            $grupos=Group::GetGruposByOwner($_SESSION[ 'key' ]);
            if( isset( $user ) ){
                return view( 'mygroup' , [ 'user' => $user ],[ 'grupos' => $grupos ] );
            }else{
                return view('errors/503' , [ 'error' => 'no se encontro el usuario en groupController@index' ] );
            }            
        }else{
            return view('index');
        }

    }


}
