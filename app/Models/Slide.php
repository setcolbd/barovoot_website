<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slides';
    protected $primaryKey = 'slides_id';
    protected $fillable = ['title','description','image'];

    public function validation()
    {
      return [
        'title'=>'required',
        'description'=>'sometimes',
        'image'=>'sometimes',
      ];
    }
}
