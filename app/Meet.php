<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'objetive','description', 'start_date', 'end_date','suggestion'];

    public $timestamps = false;

    /*
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
    */

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
