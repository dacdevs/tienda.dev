<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Carrito;
use Illuminate\Support\Facades\Validator;

/**
 * @group Carrito de compras
 *
 * API para carrito de compras
 */
class CarritoController extends Controller
{
    /**
     * Lista
     *
     * Lista de productos en el carrito de compras
     *
     * @bodyParam cliente_id int required Id del cliente
     */
    public function getListar(Request $request){
        $productos = Carrito::with("producto")->where("cliente_id",$request->input("cliente_id"))->get();
        return response()->json([
            "status" => 200,
            "message" => "Lista",
            "data" => $productos,
        ],200);
    }

    /**
     * Agregar productos
     *
     * Agregar productos al carrito de compras
     *
     * @bodyParam cliente_id int required Id del cliente
     * @bodyParam producto_id int required Id del producto
     * @bodyParam cantidad int required Cantidad de productos
     * @bodyParam precio decimal required Precio calculado
     */
    public function postAgregar(Request $request){
        $validator = Validator::make($request->all(),[
            "cliente_id" => "required",
            "producto_id" => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 500,
                "message" => "Ha ocurrido un error de validación",
                "errors" => $validator->errors(),
            ], 500);
        }

        $carrito = Carrito::where("cliente_id",$request->input("cliente_id"))->where("producto_id",$request->input("producto_id"))->first();
        if(!$carrito){
            $carrito = new Carrito();
            $carrito->cantidad = $request->input("cantidad");
        }else{
            $carrito->cantidad = $carrito->cantidad + $request->input("cantidad");
        }
        $carrito->cliente_id = $request->input("cliente_id");
        $carrito->producto_id = $request->input("producto_id");
        $carrito->precio = $request->input("precio");

        if($carrito->save()){
            return response()->json([
                "status" => 200,
                "message" => "Producto agregado al carrito satisfactoriamente",
            ],200);
        }

        return response()->json([
            "status" => 500,
            "message" => "Ha ocurrido un error interno",
        ], 500);
    }

    /**
     * Eliminar productos
     *
     * Eliminar productos del carrito de compras
     *
     * @bodyParam id int required Id del producto
     */
    public function postEliminar(Request $request){

        $carrito = Carrito::find($request->input("id"));
        if($carrito){
            if($carrito->delete()){
                return response()->json([
                    "status" => 200,
                    "message" => "Producto eliminado del carrito satisfactoriamente",
                ],200);
            }
        }

        return response()->json([
            "status" => 500,
            "message" => "Ha ocurrido un error interno",
        ], 500);
    }
}
