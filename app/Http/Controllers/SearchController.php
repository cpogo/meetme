<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Group;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($query)
    {
        //
		session_start();
		if (isset($_SESSION['key'])) {
			$user = User::getUserById($_SESSION['key']);

			$query = urldecode($query);
			$query = trim($query);

			$users = User::members($query)->get();
			$groups = Group::groups($query)->get();

			if (isset($user)) {
				return view('search', [
					'user' => $user,
					'query' => $query,
					'found_users' => $users,
					'found_groups' => $groups,
						]);
			}
		} else {
			return view('index');
		}
    }

    public function search(Request $request)
    {
        //
		session_start();
		if (isset($_SESSION['key'])) {
			$user = User::getUserById($_SESSION['key']);

			//$query = $_POST['buscar'];
			$query = $request->buscar;

			$query = urldecode($query);
			$query = trim($query);
			$query_url = urlencode($query);
			$query_url = trim($query_url);

			if (isset($user)) {
				return redirect('search/'.$query_url);
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
}
