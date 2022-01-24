<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  protected $table = 'comments';
  protected $primaryKey = 'comments_id';
  protected $fillable = ['blog_id','name','email','comment','status'];


  public function validation()
  {
    return [
      'name'=>'required',
      'email'=>'required|email',
      'comment'=>'required'
    ];
  }

  public function reply()
  {
    return $this->hasMany('App\Models\CommentsReply', 'comments_id');
  }
}
