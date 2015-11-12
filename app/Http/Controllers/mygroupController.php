<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use File;

class mygroupController extends Controller
{

    public function index()
    {
    	session_start();
        if ( isset( $_SESSION['key'] ) ) {
            $user = User::getUserById( $_SESSION[ 'key' ] );
            $grupos=Group::GetGruposByOwner($_SESSION[ 'key' ]);
			$user->photo_url = (File::exists( public_path('img/user' . $user->id . '.jpg') )) ? asset('img/user' . $user->id . '.jpg') : asset('img/user.png');
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
