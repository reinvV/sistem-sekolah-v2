<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => fake()->unique()->numerify('####'),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'class' => fake()->randomElement(['10 AKL', '11 AKL', '12 AKL', '10 TKJ', '11 TKJ', '12 TKJ', '10 BID', '11 BID', '12 BID']),
            'major' => fake()->randomElement(['AKL', 'TKJ', 'BID'])
        ];
    }
}