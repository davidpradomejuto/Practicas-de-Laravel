<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
        public function index(){
        $animales = Animal::all();
        return view('animales.index', ['animales'=>$animales]);
    }

    public function show(string $animal){

        $animal = Animal::where('especie', '=', $animal)->first();

        return view('animales.show', ['animal'=>$animal]);
    }

    public function create(){
        return view('animales.create');
    }

    public function edit(string $animal){

        $animal = Animal::where('especie', '=', $animal)->first();

        return view('animales.edit', ['animal'=>$animal]);
    }


}
