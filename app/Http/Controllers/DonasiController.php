<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDonatur;
use App\Models\MasterDonasi;

class DonasiController extends Controller
{
    public function handler(Request $request){

    }

    public function create_payment(Request $request){
        $data = $request->all();
        $data['id_donasi'] = $data['id'];

        // Cek master donasi
        $query_donasi = MasterDonasi::where('id', $data['id'])->first();
        $target_donasi = $query_donasi['target_donasi'];
        $terkumpul_donasi = $query_donasi['terkumpul_donasi'];
        $kekurangan_donasi = $query_donasi['kekurangan_donasi'];

        // Hitung penambahan dan pengurangan
        $hitung_terkumpul = $terkumpul_donasi + $data['nominal'];
        $hitung_kurang = $target_donasi - $hitung_terkumpul;
        $rev = [
            'terkumpul_donasi' => $hitung_terkumpul,
            'kekurangan_donasi' => $hitung_kurang
        ];

        \DB::beginTransaction();

        try {
            $tambah_donatur = MasterDonatur::create($data);
            $update_donasi = $query_donasi->update($rev);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->route('donasi')->with('error', $e->getMessage());
        }

        // Sementara
        return redirect()->route('donasi_step_three');
    }

    public function cancel_paynment(Request $request){

    }
}
