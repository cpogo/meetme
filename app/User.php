<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'email', 'password', 'birthdate', 'sex', 'information'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public $timestamps = false;

    public static function createUser($newUser){
        $user = new User;
        $user->name = $newUser->input_name;
        $user->username = $newUser->input_username;
        $user->password = $newUser->input_password;
        $user->email = $newUser->input_email;
        $time = strtotime($newUser->input_dbirth);
        $date_birth = date('Y-m-d', $time);
        $user->birthdate = $date_birth;
        $user->sex = $newUser->sexOption;
        $user->information = $newUser->input_addinfo;
        $user->save();
    }

    /*public static function existeUsuario($usuario){
        $user = User::where('username', $usuario)->first();
        if(isset($user))
            return 1;
        return -1;
    }*/

    public static function isUserExists($usuario){
        $user = User::where('username', $usuario)->first();
        if(isset($user))
            return 1;
        return -1;
    }

    public static function getUserByUsername($username){
        $user = User::where('username', $username)->first();
        if(isset($user)){
            return $user;// return object user
        }
        return -1;
    }

    public static function isCorrectPassword($usuario, $password){
        $user = User::where('username', $usuario)
                       ->where('password', $password)
                       ->first();
        if(isset($user))
            return 1;
        return -1;
    }

    public static function getUserById($id){
        $user = User::where('id' , $id)->first();
        if(isset($user))
            return $user;
        return -1;
    }

    public function groups(){
        return $this->belongsToMany('App\Group')->withTimestamps();
    }

    public function meets(){
        return $this->belongsToMany('App\Meet')->withTimestamps();
    }

}
