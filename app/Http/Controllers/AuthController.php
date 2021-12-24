<?php

namespace App\Http\Controllers;

use App\Data\Models\Usuario;
use App\Domain\Interfaces\Services\IUsuarioService;
use App\Http\Requests\Auth\RegistrarRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    private IUsuarioService $usuarioService;

    public function __construct(IUsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function login(): View | RedirectResponse
    {
        if($this->autenticado())
            return redirect('/');

        return view('auth.login');
    }

    public function loginPost(Request $request): RedirectResponse
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

        $this->setAuth($usuario);

        return redirect('/');
    }

    public function registrar(): View
    {
        return view('auth.registrar');
    }

    public function registrarPost(RegistrarRequest $request)
    {
        $dados = $request->all((new Usuario)->getFillable());
        $usuario = $this->usuarioService->cadastrar($dados, false, true);

        if($usuario == null) {
            return back()->withInput()->withErrors([
                '' => 'Ocorreu um erro ao registrar.',
            ]);
        }

        $this->setAuth($usuario);

        return redirect('/');
    }

    public function logout(): RedirectResponse
    {
        request()->session()->invalidate();
        return redirect('/auth/login');
    }

    private function setAuth(Usuario $usuario): void
    {
        request()->session()->put('autenticado', true);
        request()->session()->put('id', $usuario->id);
        request()->session()->put('nome', $usuario->nome);
        request()->session()->put('email', $usuario->email);
        request()->session()->put('tipo', $usuario->tipo);
    }
}
