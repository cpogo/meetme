<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class groupController extends Controller
{

    public function index()
    {
        return view ("newgroup");
    }

    public function store(Request $request)
    {
        Group::crearGrupo($request);
        return view('dashboard');
    }

}
