<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterVisi;

class VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterVisi::create([
            'isi' => 'Menjadi Yayasan yang unggul dalam menyelenggarakan kegitan pendidikan,
            pelatihan, kesehatan, sosial dan keagamaan berdasarkan nilai-nilai keislaman.',
        ]);
    }
}
