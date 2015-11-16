<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\User;


class Group extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'groups';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'description'];//, 'owner'

  public $timestamps = false;


    public static function existeGrupo($ngrupo){
        $group = Group::where('name', $ngrupo)->first();
        if(isset($group))
            return 1;
        return -1;
    }

    public static function crearGrupo($req){
            //session_start();
            $grupo = new Group;
            $grupo->name = $req->nombre_grupo;
            $grupo->description = $req->grupo_descripcion;
            $grupo->save();
            $user = User::getUserById($_SESSION['key']);
            $grupo->users()->save( $user , ['owner'=>1] );
            //$grupo->owner = $_SESSION['key'];


    }


    public static function GetGruposByOwner($id){

         /*$grupos= Group::where('owner', $id)->get();
         return $grupos;*/
         $user = User::getUserById($_SESSION['key']);
         $groups = $user->groups()->get();
         return $groups;
    }

  public function scopeGroups($query,$group)
  {
      if( trim($group) != "" )
      {
          return $query->where('name','LIKE',"%$group%");
      }
  }

  public static function getGroupById($id)
    {
        return Group::find($id);
    }

  public function users(){
      return $this->belongsToMany('App\User');
  }

}