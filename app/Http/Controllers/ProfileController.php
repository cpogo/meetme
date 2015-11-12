<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Group;

use File;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username = null)
    {
        session_start();
		if (isset($_SESSION['key'])) {
			$user = User::getUserById($_SESSION['key']);

			if(!isset($username) || empty($username)) $username = $user->username;
			$profile = User::getUserByUsername($username);

			$user->photo_url = (File::exists( public_path('img/user' . $user->id . '.jpg') )) ? asset('img/user' . $user->id . '.jpg') : asset('img/user.png');
			$profile->photo_url = (File::exists( public_path('img/user' . $profile->id . '.jpg') )) ? asset('img/user' . $profile->id . '.jpg') : asset('img/user.png');

			$user->temp = asset( 'img/user' . $user->id . '-160x160.jpg');
			$profile->temp = asset( 'img/user' . $profile->id . '-160x160.jpg');

			if (isset($user)) {
				return view( 'profile' , [ 'user' => $user, 'profile' => $profile ] );
			}
		} else {
			return view('index');
		}
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

    public function settings(Request $request)
    {
        session_start();
		if (isset($_SESSION['key'])) {
			$firstname = $_POST['inputFirstName'];
			$lastname = $_POST['inputLastName'];
			$username = $_POST['inputUserName'];

			DB::table('users')
					->whereId($_SESSION['key'])
					->update([
						'first_name' => $firstname,
						'last_name' => $lastname,
						'username' => $username
					]);

			$user = User::getUserById($_SESSION['key']);

			if(!isset($username) || empty($username)) $username = $user->username;
			$profile = User::getUserByUsername($username);

			$user->photo_url = (File::exists( public_path('img/user' . $user->id . '.jpg') )) ? asset('img/user' . $user->id . '.jpg') : asset('img/user.png');
			$profile->photo_url = (File::exists( public_path('img/user' . $profile->id . '.jpg') )) ? asset('img/user' . $profile->id . '.jpg') : asset('img/user.png');

			$user->temp = asset( 'img/user' . $user->id . '-160x160.jpg');
			$profile->temp = asset( 'img/user' . $profile->id . '-160x160.jpg');

			if (isset($user)) {
				return view( 'profile' , [ 'user' => $user, 'profile' => $profile ] );
			}
		} else {
			return view('index');
		}
    }
}
