<?php
// php artisan db:seed --class=\\Tests\\DomainsPlans\\Seeders\\CreatePlansSeeder

namespace Tests\DomainsPlans\Seeders;

use Illuminate\Database\Seeder;
use Tests\DomainsPlans\Models\Plan;

class CreatePlansSeeder extends Seeder
{
    public function run()
    {
        $plans = (array)json_decode('[
        {
            "plan_name": "Basic",
            "price": 10,
            "features": {
                "Storage": "10GB",
                "Users": "1 User"
            }
        },
        {
            "plan_name": "Standard",
            "price": 25,
            "features": {
                "Storage": "50GB",
                "Support": "Email & Chat Support",
                "Users": "Up to 5 Users"
            }
        },
        {
            "plan_name": "Premium",
            "price": 50,
            "features": {
                "Storage": "200GB",
                "Support": "Priority Support, Daily reports",
                "Users": "Unlimited Users"
            }
        }]'
    , true);

        foreach ($plans as $plan) {
            Plan::updateOrCreate([
                'plan_name' => (string)$plan['plan_name'],
            ],[
                'price' => (float)$plan['price'],
                'features' => (array)$plan['features'],
            ]);
        }
    }
}
