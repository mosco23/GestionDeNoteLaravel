<?php

namespace Database\Factories;

use App\Models\Mention;
use Illuminate\Database\Eloquent\Factories\Factory;

class MentionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mention::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' =>$this->faker->numerify('mention ######'),
            'libelle' => $this->faker->sentence(4, true),
        ];
    }
}
