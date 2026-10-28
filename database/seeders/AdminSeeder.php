<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $password = env('SEED_ADMIN_PASSWORD');

        if (blank($password)) {
            $this->command?->warn('SEED_ADMIN_PASSWORD is not set. Skipping admin seeding.');

            return;
        }

        $accounts = [
            [
                'name' => 'Administrator',
                'email' => 'admin@example.test',
                'nip' => '000000000000000001',
                'role' => 'admin',
            ],
            [
                'name' => 'Staff 1',
                'email' => 'staff1@example.test',
                'nip' => '000000000000000002',
                'role' => 'petugas',
            ],
            [
                'name' => 'Staff 2',
                'email' => 'staff2@example.test',
                'nip' => '000000000000000003',
                'role' => 'petugas',
            ],
            [
                'name' => 'Staff 3',
                'email' => 'staff3@example.test',
                'nip' => '000000000000000004',
                'role' => 'petugas',
            ],
        ];

        foreach ($accounts as $account) {
            Admin::updateOrCreate(
                ['email' => $account['email']],
                [...$account, 'password' => $password],
            );
        }
    }
}
