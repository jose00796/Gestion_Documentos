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
