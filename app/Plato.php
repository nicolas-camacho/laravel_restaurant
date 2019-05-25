<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    public function plato_ingredientes()
    {
        return $this->hasMany(PlatoIngrediente::class);
    }

    public function orden_platos()
    {
        return $this->hasMany(OrdenPlato::class);
    }
}
