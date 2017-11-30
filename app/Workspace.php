<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Workspace extends Model
{
	public function category() {

  	return $this->belongsTo('\App\Category');

  }
}
