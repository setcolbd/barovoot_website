<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigurationModel extends Model
{
    protected $table = 'configuration';
    protected $primaryKey = 'configuration_id';
    protected $fillable = ['type','name','display_name','value'];


    public function validation($id=0)
    {
      return [
        'type'=>'required',
        'name'=>'required|unique:configuration,name,'.$id.',configuration_id',
        'display_name'=>'required',
        'value'=>'required',
      ];
    }
}
