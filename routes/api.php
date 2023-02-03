<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ruta que voy a utilizar para recibir peticiones sobre un usuario desde el cliente
Route::post('login',[LoginController::class,'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/',function(){
    return 'Este es una api de prueba';
});


//Endpoint de registro de usuarios
Route::post('register',[RegisterController::class,'store'])->name('api.v1.register');

Route::get('categories',[CategoryController::class,'index'])->name('api.v1.categories.index'); // ruta para mostrar todas las categorias q se tiene en la BD
Route::post('categories',[CategoryController::class,'store'])->name('api.v1.categories.store'); // ruta que recibe las peticiones de tipo post
Route::get('categories/{category}',[CategoryController::class,'show'])->name('api.v1.categories.show'); // ruta que recibe un parametro por la url
Route::put('categories/{category}',[CategoryController::class,'update'])->name('api.v1.categories.update'); // ruta que actualiza una categoria
Route::delete('categories/{category}',[CategoryController::class,'destroy'])->name('api.v1.categories.delete'); // ruta que elimina una categoria


//Route::apiResource('categories',Api\CategoryController::class)->names('api.v1.categories');

//para hacerle saber que el archivo PostController esta en la carpeta Api
Route::apiResource('posts',Api\PostController::class)->names('api.v1.posts');