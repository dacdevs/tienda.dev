<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Producto;
use App\Venta;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class VentaController extends Controller
{

    private $data = array();

    public function __construct()
    {
        $this->data["ruta"] = "ventas";
        $this->data["entidad"] = "Venta";
    }

    public function index(Request $request){
        $dataList = Venta::all();
        if($request->has("lista") && $request->input("lista") == "archivados"){
            $dataList = Venta::onlyTrashed()->get();
        }

        $this->data["dataList"] = $dataList;
        return view( $this->data["ruta"] .".lista")->with($this->data);
    }

    public function getReporte(Request $request){
        $dataList = Venta::all();
        $this->data["dataList"] = $dataList;
        return view( $this->data["ruta"] .".reporte")->with($this->data);
    }

    public function create(){
        return view( $this->data["ruta"] .".crear");
    }

    public function edit($id,Request $request){
        $data["object"] = Venta::withTrashed()->where("id", $id)->first();
        if($request->has("accion")){
            $data["object"]->restore();
            return redirect()->route($this->data["ruta"] .".index")->with([
                "status" => true,
                "message" => $this->data["entidad"] ." restaurada correctamente"
            ]);
        }
        return view($this->data["ruta"] .".crear")->with($data);
    }

    public function destroy($id,Request $request){
        $object = Venta::withTrashed()->where("id", $id)->first();

        if($request->has('eliminar')){
            $object->forceDelete();
        }else{
            $object->delete();
        }

        return redirect()->route($this->data["ruta"] .".index")->with([
            "status" => true,
            "message" =>  $this->data["entidad"] ." eliminada correctamente"
        ]);
    }
}
