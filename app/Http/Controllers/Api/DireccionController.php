<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Carrito;
use Illuminate\Support\Facades\Validator;
use App\Tarjeta;
use App\Direccion;

/**
 * @group Dirección
 *
 * API para direccion del cliente
 */
class DireccionController extends Controller
{
    /**
     * Leer dirección
     *
     * Leer la dirección de un cliente
     *
     * @queryParam id int required Id del cliente
     */
    public function getListar($id){
        $direccion = Direccion::where("cliente_id",$id)->first();
        return response()->json([
            "status" => 200,
            "message" => "Lista",
            "data" => $direccion,
        ],200);
    }

    /**
     * Actualizar
     *
     * Actualizar la dirección del cliente
     *
     * @queryParam cliente_id int required Id del cliente
     * @queryParam direccion string required Dirección del cliente
     * @queryParam distrito string required Distrito
     * @queryParam direccion_2 string required Segunda linea de dirección del cliente
     * @queryParam referencia string required Referencia de la dirección
     */
    public function postAgregar(Request $request){
        $validator = Validator::make($request->all(),[
            "cliente_id" => "required",
            "direccion" => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 500,
                "message" => "Ha ocurrido un error de validación",
                "errors" => $validator->errors(),
            ], 500);
        }

        $direccion = Direccion::where("cliente_id",$request->input("cliente_id"))->first();
        if(!$direccion){
            $direccion = new Direccion();
        }

        $direccion->cliente_id = $request->input("cliente_id");
        $direccion->direccion = $request->input("direccion");
        $direccion->distrito = $request->input("distrito");
        $direccion->direccion_2 = $request->input("direccion_2");
        $direccion->referencia = $request->input("referencia");

        if($direccion->save()){
            return response()->json([
                "status" => 200,
                "message" => "Dirección actualizada satisfactoriamente",
            ],200);
        }

        return response()->json([
            "status" => 500,
            "message" => "Ha ocurrido un error interno",
        ], 500);
    }

}
