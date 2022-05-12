<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name'              => 'Varsayılan',
                'slug'              => '/',
                'description'       => 'Varsayılan',
                'image'             => '/',
                'status'            => '0',
                'locale'            => 'tr',
                'meta_title'        => 'Varsayılan Kategori',
                'meta_description'  => 'Varsayılan Kategori',
                'meta_keywords'     => 'Varsayılan Kategori',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
