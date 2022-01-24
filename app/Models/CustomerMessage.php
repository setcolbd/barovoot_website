<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerMessage extends Model
{
  protected $table = 'customer_message';
  protected $primaryKey = 'customer_message_id';
  protected $fillable = ['name', 'email', 'phone','subject','message'];


  public function validation()
  {
    return [
      'name' => 'required',
      'email' => 'required|email',
      'phone' => 'required',
      'subject' => 'required',
      'message' => 'required',
    ];
  }
}
