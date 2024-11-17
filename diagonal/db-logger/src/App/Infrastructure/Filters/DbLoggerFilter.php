<?php

namespace Diagonal\DbLogger\App\Infrastructure\Filters;

use Illuminate\Support\Arr;

class DbLoggerFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['model', 'model_id', 'action'];

    /**
     * @var string
     */
    private $model;

    /**
     * @var string|int
     */
    private $modelId;

    /**
     * @var string
     */
    private $action;

    /**
     * keyword
     *
     * @return void
     */
    public function __construct(array $filterValues)
    {
        parent::__construct($filterValues);
        $this->model = Arr::get($this->filterValues, 'model', '');
        $this->modelId = Arr::get($this->filterValues, 'model_id', null);
        $this->action = Arr::get($this->filterValues, 'action', null);

    }

    public function action()
    {
        if ($this->action) {
            $this->builder->where('action', $this->action);
        }
    }

    public function modelId()
    {
        $this->builder->where('model_id', $this->modelId);
    }

    public function model()
    {
        $this->builder->where('model', $this->model);
    }
}
