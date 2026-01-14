<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'name' => 'صفوان المرعب',
                'email' => 'safwan@example.com',
                'phone' => '777777777',
                'position' => 'مدير المكتب',
                'salary' => 1500.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'أحمد محمد',
                'email' => 'ahmed@example.com',
                'phone' => '733333333',
                'position' => 'موظف حجوزات',
                'salary' => 1000.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
