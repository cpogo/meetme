<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reunion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'objetivo', 'descripcion', 'fecha', 'idreunionCreador', 'sugerencia'];

    /*avoid these columns created_at and updated_at*/
    public $timestamps = false;

    public static function crearReunion($reunion_Objeto){
        $reunion = new Reunion;
        $reunion->titulo = $reunion_Objeto->event_title;
        $reunion->objetivo = $reunion_Objeto->event_objective;
        $reunion->descripcion = $reunion_Objeto->event_description;
        $time = strtotime($reunion_Objeto->event_date);
        $date_meeting = date('Y-m-d', $time);
        $reunion->fecha = $date_meeting;

        //Cambiar esto cuando se maneje sesiones
        $reunion->idUsuarioCreador = 1;
        //Cambiar esto cuando se maneje sesiones

        $reunion->sugerencia = $reunion_Objeto->event_suggestion;
        $reunion->save();
    }
}
