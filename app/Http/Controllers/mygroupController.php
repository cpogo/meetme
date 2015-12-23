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

    public function index($id)
    {
    	session_start();
        if ( isset( $_SESSION['key'] ) ) {
            $_SESSION['group'] = $id;
            $user = User::getUserById( $_SESSION[ 'key' ] );
            //$grupos=Group::GetGruposByOwner($_SESSION[ 'key' ]);
            $grupo = Group::getGroupById($id);

            if( isset( $user ) ){
                return view( 'mygroup' , [ 'user' => $user ],[ 'grupo' => $grupo ] );
            }else{
                return view('errors/503' , [ 'error' => 'no se encontro el usuario en groupController@index' ] );
            }
        }else{
            return view('index');
        }

    }

    public function search(Request $request)
    {
		$html = '';

		$users = User::members( $request->agregarMiembro )->get();

		$html .= '<div class="list-group">';
		$html .= '	<a href="#" class="list-group-item list-group-item-' . ($users->isEmpty() ? 'danger' : 'success') . '"><span class="badge">' . $users->count() . '</span><i class="fa fa-user"></i> Users</a>';

		foreach ($users as $user) {
			$html .= '	<a href="' . url('profile/' . $user->username) . '" title="' . $user->first_name . ' ' . $user->last_name . '" class="list-group-item usergroup" data-name="' . $user->id . '">';
			$html .= '		<div class="media">';
			$html .= '			<div class="media-left media-middle">';
			$html .= '				<img class="media-object img-circle img-sm" src="' . asset('img/user' . $user->id . '.jpg') . '">';
			$html .= '			</div>';
			$html .= '			<div class="media-body">';
			$html .= '				<h4 class="media-heading">' . $user->first_name . ' ' . $user->last_name . '</h4>';
			$html .= '				<div>' . $user->username . '</div>';
			$html .= '			</div>';
			$html .= '		</div>';
			$html .= '	</a>';
		}

		$html .= '</div>';

//        $html = "<ul class='sidebar-menu'>";
//        $users = User::members( $request->agregarMiembro )->get();
//        $html .= "<li class='headerbox'><a href='#'><span class='textbox'>Users</span></a></li>";
//        foreach ($users as $user) {
//            $html .="<li class='usergroup' data-name='".$user->id."'><a href='#' style='text-decoration:none;'>
//                             <span>".$user->full_name."</span>
//                             </a>
//                        </li>";
//        }
//        $html .= "</ul>";

        return $html;
        //return $users;
    }

    public function store(Request $request)
    {
        $userId = $_POST['usuario'];
        session_start();
        if($request->ajax()) {
            dd("hola mundo");
        }
        $html = "";
        /*$group = Group::getGroupById( $_SESSION['group'] );
        $user = User::getUserById($userId);
        $nombre = $user->full_name;
        $group->users()->save( $user , ['owner'=>0] );
        $html.= "<div class='col-sm-6 col-md-4'>
                    <div class='thumbnail'>
                        <img src='{{asset('images/avatar3.png')}}' class='img-circle img-responsive' alt='owner' width='140' height='140'>
                        <div class='caption'>
                            <h3 style='text-align: center;'>".$nombre."</h3>
                            <h4 style='text-align: center;'>Member</h4>
                        </div>
                    </div>
                </div>";*/
        return $html;
        //$user = User::getUserById($userId);
        //$user->groups()->where('id', $_SESSION['group'])->save();
    }
}
