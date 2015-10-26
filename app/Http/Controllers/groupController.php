<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class groupController extends Controller
{

    public function index()
    {
    	session_start();
        if ( isset( $_SESSION['key'] ) ) {
            $user = User::getUserById( $_SESSION[ 'key' ] );
            if( isset( $user ) ){
                return view( 'newgroup' , [ 'user' => $user ] );
            }else{
                return view('errors/503' , [ 'error' => 'no se encontro el usuario en groupController@index' ] );
            }            
        }else{
            return view('index');
        }
    }

    public function store(Request $request)
    {
        Group::crearGrupo($request);
        return view('dashboard');
    }

}
