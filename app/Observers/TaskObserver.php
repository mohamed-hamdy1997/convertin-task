<?php

namespace App\Observers;

use App\Jobs\HandleTaskCreationStatistics;
use Illuminate\Database\Eloquent\Model;

class TaskObserver implements ObserverInterface
{
    public function created(Model $model)
    {
        dispatch(new HandleTaskCreationStatistics($model));
    }

    public function updated(Model $model)
    {
    }

    public function deleted(Model $model)
    {
    }
}
