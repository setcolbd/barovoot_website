<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
  protected $table = 'offer';
  protected $primaryKey = 'offer_id';
  protected $fillable = ['title','description','image'];


  public function validation()
  {
    return [
      'title'=>'required',
      'description'=>'required',
      'image'=>'required',
    ];
  }
}
