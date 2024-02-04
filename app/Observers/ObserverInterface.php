<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

interface ObserverInterface
{
    public function created(Model $model);

    public function updated(Model $model);

    public function deleted(Model $model);
}
