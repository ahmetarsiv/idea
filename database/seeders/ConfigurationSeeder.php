<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            [
                'copyright'         => '© Copyright All rights reserved.',
                'copyright_allow'   => '0',
                'blog_allow'        => '0',
                'product_allow'     => '0',
                'category_allow'    => '0',
                'cms_allow'         => '0',
                'custom_css'        => '',
                'custom_js'         => '',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
