<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  public function category() {

		return $this->belongsTo('\App\Workspace');

	}

	public function user() {

		return $this->belongsTo('\App\User');

	}
}
