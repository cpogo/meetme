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
            $grupo = Group::getGroupById($id);
            $groupWithMembers = Group::GetGruposByMember($_SESSION[ 'key' ],$_SESSION['group']);
            $groupWithOwner = Group::getOwnerByGroup($_SESSION['group']);
            $groupInfo = array($grupo, $groupWithMembers, $groupWithOwner);
            if( isset( $user ) ){
                return view( 'mygroup' , [ 'user' => $user ],[ 'grupoInformation' => $groupInfo ]);
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


		$html .= '<div class="list-group" id="grupo">';
		$html .= '	<a href="#" class="list-group-item list-group-item-' . ($users->isEmpty() ? 'danger' : 'success') . '"><span class="badge">' . $users->count() . '</span><i class="fa fa-user"></i> Users</a>';

		foreach ($users as $user) {
            $html .= '		<div>';

            $html .= '	<h5 class="list-group-item usergroup" >';

            $html .= '	<a href="' . url('profile/' . $user->username) . ' " title=" ' . $user->full_name . '">';

            $html .= '				<img class="media-object img-circle img-sm" src="' . asset('img/user' . $user->id . '.jpg') . '">';

            $html .= '			</a>';

			$html .= '			<div class="media-body">';
			$html .= '				<strong> '.'&nbsp;&nbsp;' . $user->full_name . '</strong>';
			$html .= '				<div> ' . '&nbsp;&nbsp;&nbsp;&nbsp;'. $user->username . '</div>';
            $html .= '         <div class="media-right">
              <button type="button" class="btn btn-info btn-xs" data-id="' . $user->id . '"> Add <i data-id="' . $user->id . '" class="glyphicon glyphicon-plus-sign"></i></button><br/>
                                </div>';
			$html .= '			</div>';
            $html .= '		</div>';
			$html .= '	</h5>';

		} //Aqui arriba puse el button que contiene como data el id del usuario a agregar

		$html .= '</div>';
        return $html;
    }

    public function store(Request $request)
    {
        session_start();
        $html = "";
        $vecesenelgrupo=0;
        $creadormiembro=0;

        if($request->ajax()) {
          $group = Group::getGroupById( $_SESSION['group'] );
          $user = User::getUserById($request->usuario);

            $vecesenelgrupo= $group->users()->where('owner', 0)
                              ->where('user_id',$user->id)
                              ->where('group_id',$group->id)
                               ->count();

            $creadormiembro= $group->users()->where('owner', 1)
                ->where('user_id',$user->id)
                ->where('group_id',$group->id)
                ->count();


            if($vecesenelgrupo<1 && $creadormiembro<1) {
                $group->users()->save($user, ['owner' => 0]);

                $html .= '<div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                          <button style="margin-left: 88%" type="button" class="btn btn-link delMem" data-botonLeaveMember="{{$members->id}}" ><i class="fa fa-remove"></i></button>
                          <img src="' . asset("images/avatar3.png") . '" class="img-circle img-responsive" alt="owner" width="140" height="140">
                          <div class="caption">
                              <h3 style="text-align: center;">Member</h3>
                              <h4 style="text-align: center;">' . $user->full_name . '</h4>

                          </div>
                      </div>
                  </div>';
            }
            else
                if($creadormiembro>=1)
                        echo "<script type='text/javascript'>alert('You can not add yourself, you are the owner.');</script>";
                    else
                        echo "<script type='text/javascript'>alert('The user is already a member of the group..');</script>";

        }
        return $html;
    }
}
