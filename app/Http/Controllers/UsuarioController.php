<?php

namespace App\Http\Controllers;

use App\Data\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $usuarios = Usuario::query()->paginate(15);
        return view('usuarios.index', compact('usuarios'));
    }

    public function cadastrarUsuario()
    {
        return view('usuarios.cadastrar');
    }

    public function cadastrarUsuarioPost(Request $request)
    {
        return view('usuarios.cadastrar');
    }
}
