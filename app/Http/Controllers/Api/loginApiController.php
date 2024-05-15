<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class loginApiController extends Controller
{
    public function login(Request $request)
    {
        // Obtener el correo electrónico y la contraseña del cuerpo de la solicitud
        $email = $request->input('email');
        $password = $request->input('password');

        // Buscar el usuario en la base de datos por su correo electrónico
        $user = User::where('email', $email)->first();

        // Verificar si se encontró un usuario con el correo electrónico proporcionado
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Verificar si la contraseña proporcionada coincide con la contraseña almacenada en la base de datos
        if (Hash::check($password, $user->password)) {
            // Si las contraseñas coinciden, devuelve el usuario autenticado
            return response()->json(['user' => $user], 200);
        } else {
            // Si las contraseñas no coinciden, devuelve un mensaje de error
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
  /*  public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (User::attempt($credentials)) {
            // Autenticación exitosa, devuelve el usuario autenticado
            return response()->json(['user' => User::user()], 200);
        } else {
            // Autenticación fallida, devuelve un error
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }*/
   }
}
