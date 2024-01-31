<?php

namespace App\Http\Controllers;

use App\Models\Titulacion;
use Illuminate\Http\Request;

class TitulacionesController extends Controller
{
    function show(Titulacion $titulacion){
        return view('titulaciones.show', ['titulacion' => $titulacion]);
    }
}
