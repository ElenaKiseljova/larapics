<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => $title = fake()->sentence(),
      'slug' => str()->slug($title),
      'file' => fake()->imageUrl($width = 1920, $height = 1280),
      'dimension' => $width . 'x' . $height,
      'views_count' => fake()->randomNumber(5),
      'downloads_count' => fake()->randomNumber(5),
      'is_published' => true,
      'user_id' => User::factory()
    ];
  }
}
