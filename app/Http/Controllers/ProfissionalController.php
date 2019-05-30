<?php

namespace App\Http\Controllers;

use App\Api;
use App\Models\Cbo;
use App\Models\Profissional;
use App\Models\Tipo;
use App\Models\Vinculacao;
use Carbon\Carbon;
use \GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Weidner\Goutte\GoutteFacade;

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
//        $url = $this->api->rota('profissionais');
//        $request = $this->client->get($url);
//        $response = $request->getBody()->getContents();
//        $profissionais = json_decode($response, true);

        $profissionais = Profissional::with('cbo','tipo','vinculacao')->get();

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
            'carga_horaria' => 'required',
            'cbo_id' => 'required|integer',
            'tipo_id' => 'required|integer',
            'vinculacao_id' => 'required|integer',
            'sus' => 'required'
        ]);

        Profissional::create($request->all());

//        $url = $this->api->rota('profissionais/store');
//        (new Client())->request('POST', $url, ['json' => $request->all()])->getBody()->getContents();

        alert()->success('Profissional cadastrado com sucesso',
            'Profissional cadastrado')->autoclose(5500);

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
        $cbos = Cbo::all();
        $tipos = Tipo::all();
        $vinculos = Vinculacao::all();

        $profissional = Profissional::find($id);

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
            'carga_horaria' => 'required',
            'cbo_id' => 'required|integer',
            'tipo_id' => 'required|integer',
            'vinculacao_id' => 'required|integer',
            'sus' => 'required'
        ]);

//        $url = $this->api->rota('profissionais/update/'.$id);
//        (new Client())->request('POST', $url, ['json' => $request->all()])->getBody()->getContents();
        $profissional = Profissional::find($id);
        $profissional->update($request->all());

        alert()->success('Profissional atualizado com sucesso',
            'Profissional atualizado')->autoclose(5500);

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
//        $this->client->get($this->api->rota('profissionais/destroy/'.$id));
        $profissional = Profissional::find($id);
        $profissional->delete();

        alert()->success('Profissional deletado com sucesso',
            'Profissional deletado')->autoclose(5500);

        return redirect(url('/profissionais'));
    }

    public function getDados()
    {
        $crawler = GoutteFacade::request('GET', 'http://cnes2.datasus.gov.br/Mod_Profissional.asp?VCo_Unidade=2408102653982');

        $crawler->filter('#example')->filter('tr[class="gradeA"]')->each(function ($tr, $i) {

            //Pegando os campos específicos

           $nomes [$i] = $tr->filter('td')->eq(0)->each(function ($td, $i) {
                   return trim($td->text());
            });

            $cns [$i] = $tr->filter('td')->eq(2)->each(function ($td, $i) {
                   return trim($td->text());
            });

            $datas [$i] = $tr->filter('td')->eq(4)->each(function ($td, $i) {
                return trim($td->text());
            });

            $cbos [$i] = $tr->filter('td')->eq(5)->each(function ($td, $i) {
                return trim($td->text());
            });

            $carga_horaria [$i] = $tr->filter('td')->eq(9)->each(function ($td, $i) {
                return trim($td->text());
            });

            $sus [$i] = $tr->filter('td')->eq(10)->each(function ($td, $i) {
                return trim($td->text());
            });

            $vinculos [$i] = $tr->filter('td')->eq(11)->each(function ($td, $i) {
                return trim($td->text());
            });

            $tipos [$i] = $tr->filter('td')->eq(12)->each(function ($td, $i) {
                return trim($td->text());
            });


            foreach ($nomes as $nome)
           {

               if(!empty($datas [$i][0]))
               {
                   $tipo = Tipo::firstOrCreate(
                       ['descricao' => $tipos[$i][0] ]
                   );

                   $vinculo = Vinculacao::firstOrCreate(
                       ['descricao' => $vinculos[$i][0] ]
                   );

                   $cbo = Cbo::firstOrCreate(
                       ['descricao' => $cbos[$i][0] ]
                   );

                   $tem_sus = false;

                   if($sus [$i][0] == "SIM")
                   {
                       $tem_sus = true;
                   }

                   $profissional = new Profissional([
                       'nome' => $nome[0] ,
                       'cns' =>$cns [$i][0],
                       'data_atribuicao'=> Carbon::createFromFormat('d/m/Y', $datas [$i][0])->format('Y-m-d'),
                       'carga_horaria' => $carga_horaria [$i][0] ,
                       'sus' => $tem_sus,
                       'cbo_id'=> $cbo->id,
                       'tipo_id' => $tipo->id,
                       'vinculacao_id' => $vinculo->id

                   ]);
                   $profissional->save();
               }

           }

        });

        alert()->success('Profissionais importados com sucesso',
            'Profissionais Importados')->autoclose(5500);

        return redirect(url('/profissionais'));

    }
}
