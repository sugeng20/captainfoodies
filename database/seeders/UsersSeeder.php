<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'nama_lengkap'  => 'Gina Noviani',
                'username'      => 'ginanoviani',
                'password'      => Hash::make('12345'),
                'no_whatsapp'   => '08986197726',
            ],
            [
                'nama_lengkap'  => 'Sugeng',
                'username'      => 'sugeng',
                'password'      => Hash::make('12345'),
                'no_whatsapp'   => '083843063532',
            ]
        ]);
    }
}
