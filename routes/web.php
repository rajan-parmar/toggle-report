<?php

use Illuminate\Support\Facades\Route;
use App\Services\Toggl;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $toggl = resolve(Toggl::class);
    $workspaceId = $toggl->getUserWorkspaceId();

    $timeEntryDetails = [
        'description' => 'my first laravel toggl task',
        'wid' => $workspaceId,
        'pid' => 159544590,
        'start' => "2020-04-02T07:00:00.000Z",
        'stop' => "2020-04-02T07:00:10.000Z",
        'duration' => "10",
        'created_with' => 'Laravel Toggl Api',
    ];

    $toggl->addNewTimeEntry($timeEntryDetails);

    return view('welcome');
});
