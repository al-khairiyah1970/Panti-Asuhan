<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterAnak;
use App\Models\MasterGambarAnak;
use App\Models\MasterDonasi;
use App\Models\MasterProfile;
use App\Models\MasterVisi;
use App\Models\MasterMisi;
use App\Models\MasterTujuan;
use App\Models\MasterBanner;
use App\Models\MasterProgram;
use App\Models\MasterKepengurusan;

class LandingController extends Controller
{

    // Beranda
    public function beranda(){
        // Profile
        $profile = MasterProfile::first();
        // Visi
        $visi = MasterVisi::first();
        // Misi
        $misi = MasterMisi::all();
        // Tujuan
        $tujuan = MasterTujuan::all();
        // Banner
        $banner = MasterBanner::all();
        // Donasi
        $donasi = MasterDonasi::where('deleted_at', NULL)->orderBy('created_at', 'desc')->get();
        return view('landing.beranda.index', compact('banner', 'profile', 'visi', 'misi', 'tujuan', 'donasi'));
    }

    // Program
    public function program(){
        $mingguan = MasterProgram::orderBy('created_at', 'desc')->where('jenis', 'mingguan')->get();
        $bulanan = MasterProgram::orderBy('created_at', 'desc')->where('jenis', 'bulanan')->get();
        $tahunan = MasterProgram::orderBy('created_at', 'desc')->where('jenis', 'tahunan')->get();
        return view('landing.program.index', compact('mingguan', 'tahunan', 'bulanan'));
    }

     // Donasi
     public function donasi(){
        $donasi = MasterDonasi::where('deleted_at', NULL)->orderBy('created_at', 'desc')->get();
        return view('landing.donasi.index', compact('donasi'));
    }

    public function donasi_step_two($id){
        $donasi = MasterDonasi::where('id', $id)->first();
        if(env('MIDTRANS_PRODUCTION') == true){
            $base_url = env('MIDTRANS_BASE_URL');
        }else{
            $base_url = env('MIDTRANS_BASE_URL_SB');
        }
        return view('landing.donasi.donasi2', compact('donasi', 'base_url'));
    }

    public function donasi_step_three(){
        return view('landing.donasi.donasi3');
    }

    // Anak
    public function anak(){
        $gambar = MasterGambarAnak::all();
        $anak = MasterAnak::orderBy('usia', 'asc')->get();
        return view('landing.anak.index', compact('anak', 'gambar'));
    }

    public function kepengurusan(){
        $kepengurusan = MasterKepengurusan::first();
        return view('landing.kepengurusan.index', compact('kepengurusan'));
    }

}
