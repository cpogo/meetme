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
    protected $fillable = ['title', 'description', 'start_date', 'end_date'];

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
