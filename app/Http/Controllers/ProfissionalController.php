<?php

namespace App\Http\Controllers;

use App\Api;
use App\Models\Cbo;
use App\Models\Tipo;
use App\Models\Vinculacao;
use Carbon\Carbon;
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
            'nome' => 'required|string',
            'cns' => 'required|integer',
            'data_atribuicao' => 'required|date',
            'carga_horaria' => 'required|integer',
            'cbo_id' => 'required|integer',
            'tipo_id' => 'required|integer',
            'vinculacao_id' => 'required|integer',
            'sus' => 'required'
        ]);

        $url = $this->api->rota('profissionais/store');

        (new Client())->request('POST', $url, ['json' => $request->all()])->getBody()->getContents();
        return redirect(url('/profissionais'));
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
        $url = $this->api->rota('profissionais/show/'.$id);
        $request = $this->client->get($url);
        $response = $request->getBody()->getContents();
        $profissional = json_decode($response, true)[0];

        $request = $this->client->get($this->api->rota('cbo'));
        $response = $request->getBody()->getContents();
        $cbos = json_decode($response, true);

        $request = $this->client->get($this->api->rota('tipo'));
        $response = $request->getBody()->getContents();
        $tipos = json_decode($response, true);

        $request = $this->client->get($this->api->rota('vinculo'));
        $response = $request->getBody()->getContents();
        $vinculos = json_decode($response, true);


        return view('pages.profissionais.edit', compact('profissional','cbos','tipos','vinculos'));

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
        $request->merge(['data_atribuicao' => Carbon::createFromFormat('d/m/Y', $request->data_atribuicao)->format('Y-m-d')]);

        $this->validate($request, [
            'nome' => 'required|string',
            'cns' => 'required|integer',
            'data_atribuicao' => 'required|date',
            'carga_horaria' => 'required|integer',
            'cbo_id' => 'required|integer',
            'tipo_id' => 'required|integer',
            'vinculacao_id' => 'required|integer',
            'sus' => 'required'
        ]);

        $url = $this->api->rota('profissionais/update/'.$id);

        (new Client())->request('POST', $url, ['json' => $request->all()])->getBody()->getContents();
        return redirect(url('/profissionais'));
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
