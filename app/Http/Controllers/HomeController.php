<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use App\Models\Tipo;
use App\Models\Vinculacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = count(User::all());
        $profissionais = count(Profissional::all());



        return view('index' ,compact('usuarios','profissionais'));
    }
}
