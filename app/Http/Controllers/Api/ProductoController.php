<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;

/**
 * @group Producto
 *
 * API para productos
 */
class ProductoController extends Controller
{
    /**
     * Lista
     *
     * Lista de productos
     */
    public function getListar(){
        $productos = Producto::all();
        return response()->json([
            "status" => 200,
            "message" => "Lista",
            "data" => $productos,
        ],200);
    }

    /**
     * Detalle
     *
     * Detalle del producto
     *
     * @queryParam id int required Id del producto
     */
    public function getDetalle($id){
        $producto = Producto::find($id);
        if($producto){
            return response()->json([
                "status" => 200,
                "message" => "Producto encontrado",
                "data" => $producto,
            ],200);
        }

        return response()->json([
            "status" => 500,
            "message" => "Producto no encontrado",
        ],500);
    }

    /**
     * Buscar
     *
     * Buscar un producto por alguna coincidencia
     *
     * @queryParam query string required Texto a buscar
     */
    public function getBuscar(Request $request){
        $productos = Producto::where("nombre","like","%". $request->input("query")."%")->orWhere("descripcion","like","%". $request->input("query")."%")->get();
        return response()->json([
            "status" => 200,
            "message" => "Lista",
            "data" => $productos,
        ],200);
    }
}
