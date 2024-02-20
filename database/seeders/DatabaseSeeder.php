<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@email.com',
             'password' => bcrypt('admin'),
             'type' => UserType::ADMIN,
             'nim' => 'admin'
         ]);

         \App\Models\PaymentType::query()->create([
             'name' => 'PENDAFTARAN MHS BARU',
             'for' => UserType::APPLICANT,
             'amount' => 400000,
         ]);
         \App\Models\PaymentType::query()->create([
             'name' => 'Biaya Pembangunan',
             'for' => UserType::PRE_MEMBER,
             'amount' => 3000000
         ]);
         foreach (range(1, 14) as $num) {
             \App\Models\PaymentType::query()->create([
                 'name' => 'Pembayaran SPP ' . $num,
                 'for' => UserType::MEMBER,
                 'amount' => 5600000
             ]);
         }
        \App\Models\PaymentType::query()->create([
            'name' => 'Remedial/SP',
            'for' => UserType::MEMBER,
            'amount' => 50000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'PKL',
            'for' => UserType::MEMBER,
            'amount' => 150000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'WISUDA',
            'for' => UserType::MEMBER,
            'amount' => 2900000
        ]);
        foreach (range(1, 4) as $num) {
            \App\Models\PaymentType::query()->create([
                'name' => 'CISCO ' . $num,
                'for' => UserType::MEMBER,
                'amount' => 300000
            ]);
        }
        \App\Models\PaymentType::query()->create([
            'name' => 'Basic English',
            'for' => UserType::MEMBER,
            'amount' => 500000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'Advance English',
            'for' => UserType::MEMBER,
            'amount' => 550000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'Test TOEFL',
            'for' => UserType::MEMBER,
            'amount' => 550000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'PKL',
            'for' => UserType::MEMBER,
            'amount' => 150000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'Psikologi Psikotest',
            'for' => UserType::MEMBER,
            'amount' => 75000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'SKRIPSI',
            'for' => UserType::MEMBER,
            'amount' => 1050000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'Workshop Pengembangan Karir',
            'for' => UserType::MEMBER,
            'amount' => 100000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'LSP-Pengembangan Web',
            'for' => UserType::MEMBER,
            'amount' => 450000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'LSP-Software Development',
            'for' => UserType::MEMBER,
            'amount' => 450000
        ]);
        \App\Models\PaymentType::query()->create([
            'name' => 'Lisensi Microsoft',
            'for' => UserType::MEMBER,
            'amount' => 50000
        ]);
        // \App\Models\PaymentMethod::query()->create([
        //     'name' => 'BRI (Bank Rakyat Indonesia)',
        // ]);
        \App\Models\PaymentMethod::query()->create([
            'name' => 'BSB (Bank SUMSEL)',
        ]);
    }
}
