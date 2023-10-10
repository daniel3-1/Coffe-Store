<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
 
class ClienteController extends Controller
{
    public function index(){

        $productos = Cliente::all();
        if($productos -> count() > 0){
            return response()->json([
                'status' => 200, 
                'productos' => $productos
            ], 200);
        }else {
            return response() -> json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre_producto' => 'required|string|max:191',
            'cantidad' => 'required|numeric|max:10000',
            'precio' => 'required|numeric|max:100000',
        ]
    );

    if($validator->fails()){

        return response()->json([
            'status' => 422,
            'errors' => $validator->messages()
        ], 422);
    }else{
        $productos = Cliente::create([
            'nombre_producto' => $request->nombre_producto,
            'cantidad' => $request->cantidad,    
            'precio' => $request->precio,
        ]);

            if($productos){

                return response()->json([
                    'status' => 200,
                    'message' => "Producto Creado Satisfactoriamente"
                ], 200);
            }else{

                return response()->json([
                    'status' => 500, 
                    'message' =>  "Algo Salió Mal!"
                ], 500);
            }
        }
    }

    public function show($id) {

        $producto = Cliente::find($id);

        if($producto){
            return response()->json([
                'status' => 200, 
                'cliente' =>  $producto
            ], 200);
        }else{
            return response()->json([
                'status' => 404, 
                'message' =>  "No Fue Encontrado Este Producto!"
            ], 404);
        }
    }

    public function edit($id){

        $producto = Cliente::find($id);

        if($producto){
            return response()->json([
                'status' => 200, 
                'producto' =>  $producto
            ], 200);
        }else{
            return response()->json([
                'status' => 404, 
                'message' =>  "No Such Studen Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id){

        $validator = Validator::make($request->all(),[
            'nombre_producto' => 'required|string|max:191',
            'cantidad' => 'required|numeric|max:10000',
            'precio' => 'required|numeric|max:100000',
        ]
    );

    if($validator->fails()){

        return response()->json([
            'status' => 422, 
            'errors' => $validator->messages()
        ], 422);
    }else{

        $producto = Cliente::find($id); 
            if($producto){

                $producto -> update([
                    'nombre_producto' => $request->nombre_producto,
                    'cantidad' => $request->cantidad,    
                    'precio' => $request->precio,
                ]);

                return response()->json([
                    'status' => 200, 
                    'message' =>  "Product Updated Succesfully"
                ], 200);
            }else{

                return response()->json([
                    'status' => 404, 
                    'message' =>  "No Such Product Found!"
                ], 404);
            }
        }
    }

    public function destroy($id){
        $producto = Cliente::find($id);

        if($producto){

            $producto -> delete();
            return response()->json([
                'status' => 200, 
                'message' =>  "Product Deleted Succesfully!"
            ], 200);
        }else{
            return response()->json([
                'status' => 404, 
                'message' =>  "No Such Product Found!"
            ], 404);
        }
    }
}
