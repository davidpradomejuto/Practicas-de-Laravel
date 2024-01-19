<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Exception;
use Illuminate\Support\Str;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return view('animales.index', ['animales' => $animales]);
    }

    public function show(string $animal)
    {

        try {
            $animal = Animal::where('especie', '=', $animal)->firstOrFail();
        } catch (Exception $e) {
            echo ("Error general " . $e->getMessage());
        }

        return view('animales.show', ['animal' => $animal]);
    }

    public function create()
    {
        return view('animales.create');
    }

    public function edit(string $animal)
    {
        try {
            $animal = Animal::where('especie', '=', $animal)->firstOrFail();
        } catch (Exception $e) {
            echo ("Error general" . $e->getMessage());
        }

        return view('animales.edit', ['animal' => $animal]);
    }

    public function store(Request $request)
    {
        $a = new Animal();
        $a->especie = $request->especie;
        $a->slug = Str::slug($request->especie);
        $a->peso = $request->peso;
        $a->altura = $request->altura;
        $a->fechaNacimiento = $request->fechaNacimiento;
        if ($request->hasFile('imagen')) {
            $a->imagen = $request->imagen;
            $path = $request->photo->store('images',uniqid().$request->file('imagen')->extension());
           }
        $a->alimentacion = $request->alimentacion;
        $a->descripcion = $request->descripcion;
        $a->save();
        return redirect()->route('animales.show',['animal' => $a->especie]);

    }
    public function update(Animal $animal, Request $request)
    {
        $animal->especie = $request->especie;
        $animal->slug = Str::slug($request->especie);
        $animal->peso = $request->peso;
        $animal->altura = $request->altura;
        $animal->fechaNacimiento = $request->fechaNacimiento;
        $animal->imagen = $request->imagen;
        $animal->alimentacion = $request->alimentacion;
        $animal->descripcion = $request->descripcion;
        $animal->save();
        return redirect()->route('animales.show',['animal' => $animal->especie]);
    }
}
