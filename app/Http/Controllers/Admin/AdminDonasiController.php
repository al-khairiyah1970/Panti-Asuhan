<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterDonasi;

class AdminDonasiController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    public function donasi(){
        $donasi = MasterDonasi::where('deleted_at', NULL)->get();
        return view('admin.donasi.index', compact('donasi'));
    }

    public function add_donasi(){
        return view('admin.donasi.add');
    }

    public function edit_donasi(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $donasi = MasterDonasi::findOrFail($id);
        if($donasi){
            return view('admin.donasi.edit', compact('donasi'));
        }else{
            return redirect()->route('admin_donasi')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function add_donasi_aksi(Request $request){
        $data = $request->all();
        // Gambar
        $image = request()->file('img');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('uploads/donasi'), $filename);
        $data['img_donasi'] = $filename;
        $data['terkumpul_donasi'] = 0;
        $data['kekurangan_donasi'] = $data['target_donasi'];
        \DB::beginTransaction();
        try{
            $query = MasterDonasi::create($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data donasi berhasil ditambahkan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function edit_donasi_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        \DB::beginTransaction();
        try{
            $query = MasterDonasi::where('id', $data['id'])->first();
            if(request()->file('img')){
                $image = request()->file('img');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('uploads/donasi'), $filename);
                $data['img_donasi'] = $filename;
                // Hapus gambar lama
                if(is_file(public_path('uploads/donasi/'.$query->img_donasi)) && $query->img_donasi !== $filename){
                    unlink(public_path('uploads/donasi/'.$query->img_donasi));
                }
            }
            $query->update($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data donasi berhasil diubah');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function delete_donasi_aksi($id){
        \DB::beginTransaction();
        try{
            $query = MasterDonasi::where('id', $id)->first();
            // $query->delete();
            $query->update(['deleted_at' => now()]);
            \DB::commit();
            // Hapus gambar
            if(is_file(public_path('uploads/donasi/'.$query->img_donasi))){
                unlink(public_path('uploads/donasi/'.$query->img_donasi));
            }
            return redirect()->route('dashboard')->with('success', 'Data donasi berhasil dihapus');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }
}
