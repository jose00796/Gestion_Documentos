<?php

namespace App\Http\Controllers;
use App\Models\external_sources;
use Illuminate\Http\Request;

class external_sourcesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function consulta()
    {
        $dataSource = external_sources::all();

        return response()->json($dataSource);
    }

    public function ver($id)
    {
        $dataSource = new external_sources();
        $datosEncontrados = $dataSource->find($id);

        return response()->json("$datosEncontrados");
    }

    public function guardar(Request $request)
    {
        $dataSource = new external_sources();

        $dataSource->entity = $request->entity;

        $dataSource->save();
        
        return response()->json($dataSource);
    }

    public function eliminar($id)
    {
        $dataSource = external_sources::find($id);

        $dataSource->delete();

        return response()->json("Registro Borrado");
    }

    public function actualizar(Request $request, $id)
    {
        $dataSource = external_sources::findOrFail($id);

        $dataSource->entity = $request->entity;

        $dataSource->save();

        return response()->json('Registro Actualizado');
    }

    //
}