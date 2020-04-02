<?php

namespace App\Services;

use MorningTrain\TogglApi\TogglApi;

class Toggl
{
    protected $toggl;

    public function __construct()
    {
        $this->toggl = new TogglApi(config('services.toggl.key'));
    }

    /**
     * Fetch and returns the workspace id
     *
     * @return int
     **/
    public function getUserWorkspaceId()
    {
        return collect($this->toggl->getWorkspaces())
            ->firstWhere('name', config('services.toggl.workspace'))
            ->id
        ;
    }

    /**
     * Creates a new project in toggl
     *
     * @param array $projectDetails
     * @return stdClass
     **/
    public function addNewProject($projectDetails)
    {
        return $this->toggl->createProject($projectDetails);
    }
}
