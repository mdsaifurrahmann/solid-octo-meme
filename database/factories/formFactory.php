<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\form;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\form>
 */
class formFactory extends Factory
{

    protected $model = form::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "full_name" => $this->faker->name,
            "roll" => $this->faker->unique()->numberBetween(1, 1000),
            "student_id" => $this->faker->unique()->numberBetween(1, 1000),
            "dob" => $this->faker->dateTime(),
            "fathers_name" => $this->faker->name,
            "mothers_name" => $this->faker->name,
            "department" => Str::random(10),
            "semester" => '1st',
            "blood" => 'A+',
            "country" => 'BD',
            "language" => '[en]',
            "phone" => $this->faker->phoneNumber(),
            "email" => $this->faker->unique()->safeEmail,
            "gender" => 'male',
            "hobby" => '[Gardening]',
            "file" => 'filename'
        ];
    }
}
