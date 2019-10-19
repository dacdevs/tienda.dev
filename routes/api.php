<?php

use Illuminate\Http\Request;

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

//API Clientes
Route::post('cliente/login',"Api\ClienteController@postLogin");
Route::post('cliente/registro',"Api\ClienteController@postRegistro");
Route::post('cliente/editar',"Api\ClienteController@postEditar");
Route::get("cliente/{id}","Api\ClienteController@getCliente");

//API Productos
Route::get("producto/listar","Api\ProductoController@getListar");
Route::get("producto/detalle/{id}","Api\ProductoController@getDetalle");
Route::get("producto/buscar","Api\ProductoController@getBuscar");

//API Carrito de compras
Route::get("carrito/listar","Api\CarritoController@getListar");
Route::post("carrito/agregar","Api\CarritoController@postAgregar");
Route::post("carrito/eliminar","Api\CarritoController@postEliminar");

//API de Tarjetas
Route::get("tarjeta/listar","Api\TarjetaController@getListar");
Route::post("tarjeta/agregar","Api\TarjetaController@postAgregar");
Route::post("tarjeta/eliminar","Api\TarjetaController@postEliminar");

//API de Direcciones
Route::get("direccion/{id}","Api\DireccionController@getListar");
Route::post("direccion/actualizar","Api\DireccionController@postAgregar");

//API de Ventas
Route::post("venta/crear","Api\VentaController@postAgregar");

