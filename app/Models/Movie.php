<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name', 'description', 'original_name', 'year', "duration", "url"
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
