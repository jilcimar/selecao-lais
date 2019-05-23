<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vinculacao extends Model
{
    protected $table = 'vinculacoes';

    protected $fillable = ['descricao'];
}
