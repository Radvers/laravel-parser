<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{
    protected $fillable = [
        'name', 'original_name', 'year', "duration",
    ];

    public function actors()
    {
        return $this->belongsToMany('App\Models\Actor');
    }

    public function producers()
    {
        return $this->belongsToMany('App\Models\Producer');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre');
    }
}
