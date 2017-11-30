<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function workspaces() {

  	return $this->hasMany('\App\Workspace');

  }
}
