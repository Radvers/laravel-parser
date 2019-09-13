<?php

namespace App\Utils\Repositories\Laravel\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public const NAME = 'name';

    protected $fillable = [
        self::NAME
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
