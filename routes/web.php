<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\CriptoPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/grupo', function () {
    return view('grupo');
});

Route::get('/pessoas', function () {
    return view('pessoas');
});

Route::post('api/pessoas', [CrudController::class, 'select']);

Route::post('api/pessoas/inserir', [CrudController::class, 'inserir']);

Route::post('api/pessoas/deletar', [CrudController::class, 'deletar']);

Route::post('api/pessoas/update', [CrudController::class, 'update']);