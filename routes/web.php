<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RevisionesController;
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

Route::get('animales/crear', [AnimalController::class,'create'])->name('animales.create')->middleware('auth');


Route::get('animales/{animal}',[AnimalController::class,'show'])->name('animales.show');

Route::put('animales/{animal}',[AnimalController::class,'update'])->name('animales.update');


Route::get('animales/{animal}/editar', [AnimalController::class,'edit'])->name('animales.edit')->middleware('auth');



Route::get('revisiones/{animal}/crear', [RevisionesController::class,'create'])->name('revisiones.create')->middleware('auth');

Route::post('revisiones', [RevisionesController::class,'store'])->name('revisiones.store');

/*Route::controller(AnimalController::class)->group(function()
{
    Route::get('/animales',"animales.index")->name("animales.index");
W
    Route::get('/animales/crear',"animales.create")->name("animales.create");

    Route::get('/animales/{animales}',"animales.show")->name("animales.show");

    Route::get('/animales/{animal}/editar',"animales.edit")->name("animales.edit");
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
