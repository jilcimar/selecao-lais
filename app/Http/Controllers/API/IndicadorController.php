<?php

namespace App\Http\Controllers\API;

use App\Models\Profissional;
use App\Models\Tipo;
use App\Models\Vinculacao;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndicadorController extends Controller
{
    public function vinculo_empregaticio()
    {
        $vinculos_profissionais = [];

        foreach (Vinculacao::all() as $vinculacao)
        {
            $obj = array(
                "y" => count($vinculacao->profissionais),
                "label" => $vinculacao->descricao,
            );
            array_push($vinculos_profissionais, $obj);
        }

        return response()->json(array_merge($vinculos_profissionais));
    }

    public function tipo()
    {
        $profissionais = count(Profissional::all());

        $tipos_profissionais = [];

        foreach (Tipo::all() as $tipo)
        {
            $obj = array(
                "y" => (count($tipo->profissionais)/$profissionais)*100,
                "label" => $tipo->descricao,
            );
            array_push($tipos_profissionais, $obj);
        }

        return response()->json(array_merge($tipos_profissionais));
    }

}
