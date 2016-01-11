<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Group;

use File;
use DB;

class ProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($username = null) {
		session_start();
		if (isset($_SESSION['key'])) {
			$user = User::getUserById($_SESSION['key']);

			if (!isset($username) || empty($username))
				$username = $user->username;
			$profile = User::getUserByUsername($username);

			//$match = ['user_id' => $profile, 'follower_id' => $user];

			$is_follow = DB::table('followers')
					->where('user_id', $profile->id)
					->where('follower_id', $user->id)
					->count();

			$follow_profile = ($is_follow > 0);

			$followers = DB::table('followers')
					->where('user_id', $profile->id)
					->select('follower_id')
					->get();

			$following = DB::table('followers')
					->where('follower_id', $profile->id)
					->select('user_id')
					->get();

			$groups = DB::table('group_user')
					->where('owner', $profile->id)
					->select('group_id')
					->get();

			$meetings = DB::table('meet_user')
					->where('owner', $profile->id)
					->select('meet_id')
					->get();

//			$_SESSION['usuario'] = $user->id;
//			$_SESSION['seguidor'] = $profile->id;
//			$_SESSION['foll_is'] = $is_follow;
//			$_SESSION['foll_var'] = $follow_profile;
//			$_SESSION['followers'] = $followers;
//			$_SESSION['following'] = $following;
//			$_SESSION['groups'] = $groups;

			if (isset($user)) {
				return view('profile', [
					'user' => $user,
					'profile' => $profile,
					'follow_profile' => $follow_profile,
					'followers' => $followers,
					'following' => $following,
					'groups' => $groups,
					'meetings' => $meetings,
						]);
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
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function settings(Request $request) {
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

			if (!isset($username) || empty($username))
				$username = $user->username;
			$profile = User::getUserByUsername($username);

			if (isset($user)) {
				return view('profile', [ 'user' => $user, 'profile' => $profile, 'follow_profile' => $follow_profile]);
			}
		} else {
			return view('index');
		}
	}

	public function photo($id) {
		//$photo_url = (File::exists( public_path('img/user' . $id . '.jpg') )) ? asset('img/user' . $id. '.jpg') : asset('img/user.png');
		$photo_url = (File::exists(public_path('img/user' . $id . '.jpg'))) ? 'img/user' . $id . '.jpg' : 'img/user.png';
		return redirect($photo_url, 302);
	}

	public function follow($username) {
		session_start();
		if (isset($_SESSION['key'])) {
			$user = User::getUserById($_SESSION['key']);

			if (!isset($username) || empty($username))
				$username = $user->username;
			$profile = User::getUserByUsername($username);

			DB::table('followers')->insert(
					[
						'user_id' => $profile->id,
						'follower_id' => $user->id
					]
			);

			$follow_profile = true;

			if (isset($user)) {
				return redirect('profile/' . $username);
			}
		} else {
			return view('index');
		}
	}

	public function unfollow($username) {
		session_start();
		if (isset($_SESSION['key'])) {
			$user = User::getUserById($_SESSION['key']);

			if (!isset($username) || empty($username))
				$username = $user->username;
			$profile = User::getUserByUsername($username);

			DB::table('followers')
					->where('user_id', $profile->id)
					->where('follower_id', $user->id)
					->delete();

			$follow_profile = false;

			if (isset($user)) {
				return redirect('profile/' . $username);
			}
		} else {
			return view('index');
		}
	}

}
