<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ControllerMail;
use App\Http\Controllers\TiendaController;

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

Route::resource('productos',ProductoController::class);
Route::resource('tiendas',TiendaController::class);

Route::get('/',  function () {
    return view('secciones.inicio');
} )->name('home')  ;

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ruta al enviar correo
//Route::post('/send', 'ControllerMail@send');
Route::get('/send', [ControllerMail::class,'send']);
?>
