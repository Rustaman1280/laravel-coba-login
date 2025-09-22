<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departemen = [
            ['kodedepartemen' => '110', 'nama_departemen' => 'HRD'],
            ['kodedepartemen' => '111', 'nama_departemen' => 'IT'],
            ['kodedepartemen' => '112', 'nama_departemen' => 'Finance'],
            ['kodedepartemen' => '113', 'nama_departemen' => 'Marketing'],
            ['kodedepartemen' => '114', 'nama_departemen' => 'Sales'],
        ];
        DB::table('departemen')->insert($departemen);
    }
}
