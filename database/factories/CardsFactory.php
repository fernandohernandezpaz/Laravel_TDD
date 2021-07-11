<?php

namespace Database\Factories;

use App\Models\Cards;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CardsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cards::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(),
            'description' => Str::random(255),
            'image' => $this->faker->image('public/storage/cards'),
            'active' => (bool)rand(0, 1)
        ];
    }
}
