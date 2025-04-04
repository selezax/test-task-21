<?php
// php artisan db:seed --class=\\Tests\\DomainsPlans\\Seeders\\TestDomainSeeder

namespace Tests\DomainsPlans\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Tests\DomainsPlans\Models\Domain;

class TestDomainSeeder extends Seeder
{
    public function run()
    {
        Domain::factory(45)->create([
            'domain' => fn() => Str::random(3) . fake()->domainName
        ]);
    }
}
