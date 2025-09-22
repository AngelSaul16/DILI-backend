<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class usuarioController extends Controller
{
    //
    public function index()
    {
        $usuarios = Usuario::all();
        if($usuarios->isEmpty()){
            return response()->json(['message' => 'No se encontraron usuarios'], 404);
        }
        return response()->json($usuarios, 200);
    }

    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        if(!$usuario){
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($usuario, 200);
    }
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if(!$usuario){
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado'], 200);
    }
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if(!$usuario){
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        $usuario->update($request->all());
        return response()->json($usuario, 200);
    }
}
