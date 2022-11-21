<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $leader = User::all()->first();
        $statusId = rand(1, 2);


        return [
            'name' => fake()->company(),
            'leader_id' => $leader->id,
            'status_id' => Status::find($statusId),
        ];
    }
}
