<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  public function workspace() {

		return $this->belongsTo('\App\Workspace');

	}

	public function user() {

		return $this->belongsTo('\App\User');

	}
	
}
