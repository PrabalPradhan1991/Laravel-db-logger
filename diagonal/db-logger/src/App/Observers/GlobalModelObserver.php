<?php

namespace Diagonal\DbLogger\App\Observers;

use Diagonal\DbLogger\App\Models\DbLogger;
use Illuminate\Database\Eloquent\Model;

class GlobalModelObserver
{
    public function created(Model $model)
    {
        $this->storeInLogger(
            $model,
            'INSERT'
        );
    }

    public function updated(Model $model)
    {
        $this->storeInLogger(
            $model,
            'UPDATE'
        );
    }

    public function deleted(Model $model)
    {
        $this->storeInLogger(
            $model,
            'DELETE'
        );
    }

    public function forceDeleted(Model $model)
    {
        $this->storeInLogger(
            $model,
            'FORCE_DELETED'
        );
    }

    public function restored(Model $model)
    {
        $this->storeInLogger(
            $model,
            'RESOTRED'
        );
    }

    private function storeInLogger(Model $model, string $action)
    {
        DbLogger::create([
            'model' => get_class($model),
            'model_id' => $model->id,
            'data' => $model->getAttributes(),
            'action' => $action,
            'changes' => $model->getChanges(),
        ]);
    }
}
