<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'subscriber';
    protected $primaryKey = 'subscriber_id';
    protected $fillable = ['email'];
    protected $casts = [
        'created_at' => 'date:Y-m-d'
    ];

    public function validation()
    {
        return [
            'email' => 'required',
        ];
    }
}
