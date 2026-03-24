<?php

namespace Database\Seeders;

use App\Models\Barangay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BarangaySeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('portal.pilot_barangays', []) as $barangayName) {
            Barangay::updateOrCreate(
                ['name' => $barangayName],
                [
                    'slug' => Str::slug($barangayName),
                    'is_active' => true,
                ]
            );
        }
    }
}
