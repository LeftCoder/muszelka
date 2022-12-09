<?php

namespace Tests\Feature\Faq;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function logged_in_user_can_create_faq_record()
    {
        User::factory()->create();
        $this->actingAs(User::first());

        $attributes = [
            'question' => fake()->sentence(),
            'answer' => fake()->paragraph(),
        ];

        $this->post('/dashboard/faq', $attributes);
        $this->assertDatabaseHas('faqs', $attributes);
    }

    /** @test */
    public function logged_in_user_can_update_faq_record()
    {
        User::factory()->create();
        $this->actingAs(User::first());
        $faq = Faq::factory()->create();

        $attributes = [
            'question' => 'Question?',
            'answer' => 'Answer.',
        ];

        $this->patch("/dashboard/faq/{$faq->id}", $attributes);
        $this->assertDatabaseHas('faqs', $attributes);
    }

    /** @test */
    public function logged_in_user_can_delete_faq_record()
    {
        User::factory()->create();
        $this->actingAs(User::first());
        $faq = Faq::factory()->create();

        $this->assertDatabaseCount('faqs', 1);
        $this->delete("/dashboard/faq/{$faq->id}");
        $this->assertDatabaseCount('faqs', 0);
    }
}
