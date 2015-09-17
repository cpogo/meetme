<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'nombre', 'contrasena'];

    public static function crearUsuario(){
    	$usuario = new Usuario;

        $usuario->name = $request->nombre;
        $usuario->contrasena = $request->nombre;

        $usuario->save();
    }
}
