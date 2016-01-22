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
            $gruposProp = Group::getGruposDondeSoyProp($_SESSION[ 'key' ]);// Envia todos los grupos donde es propietario
            $gruposMiem = Group::getGruposDondeSoyMiem($_SESSION[ 'key' ]);
            $grupos = array($gruposProp,$gruposMiem);
            if( isset( $user ) ){
                return view( 'dashboard' , [ 'user' => $user , 'grupos' => $grupos] );
            }else{
                return view('errors/503' , [ 'error' => 'no se encontro el usuario en dashboardController@index' ]);
            }
        }else{
            return view('index');
        }
    }

    public function search(Request $request)
	{
		$html = '';

		$users = User::members($request->buscar)->get();
		$groups = Group::groups($request->buscar)->get();

		$users_count = $users->count();
		$groups_count = count($groups);

		$users_show = 3;
		$groups_show = 3;

//		$html .= '<li class="headerbox"><a href="#"><span class="textbox">Users</span></a></li>';

		$html .= '<div class="list-group">';
		$html .= '	<a href="/search/' . urlencode($request->buscar) . '" class="list-group-item list-group-item-' . ($users->isEmpty() ? 'danger' : 'success') . '"><span class="badge">' . $users_count . '</span><i class="fa fa-user"></i> Users</a>';

		$users = $users->take($users_show);

		foreach ($users as $user) {
//			$html .= '<li class="user" title="' . $user->full_name . '">';
//			$html .= '	<a href="'. url('profile/' . $user->username) .'" style="text-decoration:none;">';
//			$html .= '		<span class="display_box">' . $user->full_name . '</span>';
//			$html .= '	</a>';
//			$html .= '</li>';

			$html .= '	<a href="' . url('profile/' . $user->username) . '" title="' . $user->full_name . '" class="list-group-item">';
			$html .= '		<div class="media">';
			$html .= '			<div class="media-left media-middle">';
			$html .= '				<img class="media-object img-circle img-sm" src="' . asset('img/user' . $user->id . '.jpg') . '">';
			$html .= '			</div>';
			$html .= '			<div class="media-body">';
			$html .= '				<h4 class="media-heading">' . $user->full_name . '</h4>';
			$html .= '				<div>' . $user->username . '</div>';
			$html .= '			</div>';
			$html .= '		</div>';
			$html .= '	</a>';
		}

		if( $users_count > $users_show ){
//			$html .= '	<a href="#" class="list-group-item list-group-item-info text-center">';
//			$html .= '		<div>Showing ' . $users_show . ' of ' . $users_count . '.</div>';
//			$html .= '		<div>Show more <i class="fa fa-search-plus"></i></div>';
//			$html .= '	</a>';

//			$html .= '	<a href="#" class="list-group-item list-group-item-info text-center">';
//			$html .= '		Showing ' . $users_show . ' of ' . $users_count . '.<br>';
//			$html .= '		Show more <i class="fa fa-search-plus"></i>';
//			$html .= '	</a>';

			$html .= '	<a href="/search/' . urlencode($request->buscar) . '" class="list-group-item list-group-item-info text-center">Show more <i class="fa fa-search-plus"></i></a>';
		}

//		$html .= '<li class="headerbox"><a href="#"><span class="textbox">Groups</span></a></li>';

		$html .= '	<a href="/search/' . urlencode($request->buscar) . '" class="list-group-item list-group-item-' . ($groups->isEmpty() ? 'danger' : 'success') . '"><span class="badge">' . $groups_count . '</span><i class="fa fa-group"></i> Groups</a>';

		$groups = $groups->take($groups_show);

		foreach ($groups as $group) {
//			$html .= '<li class="group" title="' . $group->name . '">';
//			$html .= '	<a href="#" style="text-decoration:none;">';
//			$html .= '		<span class="display_box">' . $group->name . '</span>';
//			$html .= '	</a>';
//			$html .= '</li>';

			$html .= '	<a href="' . url('mygroup/' . $group->id) . '" title="' . $group->name . '" class="list-group-item">';
			$html .= '		<div class="media">';
			$html .= '			<div class="media-left media-middle">';
			$html .= '				<div class="media-object img-circle img-sm"></div>';
			$html .= '			</div>';
			$html .= '			<div class="media-body">';
			$html .= '				<h4 class="media-heading">' . $group->name . '</h4>';
			$html .= '				<div>' . $group->description . '</div>';
			$html .= '			</div>';
			$html .= '		</div>';
			$html .= '	</a>';
		}

		if( $groups_count > $groups_show ){
//			$html .= '	<a href="#" class="list-group-item list-group-item-info text-center">';
//			$html .= '		<div>Showing ' . $groups_show . ' of ' . $groups_count . '.</div>';
//			$html .= '		<div>Show more <i class="fa fa-search-plus"></i></div>';
//			$html .= '	</a>';

//			$html .= '	<a href="#" class="list-group-item list-group-item-info text-center">';
//			$html .= '		Showing ' . $groups_show . ' of ' . $groups_count . '.<br>';
//			$html .= '		Show more <i class="fa fa-search-plus"></i>';
//			$html .= '	</a>';

			$html .= '	<a href="/search/' . urlencode($request->buscar) . '" class="list-group-item list-group-item-info text-center">Show more <i class="fa fa-search-plus"></i></a>';
		}

		$html .= '</div>';

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
