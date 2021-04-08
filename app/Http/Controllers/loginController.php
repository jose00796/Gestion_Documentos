<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class loginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function login(Request $request)
    {
        //Validamos el Request:
        $this->validate($request, [
            'user_name' => 'required',
            'password' => 'required',
        ]);

        //Consultamos el Usuario
        $user = User::query()->where('user_name', $request->input('user_name'))->first();

        //Verificacion de Contraseña
        if (Crypt::decrypt($user->password) === $request->input('password')) {
            
            //Generar un string aleatorio para el api_token
            $api_token = Str::random(50);

            //Seteamos el api_token al Usuario
            $user->api_token = $api_token;

            //Guardamos
            $user->save();

            //Retornamos el api_token para futuras peticiones
            return response()->json(['status' => 'success', 'api_token' => $api_token]);
        }else{
            return response()->json(['status' => 'fail'], 401);
        }
    }

    public function logout(Request $request)
    {
        User::where('api_token', $request->input('api_token'))->update(['api_token' => null]);
        return response()->json(['status' => 'success']);
    }
}