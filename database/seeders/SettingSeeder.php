<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::firstOrCreate([
            'key' => 'color',
        ], ['value' => '#F7A826']);

        Setting::firstOrCreate([
            'key' => 'phone',
        ], ['value' => '+56939450537']);

        Setting::firstOrCreate([
            'key' => 'email',
        ], ['value' => 'info@orosolar.com']);

        Setting::firstOrCreate([
            'key' => 'address',
        ], ['value' => 'KLLG St, No.99, Pku City, ID 28289']);

        Setting::firstOrCreate([
            'key' => 'schedule',
        ], ['value' => 'Lun - Jue : 09:00 - 17:00']);

        Setting::firstOrCreate([
            'key' => 'favicon',
        ], ['value' => null]);
    }
}

