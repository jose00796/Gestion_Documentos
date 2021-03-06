<?php

namespace App\Http\Controllers;
use App\Models\folders;
use Illuminate\Http\Request;

class foldersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function consulta()
    {
        $data = folders::all();

        return response()->json($data);
    }

    public function ver($id)
    {
        $dataFolders = new folders();
        $datosEncontrados = $dataFolders->find($id);

        return response()->json("$datosEncontrados");
    }

    //INSERTAR NUEVO REGISTRO...
    public function guardar(Request $request)
    {
        $dataFolders = new folders();

        $this->validate($request,[
            'folder_name' => 'required',
            'id_type_folder' => 'required',
            'id_source' => 'required',
            'creation_date' => 'required',
            'id_status_folder' => 'required',
            'id_detail_ubic' => 'required',
            'id_valise' => 'required'
        ]);

        $dataFolders->folder_name = $request->folder_name;
        $dataFolders->id_type_folder = $request->id_type_folder;
        $dataFolders->id_source = $request->id_source;
        $dataFolders->creation_date = $request->creation_date;
        $dataFolders->id_status_folder = $request->id_status_folder;
        $dataFolders->id_detail_ubic = $request->id_detail_ubic;
        $dataFolders->id_valise = $request->id_valise;
        //$dataFolders->id_status = $request->id_status;

        $dataFolders->save();

        return response()->json($request);
    }

    public function eliminar($id)
    {
        $dataFolders = folders::find($id);

        $dataFolders->delete();

        return response()->json("Registro Borrado");
    }

    public function actualizar(Request $request, $id)
    {
        $dataFolders = folders::findOrFail($id);

        $dataFolders->folder_name = $request->folder_name;
        $dataFolders->id_type_folder = $request->id_type_folder;
        $dataFolders->id_source = $request->id_source;
        $dataFolders->creation_date = $request->creation_date;
        $dataFolders->id_status_folder = $request->id_status_folder;
        $dataFolders->id_detail_ubic = $request->id_detail_ubic;
        $dataFolders->id_valise = $request->id_valise;

        $dataFolders->save();

        return response()->json("Registro Actualizado");
    }
}