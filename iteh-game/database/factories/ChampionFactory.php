<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Champion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Champion>
 */
class ChampionFactory extends Factory
{
    protected $model = Champion::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->unique()->firstName(),
            'attack'=>$this->faker->numberBetween(0,100),
            'defence'=>$this->faker->numberBetween(0,100),
        ];
    }
}
