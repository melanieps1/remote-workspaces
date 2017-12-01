<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Workspace extends Model
{
	public function category() {

  	return $this->belongsTo('\App\Category');

  }

  public function rating() {

  	return $this->hasMany('\App\Rating');
  
  }
}
