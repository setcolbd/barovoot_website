<?php


namespace App\Http\Helpers;


trait DefaultQuery
{
    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where(function ($query){
                $query->where('status', '=', 1);
            });
    }
}
