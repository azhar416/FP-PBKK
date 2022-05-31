<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// require_once 'vendor/autoload.php';
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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['magazine', 'paper', 'textbook']),
            'slug' => $this->faker->slug(),
            'author' => $this->faker->name(),
            'category' => $this->faker->word(),
            //company error
            'publisher' => $this->faker->company(),
            'year_published' => $this->faker->year(),
            'description' => $this->faker->text(),
            'link'=> 'src/' . $this->faker->unique()->numerify('book-#####') . '.pdf'
        ];
    }
}
