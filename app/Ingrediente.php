<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{

    protected $fillable = [
        'nombre', 'proveedor',
    ];

    public function plato_ingredientes()
    {
        return $this->hasMany(PlatoIngrediente::class);
    }
}
