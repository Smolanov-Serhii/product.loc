<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\PhoneNumber;
use App\Models\Position;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $this->faker->addProvider(new PhoneNumber($this->faker));

        $all = Employee::all();

        return [
            'full_name' => $this->faker->name,
            'date_of_receipt' => $this->faker->date(),
            'phone_number' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->email,
            'salary' => $this->faker->randomFloat(2,0,500000),
            'boss_id' => $all->count()
                ? $all->random()->id
                : null,
            'position_id' => Position::all()->random()->id,
        ];
    }
}
