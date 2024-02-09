<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LogicException;
use PDOException;

class RestWebServiceController extends Controller
{
    function index()
    {
        $animales=Animal::all();
        return response()->json($animales);
    }
    function show(Animal $animal)
    {
        return response()->json($animal);

    }

    function destroy(Animal $animal){
        try {
            if($animal->delete()){
                return response()->json(['success' => "Animal borrado"]);
            }
        } catch (LogicException $e) {
            return response()->json(['error' => "Error al borrar un animal"]);
        }
        return response()->json(['error' => "Error al borrar un animal"]);

    }

    function store(Request $request)
    {

        $a = new Animal();
        $a->especie = $request->especie;
        $a->slug = str::slug($request->especie);
        $a->peso = $request->peso;
        $a->altura = $request->altura;
        $a->fechaNacimiento = $request->fechaNacimiento;
        $a->alimentacion = $request->alimentacion;
        $a->descripcion = $request->descripcion;
        $a->save();
    }
}
