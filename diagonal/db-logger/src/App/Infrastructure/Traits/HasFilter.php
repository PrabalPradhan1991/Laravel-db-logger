<?php

namespace Diagonal\DbLogger\App\Infrastructure\Traits;

use Diagonal\DbLogger\App\Infrastructure\Filters\BaseFilter;
use MongoDB\Laravel\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $query, BaseFilter $filters)
    {
        return $filters->apply($query);
    }
}
