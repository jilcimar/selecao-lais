<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    const resposta = [
        'status' => 200,
        'mensagens' => ['API - SISTEMA INFECTOLOGIA'],
        'dados' => []
    ];

}
