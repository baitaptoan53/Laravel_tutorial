<?php

namespace Database\Factories;

use App\Enums\CourseStatus;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fist_name' => $this->faker->firstname,
            'last_name' => $this->faker->lastname,
            'birthdate' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'gender' => $this->faker->boolean(),
            'status' => $this->faker->randomElement(CourseStatus::asArray()),
            'course_id' => Course::all()->random()->id,
        ];
    }
}
