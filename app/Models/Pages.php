<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
  protected $table = 'pages';
  protected $primaryKey = 'pages_id';
  protected $fillable = ['title','url','description','is_menu','menu_position','parent'];


  public function validation()
  {
    return [
      'title'=>'required',
      'url'=>'required',
      'is_menu'=>'required',
    ];
  }

  public function parent_page()
  {
    return $this->belongsTo('App\Models\Pages','parent');
  }
}
