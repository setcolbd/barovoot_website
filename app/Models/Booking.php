<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $table = 'booking';
  protected $primaryKey = 'booking_id';
  protected $fillable = ['name','email','date','time','number_of_people'];


  public function validation()
  {
    return [
      'name'=>'required',
      'email'=>'required|email',
      'date'=>'required',
      'time'=>'required',
      'number_of_people'=>'required|numeric',
    ];
  }
}
