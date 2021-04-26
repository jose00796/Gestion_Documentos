<?php

namespace App\Http\Controllers;
use App\Models\documents;
use Illuminate\Http\Request;
class documentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function consulta()
    {
        $data = documents::all();

        return response()->json($data);
    }

    public function ver($id)
    {
        $dataDocuments = new documents();
        $datosEncontrados = $dataDocuments->find($id);

        return response()->json("$datosEncontrados");
    }

    //INSERTAR NUEVO REGISTRO...
    public function guardar(Request $request)
    {
        $dataDocuments = new documents();

        $this->validate($request,[
            'comunication_number' => 'required',
            'entry_number' => 'required',
            'enter_date' => 'required',
            'comunication_date' => 'required',
            'annexed' => 'required',
            'subject' => 'required',
            'cod_reason' => 'required',
            'observation' => 'required',
            'id_status' => 'required',
            'id_answer' => 'required',
            'id_folder' => 'required',
            'id_souce' => 'required'
        ]);

        $dataDocuments->comunication_number = $request->comunication_number;
        $dataDocuments->entry_number = $request->entry_number;
        $dataDocuments->enter_date = $request->enter_date;
        $dataDocuments->comunication_date = $request->comunication_date;
        $dataDocuments->annexed = $request->annexed;
        $dataDocuments->subject = $request->subject;
        $dataDocuments->cod_reason = $request->cod_reason;
        $dataDocuments->observation = $request->observation;
        $dataDocuments->id_status = $request->id_status;
        $dataDocuments->id_answer = $request->id_answer;
        $dataDocuments->id_folder = $request->id_folder;
        $dataDocuments->id_source = $request->id_source;

        $dataDocuments->save();

        return response()->json($request);
    }

    public function eliminar($id)
    {
        $dataDocuments = documents::find($id);

        $dataDocuments->delete();

        return response()->json("Registro Borrado");
    }

    public function editar($id)
    {
        $dataDocuments = documents::findOrDail($id);
        return response()->json($dataDocuments);
    }

    public function actualizar(Request $request, $id)
    {
        $dataDocuments = documents::findOrFail($id);

        $dataDocuments->comunication_number = $request->comunication_number;
        $dataDocuments->entry_number = $request->entry_number;
        $dataDocuments->enter_date = $request->enter_date;
        $dataDocuments->comunication_date = $request->comunication_date;
        $dataDocuments->annexed = $request->annexed;
        $dataDocuments->subject = $request->subject;
        $dataDocuments->cod_reason = $request->cod_reason;
        $dataDocuments->observation = $request->observation;
        $dataDocuments->id_status = $request->id_status;
        $dataDocuments->id_answer = $request->id_answer;
        $dataDocuments->id_folder = $request->id_folder;
        $dataDocuments->id_source = $request->id_source;

        $dataDocuments->save();
        
        //return redirect('documents');
        return response()->json('Registro actualizado');

        /*$dataDocuments->fill($request->all());
        $dataDocuments->save();*/
    }

    //
}