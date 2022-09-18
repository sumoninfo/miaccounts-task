<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $group_id = null;
        if (Group::query()->count() > 0)
            $group_id = Group::all()->random()->id ?? null;
        return [
            'name'      => $this->faker->name(),
            'parent_id' => $this->faker->randomElement([null, $group_id]),
        ];
    }
}
