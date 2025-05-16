<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user =  User::all()->random();

        while(count($user->categories) == 0 ){
            $user =  User::all()->random();

        }
        return [
            'is_done' => $this->faker->boolean(),
            'title' => fake()->name(),
            'description' => fake()->unique()->safeEmail(),
            'due_date' => now(),
            'user_id'=>  $user,
            'category_id' => $user->categories->random(),

        ];
    }
}
