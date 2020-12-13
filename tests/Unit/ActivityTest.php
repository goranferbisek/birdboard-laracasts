<?php

namespace Tests\Unit;

use App\User;
use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_user()
    {
        $this->signIn();
        $project = factory(Project::class)->create();

        $this->assertInstanceOf(User::class, $project->activity->first()->user);
    }

}
