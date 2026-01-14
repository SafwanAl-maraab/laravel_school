<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * تشغيل Seeder لتوليد حساب المستخدم الافتراضي.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'safwan@gmail.com'], // 🔹 البريد الذي سيتم البحث عنه أو إنشاؤه
            [
                'name' => 'مدير النظام', // 🔹 الاسم الكامل
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'), // 🔹 كلمة المرور (مشفّرة)
            ]
        );
    }
}
