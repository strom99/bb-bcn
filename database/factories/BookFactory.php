<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        // package fakerphp-picsum-images
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        return [
            'ISBN' => $this->faker->ean13(),
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'img' => $faker->imageUrl('500','500'),
            'published_date' => $this->faker->date(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10, 400),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
