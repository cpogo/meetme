<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
  protected $fillable = ['name', 'description'];

  public $timestamps = false;

	//public static function existeGrupo($ngrupo){
        //$group = Grupo::where('name', $ngrupo)->first();
        //if(isset($group))
        //    return 1;
        //return -1;
    //}


    public static function crearGrupo($req){
        //if (existeGrupo($req->nombre_grupo))
        //    dd("Grupo existe");
        //else
        $grupo = new Group;
        $grupo->name = $req->nombre_grupo;
        $grupo->description = $req->grupo_descripcion;
        $grupo->save();
    }

  public function users(){
      return $this->belongsToMany('App\User')->withTimestamps();
  }

}
