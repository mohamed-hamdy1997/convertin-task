<?php

namespace App\Observers;

use App\Enums\AUser;
use App\Http\Services\FirebaseService;
use App\Jobs\Firebase\SetUserData;
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
