<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterBanner;

class BannerController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    public function add_banner(){
        return view('admin.beranda.banner.add');
    }

    public function edit_banner(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $banner = MasterBanner::findOrFail($id);
        if($banner){
            return view('admin.beranda.banner.edit', compact('banner'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function add_banner_aksi(Request $request){
        $data = $request->all();
        // Gambar
        $image = request()->file('img');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('uploads/banner'), $filename);
        $data['img'] = $filename;
        \DB::beginTransaction();
        try{
            $query = MasterBanner::create($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Banner berhasil ditambahkan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function edit_banner_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        \DB::beginTransaction();
        try{
            $query = MasterBanner::where('id', $data['id'])->first();
            if(request()->file('img')){
                $image = request()->file('img');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('uploads/banner'), $filename);
                $data['img'] = $filename;
                // Hapus gambar lama
                if(is_file(public_path('uploads/banner/'.$query->img)) && $query->img !== $filename){
                    unlink(public_path('uploads/banner/'.$query->img));
                }
            }
            $query->update($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Banner berhasil diubah');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function delete_banner_aksi($id){
        \DB::beginTransaction();
        try{
            $query = MasterBanner::where('id', $id)->first();
            $query->delete();
            \DB::commit();
            // Hapus gambar
            if(is_file(public_path('uploads/banner/'.$query->img))){
                unlink(public_path('uploads/banner/'.$query->img));
            }
            return redirect()->route('dashboard')->with('success', 'Data banner berhasil dihapus');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

}
