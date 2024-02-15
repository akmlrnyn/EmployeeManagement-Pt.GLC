<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PotonganBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('potongan_bonuses')->insert([
            'bonus_overtime' => 20_000,
            'potongan_terlambat' => 20_000,
        ]);
    }
}
