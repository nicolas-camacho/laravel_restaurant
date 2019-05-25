<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPlato extends Model
{
    public function plato()
    {
        return $this->belongsTo(Plato::class);
    }

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }
}
