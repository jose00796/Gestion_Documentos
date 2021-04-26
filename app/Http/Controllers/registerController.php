<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class registerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function register(Request $request)
     {
        $data = $request->all();

        //Validamos los datos
        $this->validate($request, [
            'user_name' => 'required',
            'password' => 'required',
            'ced' => 'required',
            'id_rol' => 'required',
            'v_e' => 'required',
        ]);

        //Ciframos el Password
        $data['password'] = Crypt::encrypt($data['password']);

        //creamos un nuevo Usuario
        $user = User::create($data);
        return response()->json(['status' => 'success', 'data' => $user]);   
        
        // CODIGO ALTERNATIVO TAMBIEN FUNCIONA LOCO...

       /* $data = new User();

        $data->id = $request->id;
        $data->user_name = $request->user_name;
        $data->password = $request->password;
        $data->ced = $request->ced;
        $data->id_rol = $request->id_rol;
        $data->v_e = $request->v_e;

        $data['password'] = Crypt::encrypt($data['password']);

        $data->save();

        return response()->json($request);*/
     }
}