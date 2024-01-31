<?php

namespace App\Http\Controllers;

use App\Models\Cuidador;
use Illuminate\Http\Request;

class CuidadoresController extends Controller
{
    function show(Cuidador $cuidador){
        return view('cuidadores.show', ['cuidador' => $cuidador]);
    }

}
