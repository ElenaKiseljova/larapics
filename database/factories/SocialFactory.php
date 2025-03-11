<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Social>
 */
class SocialFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'instagram' => mt_rand(0, 1) ? fake()->url() : null,
      'facebook' => mt_rand(0, 1) ? fake()->url() : null,
      'twitter' => mt_rand(0, 1) ? fake()->url() : null,
      'website' => mt_rand(0, 1) ? fake()->url() : null,

    ];
  }
}
