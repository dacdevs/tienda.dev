<?php

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
Route::get("imagenes/{carpeta1}/{carpeta2}/{archivo}",function($carpeta1,$carpeta2,$archivo){
    $path = storage_path("app/".$carpeta1."/".$carpeta2."/".$archivo);
    return response()->file($path);
});

Route::get('/', function () {
    return view('admin.login');
});
Route::post("accion/login","AccionController@postLogin")->name("accion.login");

Route::group(['middleware' => ['auth.admin','web']], function () {
    Route::get('/home', function () {
        return view('welcome');
    });

    // Rutas de administración
    Route::resource("productos","ProductoController");
    Route::resource("clientes","ClienteController");
    Route::resource("usuarios","UserController");
    Route::resource("ventas","VentaController");

    //Rutas de reporte
    Route::get("reporte/venta","VentaController@getReporte")->name("reportes.ventas");
    Route::get("reporte/cliente","ClienteController@getReporte")->name("reportes.clientes");
    
    Route::get("accion/logout","AccionController@getLogout")->name("accion.logout");
});
