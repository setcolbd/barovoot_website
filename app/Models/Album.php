<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $table = 'album';
  protected $primaryKey = 'album_id';
  protected $fillable = ['name','description','type'];


  public function validation()
  {
    return [
      'name'=>'required',
      'description'=>'required',
      'type'=>'required'
    ];
  }
}
