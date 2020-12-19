<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_project_can_invite_a_user()
    {
        $this->withoutExceptionHandling();
        $project = ProjectFactory::create();
        $userToInvite = factory(User::class)->create();

        $this->actingAs($project->owner)->post($project->path() . '/invitations', [
            'email' => $userToInvite->email
        ]);

        $this->assertTrue($project->members->contains($userToInvite));
    }

    /** @test */
    public function invited_users_may_update_project_details()
    {
        $project = ProjectFactory::create();
        $project->invite($newUser = factory(User::class)->create());

        $this->signIn($newUser);
        $this->post(
            action('ProjectTasksController@store', $project),
            $task = ['body' => 'foo task']
        );

        $this->assertDatabaseHas('tasks', $task);
    }
}
