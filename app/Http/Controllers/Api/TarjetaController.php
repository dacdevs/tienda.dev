<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Carrito;
use Illuminate\Support\Facades\Validator;
use App\Tarjeta;

/**
 * @group Tarjetas
 *
 * API para tarjetas
 */
class TarjetaController extends Controller
{

    /**
     * Listar
     *
     * Listar las tarjetas de un cliente
     *
     * @queryParam cliente_id int required Id del cliente
     */
    public function getListar(Request $request){
        $tarjetas = Tarjeta::where("cliente_id",$request->input("cliente_id"))->get();
        return response()->json([
            "status" => 200,
            "message" => "Lista",
            "data" => $tarjetas,
        ],200);
    }

    /**
     * Agregar
     *
     * Agregar nuevas tarjetas
     *
     * @bodyParam cliente_id int required Id del cliente
     * @bodyParam titular string required Nombre del dueño de la tarjeta
     * @bodyParam numero_final string required Cuatro últimos dígitos de la tarjeta
     * @bodyParam tipo string required Marca de la tarjeta (Ej. Visa, Mastercard)
     */
    public function postAgregar(Request $request){
        $validator = Validator::make($request->all(),[
            "cliente_id" => "required",
            "titular" => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 500,
                "message" => "Ha ocurrido un error de validación",
                "errors" => $validator->errors(),
            ], 500);
        }

        $tarjeta = new Tarjeta();
        $tarjeta->cliente_id = $request->input("cliente_id");
        $tarjeta->titular = $request->input("titular");
        $tarjeta->numero_final = $request->input("numero_final");
        $tarjeta->tipo = $request->input("tipo");

        if($tarjeta->save()){
            return response()->json([
                "status" => 200,
                "message" => "Tarjeta agregada satisfactoriamente",
            ],200);
        }

        return response()->json([
            "status" => 500,
            "message" => "Ha ocurrido un error interno",
        ], 500);
    }

    /**
     * Eliminar
     *
     * Eliminar tarjetas del cliente
     *
     * @bodyParam id int required Id de la tarjeta
     */
    public function postEliminar(Request $request){

        $tarjeta = Tarjeta::find($request->input("id"));
        if($tarjeta){
            if($tarjeta->delete()){
                return response()->json([
                    "status" => 200,
                    "message" => "Tarjeta eliminada satisfactoriamente",
                ],200);
            }
        }

        return response()->json([
            "status" => 500,
            "message" => "Ha ocurrido un error interno",
        ], 500);
    }
}
