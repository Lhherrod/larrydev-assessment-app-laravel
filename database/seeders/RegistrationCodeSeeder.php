<?php

namespace Database\Seeders;

use App\Models\RegistrationCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RegistrationCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegistrationCode::create([
            'ulid' => Str::ulid()
        ]);
    }
}
