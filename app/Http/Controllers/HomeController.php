<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($this->autenticado())
            return view('home.index');

        return redirect('/auth/login');
    }
}
