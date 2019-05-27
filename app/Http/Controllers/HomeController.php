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

        $url_api_tipo = env('API_URL', 'http://localhost:9000').'/api/v0/indicadores/tipo';
        $url_api_vinculo = env('API_URL', 'http://localhost:9000').'/api/v0/indicadores/vinculo';

        return view('index' ,compact('usuarios','profissionais', 'url_api_vinculo','url_api_tipo'));
    }
}
