<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Notification;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;                               
use App\Models\MasterDonasi;
use App\Models\MasterDonatur;
use App\Models\FinanceDonasi;
use App\Models\DonasiDonatur;

class DonasiMidtransController extends Controller
{
    public function __construct(){
        if(env('MIDTRANS_PRODUCTION') == true){
            Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            $this->server_key = env('MIDTRANS_SERVER_KEY');
            $this->base_url = env('MIDTRANS_BASE_URL');
        }else{
            Config::$serverKey = env('MIDTRANS_SERVER_KEY_SB');
            $this->server_key = env('MIDTRANS_SERVER_KEY_SB');
            $this->base_url = env('MIDTRANS_BASE_URL_SB');
        }
        Config::$isProduction = env('MIDTRANS_PRODUCTION');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createPayment(Request $request){
        $data = $request->all();
        // Data diambil dari depan semua
        $firstName = $data['nama_depan'];
        $lastName = $data['nama_belakang'];
        $email = $data['email'];
        $nomorKontak = $data['telepon'];
        $id_donasi = $data['id_donasi'];
        $total = $data['nominal'];
        if (strpos($nomorKontak, '0') === 0) {
            $nomorKontak = '62' . substr($nomorKontak, 1);
        }
        $cmp = MasterDonasi::where('id', $id_donasi)->first();
        \DB::beginTransaction();
        try {
            // Master Donatur
            $cek = MasterDonatur::where('email', $data['email'])->first();
            if($cek){
                $id_master = $cek['id'];
            }else{
                $master_donatur = MasterDonatur::create([
                    'id_donasi' => $id_donasi,
                    'nama_depan' => $firstName,
                    'nama_belakang' => $lastName,
                    'email' => $email,
                    'telepon' => $nomorKontak,
                    'nominal' => $total,
                    'created_at' => now()
                ]);
                $id_master = $master_donatur->id;
            }
            // Donasi Donatur
            $kode_donasi = generateCode();
            $md5_kode = md5($kode_donasi);
            $input = [
                'id' => $md5_kode,
                'kode_donasi' => $kode_donasi,
                'id_donasi' => $id_donasi,
                'id_donatur' => $id_master,
                'nilai_donasi' => $total,
                'status' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $create = DonasiDonatur::create($input);
            $itemDetails = [];
            $ppns = [
                'name' => $cmp['nama_donasi'],
                'price' => $total,
                'quantity' => 1,
                'id' => $cmp['id'],
            ];
            $itemDetails[] = $ppns;
            // Generate payment token
            $params = [
                'transaction_details' => [
                    'order_id' => $kode_donasi,
                    'gross_amount' => $total,
                ],
                'customer_details' => [
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'phone' => $nomorKontak,
                ],
                'item_details' => $itemDetails,
            ];
            $token = Snap::getSnapToken($params);
            // Update link pembayaran
            $link = DonasiDonatur::where('id', $md5_kode)->update(['payment_link' => $this->base_url.$token]);
            \DB::commit();
            return response()->json(['token' => $token, 'order_id' => $kode_donasi, 'success' => true], 200);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['message' => $e->getMessage(), 'success' => false], 500);
        }
    }

    public function notification(){
        $notif = json_decode(file_get_contents('php://input'), true);
        $validate = openssl_digest($notif['order_id'].$notif['status_code'].$notif['gross_amount'].$this->server_key, 'sha512');
        if($validate != $notif['signature_key']){
            return response()->json(['message' => 'Invalid signature', 'success' => false], 401);
        }else{
            if(isset($notif['va_numbers'])){
                $notif['va_number'] = $notif['va_numbers'][0]['va_number'];
                $notif['bank'] = $notif['va_numbers'][0]['bank'];
                // Amounts khusus Bank BNI
                if($notif['va_numbers'][0]['bank'] == 'bni'){
                    if($notif['transaction_status'] == 'pending' || $notif['transaction_status'] == 'expire' || $notif['transaction_status'] == 'cancel'){
                        $notif['paid_at'] = NULL;
                        $notif['amount'] = NULL;
                    }else{
                        $notif['paid_at'] = $notif['payment_amounts'][0]['paid_at'];
                        $notif['amount'] = $notif['payment_amounts'][0]['amount'];
                    }
                }
                // Hilangkan VA Numbers saat dimasukkan karena sudah dimasukkan ke dalam array input
                unset($notif['payment_amounts']);
                unset($notif['va_numbers']);
            }
            \DB::beginTransaction();
            try{
                $check = FinanceDonasi::where('order_id', $notif['order_id'])->first();
                if($check){
                    // Cek apakah sudah settlement, kalau sudah, abaikan notifikasi berikutnya
                    if($check['transaction_status'] !== 'settlement'){
                        $operation = $check->update($notif);
                    }else{
                        // Update data donasi donatur
                        $donatur = DonasiDonatur::where('kode_donasi', $notif['order_id'])->first();
                        $nilai_donasi = $donatur['nilai_donasi'];
                        $donatur->update(['status' => '1', 'updated_at' => now()]);
                        // Masukkan nilai donasi ke master donasi
                        $donasi = MasterDonasi::where('id', $donatur['id_donasi'])->first();
                        $terkumpul_donasi = $donasi['terkumpul_donasi'] + $nilai_donasi;
                        $kekurangan_donasi = $donasi['kekurangan_donasi'] - $nilai_donasi;
                        $rev = [
                            'terkumpul_donasi' => $terkumpul_donasi,
                            'kekurangan_donasi' => $kekurangan_donasi,
                            'updated_at' => now()
                        ];
                        $donasi->update($rev);
                    }
                }else{
                    $operation = FinanceDonasi::create($notif);
                }
                \DB::commit();
                return response()->json(['message' => 'Data saved/updated', 'success' => true], 200);
            }catch(Exception $e){
                \DB::rollBack();
                return response()->json(['message' => $e->getMessage(), 'success' => false], 500);
            }
        }
    }

    public function cancel(Request $request){
        $validate = $request->validate([
            'order_id' => 'required'
        ]);
        $data = $request->all();
        $order_id = $data['order_id'];
        try{
            $cancel = Transaction::cancel($order_id);
            return response()->json(['success' => true], 200);
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage(), 'success' => false], 500);
        }
    }

}
