<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  protected $table = 'gallery';
  protected $primaryKey = 'gallery_id';
  protected $fillable = ['album_id','title','type','value'];


  public function validation()
  {
    return [
      'album_id'=>'required',
      'title'=>'required',
      'type'=>'required',
      'value'=>'required'
    ];
  }
}
