<?php

namespace Diagonal\DbLogger\App\Observers;

use Diagonal\DbLogger\App\Models\DbLogger;
use Illuminate\Database\Eloquent\Model;

class GlobalModelObserver
{
    public const INSERT = 'INSERT';

    public const UPDATE = 'UPDATE';

    public const DELETE = 'DELETE';

    public const RESTORED = 'RESTORED';

    public const FORCE_DELETED = 'FORCE_DELETED';

    public function created(Model $model)
    {
        $this->storeInLogger(
            $model,
            self::INSERT
        );
    }

    public function updated(Model $model)
    {
        $this->storeInLogger(
            $model,
            self::UPDATE
        );
    }

    public function deleted(Model $model)
    {
        $this->storeInLogger(
            $model,
            self::DELETE
        );
    }

    public function forceDeleted(Model $model)
    {
        $this->storeInLogger(
            $model,
            self::FORCE_DELETED
        );
    }

    public function restored(Model $model)
    {
        $this->storeInLogger(
            $model,
            self::RESTORED
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
