<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterDonatur;
use App\Models\MasterDonasi;
use App\Models\SumbanganDonatur;
use App\Models\FinanceDonatur;

class DonasiMayarController extends Controller
{
    public function __construct(){
        if(env('MAYAR_PRODUCTION') == true){
            $this->base_url = env('MAYAR_BASE_URL_PROD');
            $this->api_key = env('MAYAR_API_KEY_PROD');
            $this->webhook_key = env('MAYAR_WEBHOOK_KEY_PROD');
        }else{
            $this->base_url = env('MAYAR_BASE_URL_DEV');
            $this->api_key = env('MAYAR_API_KEY_DEV');
            $this->webhook_key = env('MAYAR_WEBHOOK_KEY_DEV');
        }
    }

    public function handler(Request $request){
        $json_data = file_get_contents('php://input');

        // Remove trailing comma
        $json_data = preg_replace('/,\s*([\]}])/m', '$1', $json_data);
        $var = json_decode($json_data, true);
        $event_name = $var['event'];
        $data = $var['data'];

        // Masuk ke dalam arraynya data
        $id = $data['id'];
        $status = $data['status'];
        $createdAt = ts_conv($data['createdAt']);
        $updatedAt = ts_conv($data['updatedAt']);
        $merchantId = $data['merchantId'];
        $merchantName = $data['merchantName'];
        $merchantEmail = $data['merchantEmail'];
        $customerName = $data['customerName'];
        $customerEmail = $data['customerEmail'];
        $customerMobile = $data['customerMobile'];
        $amount = $data['amount'];
        $isAdminFeeBorneByCustomer = $data['isAdminFeeBorneByCustomer'];
        $isChannelFeeBorneByCustomer = $data['isChannelFeeBorneByCustomer'];
        $productId = $data['productId'];
        $productName = $data['productName'];
        $productType = $data['productType'];

        if(isset($data['custom_field'][0])){
            $cusfield = $data['custom_field'][0];
            // Masuk ke dalam arraynya custom field
            $name = $cusfield['name'];
            $description = $cusfield['description'];
            $fieldType = $cusfield['fieldType'];
            $isRequired = $cusfield['isRequired'];
            $key = $cusfield['key'];
            $type = $cusfield['type'];
            $value = $cusfield['value'];

            $arr = [
                'id' => $id,
                'event_name' => $event_name,
                'status' => $status,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
                'merchant_id' => $merchantId,
                'merchant_name' => $merchantName,
                'merchant_email' => $merchantEmail,
                'customer_name' => $customerName,
                'customer_email' => $customerEmail,
                'customer_mobile' => $customerMobile,
                'amount' => $amount,
                'is_admin_fee_borne_by_customer' => $isAdminFeeBorneByCustomer,
                'is_channel_fee_borne_by_customer' => $isChannelFeeBorneByCustomer,
                'product_id' => $productId,
                'product_name' => $productName,
                'product_type' => $productType,
                'custom_field_name' => $name,
                'custom_field_description' => $description,
                'custom_field_type' => $fieldType,
                'custom_field_is_required' => $isRequired,
                'custom_field_key' => $type,
                'custom_field_value' => $value,
            ];
        }else{
            $arr = [
                'id' => $id,
                'event_name' => $event_name,
                'status' => $status,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
                'merchant_id' => $merchantId,
                'merchant_name' => $merchantName,
                'merchant_email' => $merchantEmail,
                'customer_name' => $customerName,
                'customer_email' => $customerEmail,
                'customer_mobile' => $customerMobile,
                'amount' => $amount,
                'is_admin_fee_borne_by_customer' => $isAdminFeeBorneByCustomer,
                'is_channel_fee_borne_by_customer' => $isChannelFeeBorneByCustomer,
                'product_id' => $productId,
                'product_name' => $productName,
                'product_type' => $productType,
            ];
        }

        $query = FinanceDonatur::create($arr);

        if($query){
            return response()->json(['success' => true], 200);
        }else{
            return response()->json(['success' => false], 500);
        }
    }

