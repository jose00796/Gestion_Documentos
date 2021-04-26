<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class usersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function consulta()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function ver($id)
    {
        $dataUsers = new User();
        $dataUsersEncontrados = $dataUsers->find($id);

        return response($dataUsersEncontrados);
    }

    public function eliminar($id)
    {
        $dataUsers = User::find($id);

        $dataUsers->delete();

        return response()->json("Usuario Borrado");
    }

    public function actualizar(Request $request, $id)
    {
        $dataUsers = User::findOrFail($id);
        
        $dataUsers->user_name = $request->user_name;
        $dataUsers->password = $request->password;

        $dataUsers->save();

        return response()->json("Usuario Actualizado");
    }


     /*-------------------Por Si Acaso:-----------------

     public function UserInsert(Request $request)
    {
        $input = $request->all();

        $input['password'] = Hash::make($request->password); //Permite Cifrar la Contraseña

        User::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro exitoso'
        ]);
    }*/
}
