<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Message;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'email' => 'rajesh@hamal.com',
            'name' => 'Rajesh Hamal',
            'password' => Hash::make('password')
        ]);

        User::factory(10)->create();
        User::all()->each(function (User $user) {
            $services = Service::factory(10)->create([
                'user_id' => $user->id,
            ]);

            $customers = Customer::factory(10)->create([
                'user_id' => $user->id,
            ]);

            Appointment::factory(10)->state(new Sequence(
                fn(Sequence $sequence) => [
                    'user_id' => $user->id,
                    'service_id' => $services->random()->id,
                    'customer_id' => $customers->random()->id,
                ]
            ))->create();

            Message::factory(10)->state(new Sequence(
                fn(Sequence $sequence) => [
                    'user_id' => $user->id,
                    'customer_id' => $customers->random()->id,
                ]
            ))->create();
        });
    }
}
