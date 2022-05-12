<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'              => 'Example',
                'email'             => 'admin@example.com',
                'password'          => '$2y$10$sAdo5Xbni1fvIDgqAWcjuOJ82T17pv2hrQRqOst.eWBt1qaUlsmCe',
                'remember_token'    => Str::random(10),
                'role_id'           => User::Admin,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
