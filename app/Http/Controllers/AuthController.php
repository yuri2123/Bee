<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(){
        $users = User::all();
        return response()->json([
          'message' => 'success',
          'info' => 'Lista de usuarios',
          'Usuario' => $users,
        
        ],200);
        }
    
    public function register(RegisterRequest $request){
        $user = new User();
        $user-> name = $request ->  name;
        $user-> last_name = $request -> last_name;
        $user-> email = $request ->  email;
        $user-> direccion = $request -> direccion;
        $user-> telefono = $request -> telefono;
        $user-> password =Hash::make($request->password);
        //$user-> password_confirmation = Hash::make($request -> password_confirmation);

        $user->save();
        if (Auth::attempt($request->only('email','password'))) {
            return response()->json([
                'message'=>'Usuario creado',
                //'token'=>$request->user()->createToken($request->email)->plainTextToken,
                'Usuario' => $user,
            ],201);
        }
    }


    public function login(Request $request){
        $request->validate([
          'email' => 'required|email',
          'password' => 'required'
        ]);
        
              // ! negamos el Auth si los datos no coinciden, devolviendo un msg no esta autorizado
              if (!Auth::attempt($request-> only('email','password'))) {
                return response()->json([
                    'message'=> 'Los datos no coinciden',
                    'success'=> false
            ], 200);
          
          }
            
        
            //verifico si el usuario tiene un token  creado, si es asi procedo a eliminar 
            //procedo a crear un nuevo token 
        
            $userToken = Token::where('name', $request-> email)->first();
            if ($userToken){
                $userToken->delete();
            }
        
            return response()->json([
                'success' => true,
                'info'=> 'Inicio de sesion exitoso',
                'token' => $request -> user()->createToken($request->email)->plainTextToken,
            ], 200);
}

public function logout(Request $request){
    $request-> user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'cerraste sesion exitosamente'
    ],400);
}

public function userProfile($id){
$user = User::find($id);

    return response()->json([
      'info'=> 0,
      'message'=> 'Perfil de usuario',
      'datos'=> $user
]);
  }

}