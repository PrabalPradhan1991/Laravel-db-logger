<?php

namespace Diagonal\DbLogger\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Diagonal\DbLogger\App\Observers\GlobalModelObserver;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected static function boot()
    {
        parent::boot();
        static::observe(GlobalModelObserver::class);
    }
}
