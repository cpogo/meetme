<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    public function googleAuth()
    {
        session_start();
        $user = Socialite::driver('google')->user();
        $newUser = User::getUserByEmail($user->email);
        if( !$newUser )
        {
            User::registerGoogleAccount($user->name, $user->email);
            return redirect()->route('loginSocial', $user->email);
        }
        else
        {
            $_SESSION['key'] = $newUser->id;
            return redirect('dashboard');
        }
    }

    public function signIn()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        //User::createUser($request);
        $email = $request->input_email;
        Mail::send( 'email.bienvenido' , ['name'=>$request->input_name] , function($msj) use($email){
            $msj->to($email , 'Grupo Meetme')->from('metacris93@gmail.com')->subject('Welcome to MeetMe');
            /*OJO EN EL FROM COLOQUEN SUS CORREOS DE GMAIL*/
        });
        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
