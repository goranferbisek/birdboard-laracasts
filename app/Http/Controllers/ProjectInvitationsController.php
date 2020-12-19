<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

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
    public function store(Project $project)
    {
        $this->authorize('update', $project);
        request()->validate([
            'email' => 'required|exists:users,email'
        ], [
            'email.exists' => 'The user you ared inviting must have a Birboard account.'
        ]);

        $user = User::whereEmail(request('email'))->first();
        $project->invite($user);

        return redirect($project->path());
    }
}
