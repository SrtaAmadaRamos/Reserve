<?php

namespace App\Http\Controllers;

use App\Data\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Collection\Collection;

class AuthController extends Controller
{
    private Collection $usuarios;

    public function __construct()
    {
        $this->usuarios = new Collection(Usuario::class);
        $this->popularUsuarios();
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

        $usuarios = $this->usuarios->where('email', $dados['email']);
        if($usuarios->isEmpty()) {
            return back()->withErrors([
                'email' => 'Usuário ou senha incorretos',
            ]);
        }

        $usuario = $usuarios->first();
        if(!Hash::check($dados['senha'], $usuario->senha)) {
            return back()->withErrors([
                'email' => 'Usuário ou senha incorretos',
            ]);
        }

        $request->session()->put('autenticado', true);
        $request->session()->put('nome', $usuario->nome);

        return redirect('/');
    }

    public function registrar()
    {
        return view('auth.registrar');
    }

    public function logout()
    {
        request()->session()->invalidate();
        return redirect('/auth/login');
    }

    private function popularUsuarios(): void
    {
        $usuario1 = new Usuario();
        $usuario1->id = 1;
        $usuario1->nome = "Fulano de Tal";
        $usuario1->email = "fulano.tal@email.com";
        $this->usuarios->add($usuario1);

        $usuario2 = new Usuario();
        $usuario2->id = 2;
        $usuario2->nome = "Cricrano de Tal";
        $usuario2->email = "cicrano.tal@email.com";
        $this->usuarios->add($usuario2);

        $this->usuarios->map(fn ($usuario) => $usuario->senha = Hash::make($usuario->email));
    }
}
