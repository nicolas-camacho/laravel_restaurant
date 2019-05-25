<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    public function orden_platos()
    {
        return $this->hasMany(OrdenPlato::class);
    }
}
