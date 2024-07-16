<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment'       => $this->faker->text(1000),
            'post_id'       => Post::factory()->create()->id,
            'user_id'       => User::factory()->create()->id,
            'created_at'    => now(),
            'updated_at'    => now()
        ];
    }
}
