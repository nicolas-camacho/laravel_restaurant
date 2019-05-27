<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
		protected $fillable = [
			'numMesa', 'estado',
		];

		public function platos()
		{
			return $this->belongsToMany(Plato::class)->withPivot('cantidad', 'valor');
		}
}
