<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Enums\VendorStatus;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        $vendors = [
            ['name' => 'Acme Goods', 'email' => 'acme@vendor.test'],
            ['name' => 'PinePeak Supply', 'email' => 'pinepeak@vendor.test'],
        ];

        foreach ($vendors as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'role' => UserRole::Vendor,
                    'email_verified_at' => now(),
                ],
            );

            Vendor::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'store_name' => $data['name'],
                    'slug' => Str::slug($data['name']),
                    'description' => "Sample storefront for {$data['name']}.",
                    'status' => VendorStatus::Approved,
                    'approved_at' => now(),
                ],
            );
        }
    }
}
