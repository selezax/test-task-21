<?php

namespace Tests\DomainsPlans\Models\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\DomainsPlans\Models\Domain;

class DomainFactory extends Factory
{
    protected $model = Domain::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'domain' => fake()->domainName,
        ];
    }
}
