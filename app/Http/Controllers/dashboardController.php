<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Group;

use File;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index($user)
     public function index()
    {
        session_start();
        if ( isset( $_SESSION['key'] ) )
        {
            $user = User::getUserById( $_SESSION[ 'key' ] );
			$user->photo_url = (File::exists( public_path('img/user' . $user->id . '.jpg') )) ? asset('img/user' . $user->id . '.jpg') : asset('img/user.png');

            if( isset( $user ) ){
                return view( 'dashboard' , [ 'user' => $user ] );
            }else{
                return view('errors/503' , [ 'error' => 'no se encontro el usuario en dashboardController@index' ]);
            }
        }else{
            return view('index');
        }
    }

    public function search(Request $request)
	{
		$html = "";
		$users = User::members($request->buscar)->get();
		$groups = Group::groups($request->buscar)->get();
		$html .= "<li class='headerbox'><a href='#'><span class='textbox'>Users</span></a></li>";
		foreach ($users as $user) {
			$html .="<li class='user' title='" . $user->full_name . "'><a href='". url('profile/' . $user->username) ."' style='text-decoration:none;'>
                             <span class='display_box'>" . $user->full_name . "</span>
                             </a>
                        </li>";
		}
		$html .= "<li class='headerbox'><a href='#'><span class='textbox'>Groups</span></a></li>";
		foreach ($groups as $group) {
			$html .= "<li class='group' title='" . $group->name . "'><a href='#' style='text-decoration:none;'>
                          <span class='display_box'>" . $group->name . "</span></a>
                      </li>";
		}
		//return [$users,$groups];
		return $html;
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
