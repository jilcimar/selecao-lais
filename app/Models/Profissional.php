<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = 'profissionais';

    protected $fillable = ['nome','cns','data_atribuicao','carga_horaria','sus','cbo_id','tipo_id','vinculacao_id'];
}
