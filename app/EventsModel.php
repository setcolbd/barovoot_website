<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsModel extends Model
{
  protected $table = 'events';
  protected $primaryKey = 'events_id';
  protected $fillable = ['title','description','location','date','amount','image'];


  public function validation()
  {
    return [
      'title'=>'required',
      'description'=>'required',
      'location'=>'required',
      'date'=>'required',
      'amount'=>'required|numeric',
      'image'=>'required',
    ];
  }
}
