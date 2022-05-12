<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LocaleSeeder::class);
        $this->call(ConfigurationSeeder::class);
        $this->call(MetaDataSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
