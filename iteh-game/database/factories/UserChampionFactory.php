<?php

namespace Database\Factories;

use App\Models\UserChampion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserChampion>
 */
class UserChampionFactory extends Factory
{
    protected $model = UserChampion::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,10),
            'champion_id'=>$this->faker->numberBetween(1,20),
        ];
    }
}
