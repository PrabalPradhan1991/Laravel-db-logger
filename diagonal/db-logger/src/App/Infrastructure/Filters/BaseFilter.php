<?php

namespace Diagonal\DbLogger\App\Infrastructure\Filters;

use Illuminate\Support\Str;
use MongoDB\Laravel\Eloquent\Builder;

/**
 * Class BaseFilter
 */
abstract class BaseFilter
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var array
     */
    protected $filters;

    /**
     * @var array
     */
    protected $filterValues;

    /**
     * BaseFilter constructor.
     */
    public function __construct(array $filterValues)
    {
        $this->filterValues = $filterValues;
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;
        foreach ($this->filterValues as $key => $value) {
            if (method_exists($this, Str::camel($key)) && ! is_null($value) && in_array($key, $this->filters)) {
                $method = Str::camel($key);
                $this->$method($value);
            }
        }

        return $this->builder;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }
}
