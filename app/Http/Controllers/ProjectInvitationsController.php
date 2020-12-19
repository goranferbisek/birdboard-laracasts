<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Http\Requests\ProjectInvitationRequest;

class ProjectInvitationsController extends Controller
{
    /**
     * user invites a member based on an email address
     * you can invite only user that are members on birboard
     *
     * otherwise we would have to impletent sending invition links to a user
     * email address and offer the registration to birboard
     * and finally invite them as project members
     */
    public function store(Project $project, ProjectInvitationRequest $request)
    {
        $user = User::whereEmail(request('email'))->first();
        $project->invite($user);

        return redirect($project->path());
    }
}
