<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@masterlube.test');
        $password = env('ADMIN_PASSWORD');
        $generated = false;

        if (! $password) {
            $password = Str::password(16);
            $generated = true;
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Super Admin',
                'password' => $password,
                'role' => UserRole::SuperAdmin,
                'email_verified_at' => now(),
            ]
        );

        if ($generated) {
            $this->command?->warn("Admin user created: {$email} / {$password} (set ADMIN_EMAIL/ADMIN_PASSWORD in .env to control this)");
        } else {
            $this->command?->info("Admin user created/updated: {$email}");
        }
    }
}
