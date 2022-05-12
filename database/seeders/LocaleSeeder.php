<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locales')->insert([
            [
                'code'              => 'tr',
                'name'              => 'Türkçe',
                'image'             => 'flags/tr.webp',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'code'              => 'en',
                'name'              => 'English',
                'image'             => 'flags/en.webp',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
