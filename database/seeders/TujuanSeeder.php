<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterTujuan;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterTujuan::create([
            'isi' => 'Memberikan pendidikan dan pengajaran nilai-nilai Agama Islam serta kecakapan hidup bagi anak asuh.',
        ]);

        MasterTujuan::create([
            'isi' => 'Mendidik dan memberikan keteladanan kepada anak asuh dalam membangun sikap mental, pengetahuan wawasan dan keterampilan membentuk generasi yang berkualitas secara moral maupun ilmu pengetahuan.',
        ]);

        MasterTujuan::create([
            'isi' => 'Membantu pemerintah dalam usaha melaksanakan program kesejahteraan.',
        ]);
    }
}
