<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
		protected $fillable = [
			'numMesa',
		];

		public function platos()
		{
			return $this->belongsToMany(Orden::class);
		}
}
