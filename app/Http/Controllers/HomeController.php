<?php

namespace App\Http\Controllers;

use App\Api;
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

    protected  $api;

    public function __construct()
    {
        $this->middleware('auth');
        $this->api = new Api();

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

        $url_api_tipo = $this->api->rota('indicadores/tipo');
        $url_api_vinculo = $this->api->rota('indicadores/vinculo');

        return view('index' ,compact('usuarios','profissionais', 'url_api_vinculo','url_api_tipo'));
    }
}
