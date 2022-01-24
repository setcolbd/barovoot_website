<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialModel extends Model
{
  protected $table = 'social';
  protected $primaryKey = 'social_id';
  protected $fillable = ['name','icon','link'];


  public function validation()
  {
    return [
      'name'=>'required',
      'icon'=>'required',
      'link'=>'required',
    ];
  }
}
