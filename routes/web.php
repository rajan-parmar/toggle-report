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
    $projectsArray = ['testing1', 'testing2', 'testing3'];

    $toggl = resolve(Toggl::class);
    $workspaceId = $toggl->getUserWorkspaceId();
    $this->projects = $toggl->getProjectsOf($workspaceId);

    foreach ($projectsArray as $project) {
        $projectDetails = [
            'name' => $project,
            'wid' => $workspaceId,
        ];
        $toggl->addNewProject($projectDetails);
    }
    return view('welcome');
});
