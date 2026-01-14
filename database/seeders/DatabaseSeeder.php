<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            EmployeesTableSeeder::class,
            CustomersTableSeeder::class,
            DriversTableSeeder::class,
            VehiclesTableSeeder::class,
            PassportsTableSeeder::class,
            BookingsTableSeeder::class,
            PaymentsTableSeeder::class,
            CashboxesTableSeeder::class,
            BankTransactionsTableSeeder::class,
            ExpensesTableSeeder::class,
            $this->call(UserSeeder::class),

        ]);

        // User::factory(10)->create();


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }


}

