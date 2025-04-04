<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Tests\DomainsPlans\Models\Plan;
use Tests\DomainsPlans\Seeders\CreatePlansSeeder;
use Tests\DomainsPlans\Seeders\TestDomainSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CreatePlansSeeder::class);

        User::factory()->create([
            'is_admin' => true,
            'name' => 'admin',
            'email' => 'admin@local.local',
            'plan_id' => fn() => Plan::inRandomOrder()->first()->id,
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'is_admin' => false,
            'name' => 'user',
            'email' => 'user@local.local',
            'plan_id' => fn() => Plan::inRandomOrder()->first()->id,
            'password' => bcrypt('password'),
        ]);


        User::factory(10)->create([
            'is_admin' => true,
            'name' => 'admin_' . fake()->userName(),
            'email' => fn() => fake()->email(),
            'plan_id' => fn() => Plan::inRandomOrder()->first()->id,
            'password' => bcrypt('password'),
        ]);

        User::factory(30)->create([
            'is_admin' => false,
            'name' => fake()->userName(),
            'email' => fn() => fake()->email(),
            'plan_id' => fn() => Plan::inRandomOrder()->first()->id,
            'password' => bcrypt('password'),
        ]);

        $this->call(TestDomainSeeder::class);
    }
}
