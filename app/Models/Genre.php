<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name'
    ];

    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie');
    }

    /**
     * @param Builder $query
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function scopeByField(Builder $query, string $field, $value)
    {
        return $query->where($field, $value);
    }
}
