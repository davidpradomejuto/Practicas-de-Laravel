<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use LogicException;
use PDOException;

class RestWebServiceController extends Controller
{
    function index()
    {
        $animales = Animal::all();
        return response()->json($animales);
    }
    function show(Animal $animal)
    {
        return response()->json($animal);
    }

    function destroy(Animal $animal)
    {
        try {
            if ($animal->delete()) {
                return response()->json("Animal borrado");
            } else {
                throw new Exception('El animal no ha podido ser borrado');
            }
       }catch (Exception $e) {
            return response()->json("Error al borrar el animal: ".$e->getMessage());
       }
    }

    function store(Request $request)
    {
        try {

            //Validatos::validate($request,$rules);
            $validator = Validator::make($request->all(),
            ['especie' => 'required|min:3',
            'altura' => 'required',
            'peso' => 'required',
            'fechaNacimiento' => 'required',
            'imagen' => 'image|mimes:jpg,jpeg,png,svg',]);

            if ($validator->fails()) {
                return response()->json(['errors'=>$validator->errors()]);
            }

            $a = new Animal();
            $a->especie = $request->especie;
            $a->slug = str::slug($request->especie);
            $a->peso = $request->peso;
            $a->altura = $request->altura;
            $a->fechaNacimiento = $request->fechaNacimiento;
            $a->alimentacion = $request->alimentacion;
            $a->descripcion = $request->descripcion;
            $a->save();
            return response()->json("animal $request->especie creado");
        } catch (PDOException $e) {
            return response()->json("Error de PDO al crear un animal" . $e->getmessage());
        } catch (Exception $e) {
            return response()->json("Error al crear un animal" . $e->getmessage());
        }
    }
}
