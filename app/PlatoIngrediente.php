<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlatoIngrediente extends Model
{
    public function plato()
    {
        return $this->belongsTo(Plato::class);
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
}
