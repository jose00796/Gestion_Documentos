<?php

namespace App\Http\Controllers;
use App\Models\valises;
use Illuminate\Http\Request;

class valisesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function consulta()
    {
        $data = valises::all();

        return response()->json($data);
    }

    //INSERTAR NUEVO REGISTRO...
    public function guardar(Request $request)
    {
        $dataValises = new valises();

        $dataValises->valise_name = $request->valise_name;
        $dataValises->id_valise_type = $request->id_valise_type;
        $dataValises->id_location = $request->id_location;
        $dataValises->creation_date = $request->creation_date;
        $dataValises->id_detail_ubic = $request->id_detail_ubic;
        $dataValises->id_status = $request->id_status;
    
        $dataValises->save();

        return response()->json($request);
    }

    public function eliminar($id)
    {
        $dataValises = valises::find($id);

        $dataValises->delete();

        return response()->json("Registro Borrado");
    }

    public function actualizar(Request $request, $id)
    {
        $dataValises = valises::findOrFail($id);

        $dataValises->valise_name = $request->valise_name;
        $dataValises->id_valise_type = $request->id_valise_type;
        $dataValises->id_location = $request->id_location;
        $dataValises->creation_date = $request->creation_date;
        $dataValises->id_detail_ubic = $request->id_detail_ubic;
        $dataValises->id_status = $request->id_status;

        $dataValises->save();

        return response()->json("Registro Actualizado");
    }
}