<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Redirector;
use google\apiclient\src\Google\Client;
use google\apiclient\src\Google\Service\Calendar;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function logout(){
        session_start();
        if( isset( $_SESSION['key'] ) ){
            session_unset();
            session_destroy();
            return view('index');
        }else{
            return view('index');
        }
    }

    public function login(Request $request)
    {
        session_start();
        if ( User::isUserExists($request->input_username) )
        {
            $user = User::getUserByUsername($request->input_username);
            if ( User::isCorrectPassword( $user->password , $request->input_password ) ) {
                $_SESSION['key'] = $user->id;
                return redirect('dashboard');

            }else{ return redirect('login'); }
        }
        return redirect('login');
    }

    public function loginSocial($email)
    {
        session_start();
        $user = User::getUserByEmail($email);
        $_SESSION['key'] = $user->id;
        return redirect('dashboard');
    }

}
