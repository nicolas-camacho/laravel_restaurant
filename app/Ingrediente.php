<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{

    protected $fillable = [
        'nombre', 'proveedor',
    ];

    public function platos()
    {
        return $this->belongsToMany(Plato::class);
    }
}
