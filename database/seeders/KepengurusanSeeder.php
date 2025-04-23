<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterKepengurusan;

class KepengurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterKepengurusan::create([
            'judul' => 'Struktur Kepengurusan Panti Asuhan Al-Khairiyah',
            'deskripsi' => 'Struktur Kepengurusan Panti Asuhan Al-Khairiyah',
            'img' => 'kepengurusan.jpeg'
        ]);
    }
}
