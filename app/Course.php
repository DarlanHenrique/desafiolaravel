<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [
        'id', 
        'created_at',
        'updated_at'
    ];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
