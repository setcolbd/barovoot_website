<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
  protected $table = 'blog';
  protected $primaryKey = 'blog_id';
  protected $fillable = ['title','description','date','image','entry_by'];


  public function validation()
  {
    return [
      'title'=>'required',
      'description'=>'required',
      'date'=>'required',
      'image'=>'required',
    ];
  }

  public function author()
  {
    return $this->hasOne('App\User', 'id');
  }
}
