<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Hash;

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
    protected $fillable = ['full_name', 'username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public $timestamps = false;

    public static function createUser($newUser){
        $user = new User;
        //$user->first_name = $newUser->first_name;
        //$user->last_name = $newUser->last_name;
        //$user->full_name = "$newUser->first_name $newUser->last_name";
        $user->full_name = $newUser->full_name;
        $user->username = $newUser->input_username;
        $password = Hash::make($newUser->input_password);
        $user->password = $password;
        $user->email = $newUser->input_email;
        /*$time = strtotime($newUser->input_dbirth);
        $date_birth = date('Y-m-d', $time);
        $user->birthdate = $date_birth;*/
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
            return true;
        return false;
    }

    public static function getUserByUsername($username){
        $user = User::where('username', $username)->first();
        if(isset($user)){
//			$user->photo_url = asset('img/user' . $user->id . '.jpg');
            return $user;// return object user
        }
        return false;
    }

    public static function getUserByEmail($email)
    {
        $user = User::where('email',$email)->first();
        if(isset($user)){
            return $user;
        }
        return false;
    }

    public static function isCorrectPassword($new_password, $password){
        if( Hash::check($password , $new_password) ){ return 1; } else{ return 0; }
    }

    public static function getUserById($id){
        $user = User::where('id' , $id)->first();
        if(isset($user)){
//			$user->photo_url = asset('img/user' . $user->id . '.jpg');
			return $user;
		}
        return false;
    }

    public function scopeMembers($query , $full_name)
    {
        if( trim($full_name) != "" )
        {
            return $query
					->where( 'full_name' , 'LIKE' , "$full_name%" )
					->orWhere( 'full_name' , 'LIKE' , "% $full_name%" );
        }
    }

    public static function registerGoogleAccount($fullname, $mail)
    {
        $user = new User;
        $user->full_name = $fullname;
        $user->email = $mail;
        $username = explode('@', $user->email);
        $user->username = $username[0];
        $user->password = '';
        $user->save();
    }

    public function groups(){
        return $this->belongsToMany('App\Group');
    }

    public function meets(){
        return $this->belongsToMany('App\Meet');
    }
}
