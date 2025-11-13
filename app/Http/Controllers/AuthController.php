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
        $credenciles = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credenciles)) {
            // Authentication passed...
            return to_route('home');
        }else{
            return to_route('login');
        }
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
        return view('modules.usuarios.index', compact('titulo_pagina'));
    }
}
