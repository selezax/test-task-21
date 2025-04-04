<?php

namespace Tests\DomainsPlans\Models\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\DomainsPlans\Models\Plan;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition(): array
    {
        $cnt = rand(1, 10);
        return [
            'plan_name' => fake()->jobTitle,
            'price' => fake()->numberBetween(100, 900),
            'features' =>  [
                '"Storage' => ($cnt * 10) . 'GB',
                'Users' => $cnt . ' User'
                ],
        ];
    }
}
