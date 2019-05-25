<?php

namespace App\Http\Controllers;

use App\Api;
use App\Models\Cbo;
use App\Models\Tipo;
use App\Models\Vinculacao;
use \GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{

    protected  $api;
    protected  $client;

    public function __construct()
    {
        $this->api = new Api();
        $this->client = new Client();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = $this->api->rota('profissionais');
        $request = $this->client->get($url);
        $response = $request->getBody()->getContents();
        $profissionais = json_decode($response, true);

        return view('pages.profissionais.index', compact('profissionais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cbos = Cbo::all();
        $tipos = Tipo::all();
        $vinculacoes = Vinculacao::all();

        return view('pages.profissionais.create' , compact('cbos','tipos','vinculacoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|string'
        ]);

        $url = $this->api->rota('profissionais/store');
        (new Client())->request('POST', $url, ['json' => $request->all()])->getBody()->getContents();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
