<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';

    protected $fillable = ['descricao'];

    public function profissionais()
    {
        return $this->hasMany(Profissional::class);
    }

}
