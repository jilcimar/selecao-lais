<?php

namespace App\Http\Controllers\API;

use App\Models\Cbo;
use App\Models\Profissional;
use App\Models\Tipo;
use App\Models\Vinculacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfissionaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissionais = Profissional::with('cbo','tipo','vinculacao')->get();
        return response()->json(array_merge($profissionais->toArray()));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = collect(json_decode($request->getContent()));
        Profissional::create($dados->all()); //Salvando o Profissional via API
        return response()->json('Profissional criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profissional = Profissional::with('cbo','tipo','vinculacao')->where('id', $id)->get();
        return response()->json(array_merge($profissional->toArray()));
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
        $dados = collect(json_decode($request->getContent()));
        $profissional = Profissional::find($id);
        $profissional->update($dados->all()); //Atualizando o Profissional
        return response()->json('Profissional atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profissional = Profissional::find($id);
        $profissional->delete(); //Deletando o farmaco

        return response()->json('Deletado com Sucesso');

    }

    public function cbo ()
    {
        $cbo = Cbo::all();
        return response()->json(array_merge($cbo->toArray()));
    }

    public function tipo ()
    {
        $tipo = Tipo::all();
        return response()->json(array_merge($tipo->toArray()));
    }

    public function vinculo ()
    {
        $vinculo = Vinculacao::all();
        return response()->json(array_merge($vinculo->toArray()));
    }
}
