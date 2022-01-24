<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
  protected $table = 'package';
  protected $primaryKey = 'package_id';
  protected $fillable = ['name','description','image'];


  public function validation()
  {
    return [
      'name'=>'required',
      'description'=>'required',
      'image'=>'required',
    ];
  }
}
