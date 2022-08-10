<?php

namespace Database\Factories;

use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'teacher' => $this->faker->name,
            'status' => $this->faker->randomElement(CourseStatus::asArray()), 
        ];
    }
}