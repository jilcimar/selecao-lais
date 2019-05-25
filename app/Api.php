<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    public function  rota($rota)
    {
        $app_url = env('API_URL', 'http://localhost:9000');
        return "$app_url/api/v0/$rota"; //Rota base da API
    }

}
