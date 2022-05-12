<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meta_data')->insert([
            [
                'html_content'      => 'Demo Store',
                'product_service'   => 'Demo Store',
                'footer_left'       => 'Demo Store',
                'footer_center'     => 'Demo Store',
                'slider_allow'      => '1',
                'meta_title'        => 'Demo Store',
                'meta_description'  => 'Demo Store',
                'meta_keywords'     => 'Demo Store',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
