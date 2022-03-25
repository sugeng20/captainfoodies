<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Makanan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kategori' => 'Minuman', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
