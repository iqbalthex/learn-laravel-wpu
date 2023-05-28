<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
* @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
*/
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'body' => collect(fake()->paragraphs(mt_rand(3,6)))
        ->map(fn ($p) => "<p>$p</p>")
        ->implode(''),
      'slug' => fake()->slug(),
      'title' => fake()->sentence(5),
      'excerpt' => fake()->sentence(mt_rand(8,15)),
      'user_id' => mt_rand(1,3),
      'category_id' => mt_rand(1,3),
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   */
  public function unverified(): static
  {
    return $this->state(fn (array $attributes) => [
      'email_verified_at' => null,
    ]);
  }
}
