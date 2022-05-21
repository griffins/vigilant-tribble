<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $website = Website::query()->inRandomOrder()->first();
        return [
            'title' => $this->faker->name(),
            'body' => implode("\n", $this->faker->sentences(rand(2, 7))),
            'website_id' => $website->id
        ];
    }
}
