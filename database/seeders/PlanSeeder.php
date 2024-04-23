<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic Plan',
                'description' => 'Standard features with basic support',
                'price' => 29.99,
                'interval' => 30, // Monthly interval
                'trial_period_days' => 7, // 7 days trial period
            ],
            [
                'name' => 'Pro Plan',
                'description' => 'Advanced features with priority support',
                'price' => 49.99,
                'interval' => 30, // Monthly interval
                'trial_period_days' => 14, // 14 days trial period
            ],
            [
                'name' => 'Enterprise Plan',
                'description' => 'Customized features with dedicated support',
                'price' => 99.99,
                'interval' => 30, // Monthly interval
                'trial_period_days' => 30, // 30 days trial period
            ],
        ];

        // Insert plans data into the database
        foreach ($plans as $plan) {
            Plan::create($plan);
        }

    }
}
