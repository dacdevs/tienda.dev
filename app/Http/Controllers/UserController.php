<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    private $data = array();

    public function __construct()
    {
        $this->data["ruta"] = "usuarios";
        $this->data["entidad"] = "Usuario";
    }

    public function index(Request $request){
        $dataList = User::all();
        $this->data["dataList"] = $dataList;
        return view( $this->data["ruta"] .".lista")->with($this->data);
    }

    public function create(){
        return view( $this->data["ruta"] .".crear");
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "nombre"=>"required|max:100",
            "email"=>"required|email",
        ]);

        if($validator->fails()){
            return redirect()->back()->with(array(
                "status"    =>  false,
                "errors"    =>  $validator->messages(),
            ));
        }

        $object = new User();
        if($request->has("id")){
            $object = User::find($request->get("id"));
        }
        $object->nombre = $request->input("nombre");
        $object->email = $request->input("email");
        $object->tipo = 1;
        if($request->has('password')){
            $object->password = Hash::make($request->input('password'));
        }

        if($object->save()){
            return redirect()->route($this->data["ruta"] .".index");
        }

        return redirect()->back()->with(array(
            "status"    =>  false,
            "errors"    =>  null,
            "message"   =>  "Error al crear",
        ));
    }

    public function edit($id,Request $request){
        $data["object"] = User::where("id", $id)->first();
        return view($this->data["ruta"] .".crear")->with($data);
    }

    public function destroy($id,Request $request){
        $object = User::where("id", $id)->first();

        $object->delete();

        return redirect()->route($this->data["ruta"] .".index")->with([
            "status" => true,
            "message" =>  $this->data["entidad"] ." eliminado correctamente"
        ]);
    }
}
