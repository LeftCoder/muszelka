<?php

namespace Tests\Feature\Faq;

use App\Models\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeaturesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function logged_in_user_can_create_feature_record()
    {
        User::factory()->create();
        $this->actingAs(User::first());

        $attributes = [
            'name' => fake()->word(),
        ];

        $this->post('/dashboard/udogodnienia', $attributes);
        $this->assertDatabaseHas('features', $attributes);
    }

    /** @test */
    public function logged_in_user_can_update_feature_record()
    {
        User::factory()->create();
        $this->actingAs(User::first());
        $feature = Feature::factory()->create();

        $attributes = [
            'name' => 'changed feature',
        ];

        $this->patch("/dashboard/udogodnienia/{$feature->id}", $attributes);
        $this->assertDatabaseHas('features', $attributes);
    }

    /** @test */
    public function logged_in_user_can_delete_feature_record()
    {
        User::factory()->create();
        $this->actingAs(User::first());
        $feature = Feature::factory()->create();

        $this->assertDatabaseCount('features', 1);
        $this->delete("/dashboard/udogodnienia/{$feature->id}");
        $this->assertDatabaseCount('features', 0);
    }
}
