<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsReply extends Model
{
  protected $table = 'comments_reply';
  protected $primaryKey = 'comments_reply_id';
  protected $fillable = ['comments_id','name','email','reply'];


  public function validation()
  {
    return [
      'comments_id'=>'required',
      'name'=>'required',
      'email'=>'required|email',
      'reply'=>'required'
    ];
  }
}
