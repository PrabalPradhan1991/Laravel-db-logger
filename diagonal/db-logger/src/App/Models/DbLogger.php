<?php

namespace Diagonal\DbLogger\App\Models;

use Diagonal\DbLogger\App\Infrastructure\Traits\HasFilter;
use MongoDB\Laravel\Eloquent\Model;

class DbLogger extends Model
{
    use HasFilter;

    protected $connection = 'mongodb';

    protected $fillable = [
        'model',
        'model_id',
        'data',
        'action',
        'changes',
        'created_at',
        'updated_at',
    ];
}
