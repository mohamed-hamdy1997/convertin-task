<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('', function () {
        return view('auth/login');
    });
    Route::post('', [AuthController::class, 'login'])->name('login');
});
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {
        Route::get('', [TaskController::class, 'index'])->name('view');
        Route::get('data', [TaskController::class, 'getTasksData'])->name('data');
        Route::get('create', [TaskController::class, 'createTaskView'])->name('create.view');
        Route::post('create', [TaskController::class, 'createTask'])->name('create');
    });
});
