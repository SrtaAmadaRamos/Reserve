<?php

namespace App\Http\Controllers;

use App\Data\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Collection\Collection;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        if($this->autenticado())
            return redirect('/');

        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ], [
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Insira um email válido.',
            'senha.required' => 'A senha é obrigatória.'
        ]);

        $dados = $request->all(['email', 'senha']);

        $usuario = Usuario::query()->where('email', $dados['email'])->first();
        if($usuario == null) {
            return back()->withErrors([
                'email' => 'Usuário ou senha incorretos',
            ]);
        }

        if(!Hash::check($dados['senha'], $usuario->senha)) {
            return back()->withErrors([
                'email' => 'Usuário ou senha incorretos',
            ]);
        }

        $request->session()->put('autenticado', true);
        $request->session()->put('id', $usuario->id);
        $request->session()->put('nome', $usuario->nome);
        $request->session()->put('email', $usuario->email);

        return redirect('/');
    }

    //public function registrar()
    //{
    //    return view('auth.registrar');
    //}

    public function logout()
    {
        request()->session()->invalidate();
        return redirect('/auth/login');
    }
}
