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

    public function guardar(Request $request)
    {
        $dataDocuments = new documents();

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

    //
}