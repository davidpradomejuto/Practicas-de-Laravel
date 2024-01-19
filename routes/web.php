<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', InicioController::class)->name('inicio');

Route::get('animales', [AnimalController::class,'index'])->name('animales.index');

Route::post('animales',[AnimalController::class,'store'])->name('animales.store');

Route::get('animales/crear', [AnimalController::class,'create'])->name('animales.create');


Route::get('animales/{animal}',[AnimalController::class,'show'])->name('animales.show');

Route::put('animales/{animal}',[AnimalController::class,'update'])->name('animales.update');


Route::get('animales/{animal}/editar', [AnimalController::class,'edit'])->name('animales.edit');

/*Route::controller(AnimalController::class)->group(function()
{
    Route::get('/animales',"animales.index")->name("animales.index");
W
    Route::get('/animales/crear',"animales.create")->name("animales.create");

    Route::get('/animales/{animales}',"animales.show")->name("animales.show");

    Route::get('/animales/{animal}/editar',"animales.edit")->name("animales.edit");
});*/