    public function create_payment(Request $request){
        $data = $request->all();
        // Ambil dari depan
        // $id_user = $data['id_user'];
        // $id_user = Auth::guard('penyumbang')->user()->id;
        // $id_campaign = $data['id_campaign'];
        $id_donasi = $data['id_donasi'];
        // $amount = (int)$data['amount'];
        $amount = (int)$data['nominal'];
        $kode_sumbangan = generateCode();
        // Cari di database
        // $query = UserPenyumbang::where('id', $id_user)->first();
        $namaLengkap = $data['nama_depan'] . ' ' . $data['nama_belakang'];
        $email = $data['email'];
        // $id = $query['id'];
        if(!isset($data['telepon'])){
            $nomorKontak = '628123456789';
        }else{
            $nomorKontak = $data['telepon'];
        }
        if (strpos($nomorKontak, '0') === 0) {
            $nomorKontak = '62' . substr($nomorKontak, 1);
        }
        $cmp = MasterDonasi::where('id', $id_donasi)->first();
        $id_sumbangan = md5($kode_sumbangan.generateSuffix());
        // Get current date and time
        $currentDateTime = Carbon::now();
        // Add one day to the current date and time
        $nextDayDateTime = $currentDateTime->addDay();
        // Format the date and time as specified
        $formattedDateTime = $nextDayDateTime->format('Y-m-d\TH:i:s.v\Z');
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => ''.$this->base_url.'/hl/v1/payment/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "name" => $namaLengkap,
                "email" => $email,
                "amount" => $amount,
                "mobile" => $nomorKontak,
                "redirectUrl" => url('/')."?complete=true",
                "description" => $kode_sumbangan . ' - '. $cmp['nama_donasi'],
                "expiredAt" => $formattedDateTime
            ]),
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer '.$this->api_key.'',
                'Content-Type: application/json'
            ],
        ]);
        $crl = curl_exec($curl);
        $response = json_decode($crl, true);
        curl_close($curl);

        // Ambil isinya masukkan ke dalam
        if($response['statusCode'] == 200){
            // Masukkan ke master donatur kalau belum ada
            $query = MasterDonatur::where('email', $email)->first();
            if(!isset($query['id'])){
                $cred = [
                    'id_donatur' => $id_sumbangan,
                    'nama_depan' => $data['nama_depan'],
                    'nama_belakang' => $data['nama_belakang'],
                    'email' => $email,
                    'telepon' => $nomorKontak,
                    'nominal' => $amount,
                ];
                $donatur = MasterDonatur::create($cred);
            }else{
                $donatur = $query;
            }

            // Ambil hasil id createnya
            $id_donatur = $donatur['id'];

            $myrd = $response['data'];
            $arr = [
                'id_sumbangan' => $id_sumbangan,
                'kode_sumbangan' => $kode_sumbangan,
                'id_user_penyumbang' => $id_donatur,
                'id_campaign' => $id_donasi,
                'nilai_sumbangan' => $amount,
                'id_mayar' => $myrd['id'],
                'id_transaction_mayar' => $myrd['transaction_id'],
                'payment_link' => $myrd['link'],
                'status' => '1',
                'created_at' => now(),
            ];
            $charity = SumbanganDonatur::create($arr);
            if($charity){
                // return response()->json(['success' => true, 'transaction' => $arr], 200);
                return redirect($myrd['link']);
            }else{
                return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi nanti.');
            }
        }else{
            return back()->with('error', 'Kode error: '.$response['statusCode'].'. Silakan coba lagi nanti.');
        }
    }

    public function cancel_payment(Request $request){
        $data = $request->all();
        $id_mayar = $data['id_mayar'];
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => ''.$this->base_url.'/hl/v1/payment/close/'.$id_mayar,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer '.$this->api_key.''
            ],
        ]);
        $crl = curl_exec($curl);
        $response = json_decode($crl, true);
        curl_close($curl);
        if($response['statusCode'] == 200){
            $charity = SumbanganDonatur::where('id_mayar', $id_mayar)->update(['status' => '1']);
            if($charity){
                // return response()->json(['success' => true], 200);
                return redirect()->route('beranda')->with('success', 'Berhasil membatalkan donasi');
            }else{
                // return response()->json(['success' => false], 500);
                return redirect()->route('beranda')->with('error', 'Terjadi kesalahan. Silakan coba lagi nanti.');
            }
        }else{
            // return response()->json(['success' => false], $response['statusCode']);
            return redirect()->with('error', 'Kode error: '.$response['statusCode'].'. Silakan coba lagi nanti.');
        }
    }
}
