<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $fillable = [
        'name'
    ];

    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie');
    }
}
