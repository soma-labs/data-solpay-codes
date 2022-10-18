<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectRegistrationRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('cma.')->group(function () {
    Route::name('projects.index')
        ->get('/projects', [ProjectController::class, 'index']);

    Route::name('projects.batch')
        ->post('/projects/batch', [ProjectController::class, 'batchShow']);

    Route::name('projects.detail')
        ->get('/projects/{owner}/{candy_machine_id}', [ProjectController::class, 'show']);

    Route::name('project-registration')
        ->post('/project-registration', [ProjectRegistrationRequestController::class, 'store']);
});
