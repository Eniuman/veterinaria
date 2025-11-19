<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        $titulo_pagina = 'Login de Usuario';
        return view('modules.login.index', compact('titulo_pagina'));
    }

        public function logear(Request $request){
                // Buscar usuario por email
                $user = User::where('email', $request->email)->first();

                // Si no existe
                if (!$user) {
                    return back()->withErrors(['email' => 'Credenciales incorrectas']);
                }

                // Validar si está deshabilitado
                if ($user->activo == 0) {
                    return back()->withErrors(['email' => 'Tu cuenta está deshabilitada.']);
                }

                // Intentar login
                $credenciales = [
                    'email' => $request->email,
                    'password' => $request->password
                ];

                if (Auth::attempt($credenciales)) {
                    return to_route('home');
                }

                return back()->withErrors(['email' => 'Credenciales incorrectas']);
            }
        public function cambiarEstado($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->activo = $request->activo; // 1 o 0
        $user->save();

        return response()->json([
            'success' => true,
            'estado' => $user->activo
        ]);
    }
    public function registro(){
        $titulo_pagina = 'Registro de Usuario';
        return view('modules.login.registro', compact('titulo_pagina'));
    }
    public function registrar(Request $request){
        $item =new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->save();
        return to_route('login');
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login');
    }
    public function home(){
        $titulo_pagina = 'Home';
        return view('modules.home.home', compact('titulo_pagina'));
    }
    public function usuarios(){
    $titulo_pagina = 'Gestión de Usuarios';
    $items = User::paginate(10); // <- aquí obtienes los usuarios
    return view('modules.usuarios.index', compact('titulo_pagina', 'items'));
    }
    public function show($id){
    $titulo_pagina = 'Detalle de Usuario';
    $item = User::findOrFail($id); // busca el usuario por su ID

    return view('modules.usuarios.show', compact('titulo_pagina', 'item'));
}
public function edit(string $id)
{
    $titulo_pagina = 'Editar Usuario';
    $item = User::findOrFail($id);
    return view('modules.usuarios.edit', compact('item', 'titulo_pagina'));
}
public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    $item = User::findOrFail($id);
    $item->name = $request->name;
    $item->email = $request->email;
    $item->save();

    return to_route('usuarios')->with('success', 'Usuario actualizado correctamente');
}
        public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();
        return to_route('index');
    }
}
