<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterProfile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterProfile::create([
            'isi' => 'Pembangunan Nasional merupakan implementasi nilai tradisional
            Nusantara dan hal ini sesuai dengan sila ke lima dalam Pancasila yang berbunyi :
            “Keadilan sosial bagi seluruh rakyat Indonesia”. Dari segi yuridis Operasional
            UU Nomor 6 Tahun 1997 Pasal 8 : “Masyarakat mempunyai kesempatan yang seluas-luasnya
            untuk mengadakan usaha kesejahteraan sosial dengan mengindahkan garis kebijakan dan
            ketentuan-ketentuan sebagaimana ditetapkan dalam peratuaran perundang-undangan”.
            Berkenaan dengan hal tersebut di atas maka kami Pengurus Pengurus yayasan mendirikan
            asrama Panti Asuhan Yatim Piatu Al-Khairiyah merasa terpanggil untuk melaksanakan usaha
            kegitan kesejahteraan sosial dengan memberikan pelayanan sosial kepada anak yatim dan
            yatim piatu yang tak mampu sebanyak 300 anak Yatim/Yatim Piatu yang ada di lingkungan
            Yayasan Perguruan Islam Al-Khairiyah. Panti Asuhan Yatim Piatu Al-Khairiyah didirikan
            sejak tahun 1967, atas prakarsa oleh al- mukarrom KH. ZARQONI (alm) Pendiri Yayasan
            Perguruan Islam Al-Khairiyah. Pada tahun 1969, Yayasan Al-Khairiyah menerima sebidang
            tanah waqaf dari Bapak SUGANDA, yang diperuntukan sebagai asrama Panti Asuhan Yatim
            Piatu Al-Khairiyah.',
            'img' => 'image1.png',
        ]);
    }
}
