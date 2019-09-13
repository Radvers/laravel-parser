<?php

namespace App\Utils\Repositories\Laravel\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 * @package App\Models
 */
class Movie extends Model
{
    public const NAME = 'name';
    public const DESCRIPTION = 'description';
    public const ORIGINAL_NAME = 'original_name';
    public const YEAR = 'year';
    public const DURATION = 'duration';
    public const URL = 'url';

    protected $fillable = [
        self::NAME, self::DESCRIPTION, self::ORIGINAL_NAME, self::YEAR, self::DURATION, self::URL
    ];

    public function getNameAttribute()
    {
        return $this->getAttribute(self::NAME);
    }

    public function getActors()
    {
        return $this->actors();
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function producers()
    {
        return $this->belongsToMany(Producer::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
