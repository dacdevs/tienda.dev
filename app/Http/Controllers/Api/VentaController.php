<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Carrito;
use Illuminate\Support\Facades\Validator;
use App\Tarjeta;
use App\Direccion;
use App\VentaDetalle;
use App\Venta;

/**
 * @group Ventas
 *
 * API para ventas
 */
class VentaController extends Controller
{

    /**
     * Agregar
     *
     * Crear nueva venta
     *
     * @bodyParam cliente_id int required Id del cliente
     * @bodyParam tarjeta_id int required Id de la tarjeta
     * @bodyParam total decimal required Precio total de venta realizada
     */
    public function postAgregar(Request $request){
        $validator = Validator::make($request->all(),[
            "cliente_id" => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 500,
                "message" => "Ha ocurrido un error de validación",
                "errors" => $validator->errors(),
            ], 500);
        }


        $venta = new Venta();
        $venta->cliente_id = $request->input("cliente_id");
        $venta->tarjeta_id = $request->input("tarjeta_id");
        $venta->monto = $request->input("total");

        if($venta->save()){

            $carrito = Carrito::where("cliente_id",$request->input("cliente_id"))->get();
            foreach($carrito as $c){
                $ventadetalle = new VentaDetalle();
                $ventadetalle->venta_id = $venta->id;
                $ventadetalle->producto_id = $c->producto_id;
                $ventadetalle->cantidad = $c->cantidad;
                $ventadetalle->precio = $c->precio;
                $ventadetalle->save();

                $c->delete();
            }

            return response()->json([
                "status" => 200,
                "message" => "Venta finalizada satisfactoriamente",
            ],200);

        }

        return response()->json([
            "status" => 500,
            "message" => "Ha ocurrido un error interno",
        ], 500);
    }

}
