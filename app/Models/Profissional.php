<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = 'profissionais';

    protected $dates = ['data_atribuicao'];

    protected $fillable = ['nome','cns','data_atribuicao','carga_horaria','sus','cbo_id','tipo_id','vinculacao_id'];


    public function cbo()
    {
        return $this->belongsTo(Cbo::class, 'cbo_id');
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function vinculacao ()
    {
        return $this->belongsTo(Vinculacao::class, 'vinculacao_id');
    }

}
