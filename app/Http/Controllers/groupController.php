<?php

namespace App\Http\Controllers;

use App\Grupo;
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
        Grupo::crearGrupo($request);
        return view('dashboard');
    }

}
