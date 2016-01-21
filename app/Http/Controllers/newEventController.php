<?php

namespace App\Http\Controllers;

use App\Reunion;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use google\apiclient\src\Google\Client;
use google\apiclient\src\Google\Service\Calendar;
use File;

class newEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if ( isset( $_SESSION['key'] ) ) {
            $user = User::getUserById( $_SESSION[ 'key' ] );
            $gruposProp = Group::getGruposDondeSoyProp($_SESSION[ 'key' ]);// Envia todos los grupos donde es propietario
            $gruposMiem = Group::getGruposDondeSoyMiem($_SESSION[ 'key' ]);
            $grupos = array($gruposProp,$gruposMiem);
            return view( 'newEvent' , [ 'user' => $user , 'grupos' => $grupos] );
        }else{
            return view('errors/503' , [ 'error' => 'no se encontro el usuario en newEventController@index' ] );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nuevoEvento(Request $request)
    {
        session_start();
        if ( isset( $_SESSION['key'] ) ) {
            $user = User::getUserById( $_SESSION[ 'key' ] );
            $jsonData = $request["resource"];
            $groupId = $request["grupo"];
            $grupo = Group::getMembersOwnerGroup($groupId);                        
            /*
              "attendees": [
                {
                  "id": string,
                  "email": string,
                  "displayName": string,
                  "organizer": boolean,
                  "self": boolean,
                  "resource": boolean,
                  "optional": boolean,
                  "responseStatus": string,
                  "comment": string,
                  "additionalGuests": integer
                }
              ],  

              "creator": {
                "id": string,
                "email": string,
                "displayName": string,
                "self": boolean
              },
            */

            foreach ($grupo as $member) {
                if( strcmp( $user->email , $member["email"] ) == 0 ){
                    $creator = new \stdClass();
                    $creator->email = $user->email;
                    $creator->displayName = $user->full_name;
                    $creator->self = true;                    
                    $jsonData["creator"] = $creator;
                }else{
                    $attendees = new \stdClass();
                    $attendees->email = $member["email"];
                    $attendees->displayName = $member["full_name"];
                    $attendees->organizer = true;
                    $attendees->self = false;
                    $attendees->resource = false;
                    $attendees->optional = false;
                    $attendees->comment = ""; 
                    $attendees->responseStatus = "needsAction";
                    $attendees->additionalGuests = 1;
                    $jsonData["attendees"] = array($attendees);
                }                      
            }
            return $jsonData;
        }else{
            return view('errors/503' , [ 'error' => 'no se encontro el usuario en newEventController@nuevoEvento' ] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
