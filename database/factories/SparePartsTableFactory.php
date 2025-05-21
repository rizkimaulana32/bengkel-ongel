<?php

namespace Database\Factories;

use App\Models\SparePart;
use Illuminate\Database\Eloquent\Factories\Factory;

class SparePartsTableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SparePart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'spare_part_id' => $this->faker->unique()->numberBetween(1000, 9999),
            'name' => $this->faker->word,
            'stock' => $this->faker->numberBetween(10, 50),
            'description' => $this->faker->word,
            'price' => $this->faker->numberBetween(10000, 500000),
            'entry_date' => $this->faker->dateTimeThisYear,
        ];
    }
}
