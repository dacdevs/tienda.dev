<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Cliente;

/**
 * @group Cliente
 *
 * API's para el cliente
 */
class ClienteController extends Controller
{

    /**
     * Login
     *
     * Inicio de sesión de usuarios
     *
     * @bodyParam email string required Email del cliente
     * @bodyParam password string required Password del cliente
     */
    public function postLogin(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => "required|email|max:150",
            "password" => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 500,
                "message" => "Usuario/Contraseña incorrectos",
                "errors" => $validator->errors(),
            ], 500);
        }

        $user = Cliente::where("email","=",$request->input("email"))->first();

        if($user){
            if(Hash::check($request->input("password"),$user->password)){
                return response()->json([
                    "status" => 200,
                    "message" => "Usuario correcto",
                    "data" => $user,
                ],200);
            }
        }

        return response()->json([
            "status" => 500,
            "message" => "Usuario/Contraseña incorrectos",
        ], 500);
    }

    /**
     * Registro
     *
     * Registro de clientes
     *
     * @bodyParam nombre string required Nombres del cliente
     * @bodyParam apellido string required Apellidos del cliente
     * @bodyParam direccion string required Dirección del cliente
     * @bodyParam telefono string required Teléfono del cliente
     * @bodyParam email string required Email del cliente
     * @bodyParam password string required Password del cliente
     */
    public function postRegistro(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => "required|email|max:150|unique:clientes",
            "nombre" => "required|max:50",
            "password" => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 500,
                "message" => "Ha ocurrido un error de validación",
                "errors" => $validator->errors(),
            ], 500);
        }

        $cliente = new Cliente();
        $cliente->nombre = $request->input("nombre");
        $cliente->apellido = $request->input("apellido");
        $cliente->email = $request->input("email");
        $cliente->direccion = $request->input("direccion");
        $cliente->telefono = $request->input("telefono");
        $cliente->password = Hash::make($request->input("password"));

        if($cliente->save()){
            return response()->json([
                "status" => 200,
                "message" => "Cliente registrado correctamente",
                "data" => $cliente,
            ],200);
        }

        return response()->json([
            "status" => 500,
            "message" => "Ha ocurrido un error interno",
        ], 500);
    }

    /**
     * Editar cliente
     *
     * Editar datos del cliente
     *
     * @bodyParam id int required Id del cliente
     * @bodyParam nombre string required Nombres del cliente
     * @bodyParam apellido string required Apellidos del cliente
     * @bodyParam direccion string required Dirección del cliente
     * @bodyParam telefono string required Teléfono del cliente
     * @bodyParam password string opcional Password del cliente
     */
    public function postEditar(Request $request){
        $validator = Validator::make($request->all(),[
            "nombre" => "required|max:50",
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 500,
                "message" => "Ha ocurrido un error de validación",
                "errors" => $validator->errors(),
            ], 500);
        }

        $cliente = Cliente::find($request->input("id"));
        if($cliente){
            $cliente->nombre = $request->input("nombre");
            $cliente->apellido = $request->input("apellido");
            $cliente->direccion = $request->input("direccion");
            $cliente->telefono = $request->input("telefono");
            if($request->has("password")){
                $cliente->password = Hash::make($request->input("password"));
            }

            if($cliente->save()){
                return response()->json([
                    "status" => 200,
                    "message" => "Cliente actualizado correctamente",
                    "data" => $cliente,
                ],200);
            }
        }

        return response()->json([
            "status" => 500,
            "message" => "Ha ocurrido un error interno",
        ], 500);
    }

    /**
     * Detalle del cliente
     *
     * Leer los datos de un cliente
     *
     * @queryParam id int required Id del cliente
     */
    public function getCliente($id){
        $cliente = Cliente::find($id);
        if($cliente){
            return response()->json([
                "status" => 200,
                "message" => "Cliente encontrado",
                "data" => $cliente,
            ],200);
        }

        return response()->json([
            "status" => 500,
            "message" => "Cliente no encontrado",
        ], 500);
    }




}
