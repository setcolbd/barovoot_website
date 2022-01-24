<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerFeedback extends Model
{
  protected $table = 'customer_feedback';
  protected $primaryKey = 'customer_feedback_id';
  protected $fillable = ['customer_name', 'email', 'description', 'image'];


  public function validation()
  {
    return [
      'customer_name' => 'required',
      'email' => 'required|email',
      'description' => 'required',
      'image' => 'required',
    ];
  }
}
