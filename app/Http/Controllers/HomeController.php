<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\detailtransaksi;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        $currentMonth = date('m');
        $harini = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->where('detailtransaksis.created_at', Carbon::now()->today())
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();
        $bulan = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->whereRaw('MONTH(detailtransaksis.created_at) = ?',[$currentMonth])
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();
        // dd($bulan);
        $tahun = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->whereYear('detailtransaksis.created_at', Carbon::now()->year)
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();
        $transaksihari = detailtransaksi::where('created_at', Carbon::now()->today())
        ->count('id_transaksi');
        $transaksibulan = detailtransaksi::whereMonth('created_at', Carbon::now()->month)
        ->count('id_transaksi');
        $transaksitahun = detailtransaksi::whereYear('created_at', Carbon::now()->year)
        ->count('id_transaksi');
        return view('pages.index', compact('harini', 'bulan', 'tahun', 'transaksihari', 'transaksibulan', 'transaksitahun'));
    }
    public function harinih(){
        $modal = DB::table('detailtransaksis')->where('created_at', Carbon::today()->month)
        ->selectRaw(' SUM(modal * jumlah) as hasil')->first();
        $jumlah = detailtransaksi::where('created_at', Carbon::now()->today())
        ->sum('jumlah');
        $jual = detailtransaksi::where('created_at', Carbon::now()->today())
        ->sum('subtotal');
        foreach ($modal as $modal) {
            # code...
            $keuntungan = $jual - (int)$modal;
        }
       $currentMonth = date('m');
        $barang = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')
        ->select('barangs.nama', 'barangs.id', 'detailtransaksis.id_transaksi', 'detailtransaksis.jumlah', 'detailtransaksis.subtotal')
        ->where('detailtransaksis.created_at', Carbon::now()->today())
        ->get();
        $harini = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->where('detailtransaksis.created_at', Carbon::now()->today())
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->first();
        $tanggal = Carbon::now()->today()->format('d-m-Y');
        return view('pages.dashboard.harinih', compact('keuntungan', 'barang', 'tanggal', 'harini'));
    }
    public function bulannih(){
        $modal = DB::table('detailtransaksis')->whereMonth('created_at', Carbon::now()->month)
        ->selectRaw(' SUM(modal * jumlah) as hasil')->first();
        $jumlah = detailtransaksi::whereMonth('created_at', Carbon::now()->month)
        ->sum('jumlah');
        $jual = detailtransaksi::whereMonth('created_at', Carbon::now()->month)
        ->sum('subtotal');
        // dd($jual);
        foreach ($modal as $modal) {
            # code...
            $keuntungan = $jual - (int)$modal;
        }
    //    $keuntungan = $jual - $modal;
       $currentMonth = date('m');
        $barang = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')
        ->select('barangs.nama', 'barangs.id', 'detailtransaksis.id_transaksi', 'detailtransaksis.jumlah', 'detailtransaksis.subtotal')
        ->whereMonth('detailtransaksis.created_at', Carbon::now()->month)
        ->get();
        $harini = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->whereMonth('detailtransaksis.created_at', Carbon::now()->month)
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->first();
        $tanggal = Carbon::now()->today()->format('M');
        return view('pages.dashboard.bulannih', compact('keuntungan', 'barang', 'tanggal', 'harini', 'jual'));
    }
    public function tahunnih(){
        $modal = DB::table('detailtransaksis')->whereYear('created_at', Carbon::now()->year)
        ->selectRaw(' SUM(modal * jumlah) as hasil')->first();
        // for ($i=0; $i < count($modal) ; $i++) { 
        //     $mod += $mod + $modal[$i];
        // }
        $jumlah = detailtransaksi::whereYear('created_at', Carbon::now()->year)
        ->select('jumlah')->get();
        $jual = detailtransaksi::whereYear('created_at', Carbon::now()->year)
        ->sum('subtotal');
        // for ($i=0; $i <count($modal) ; $i++) { 
        //     $mod += $mod + ((int)$modal[$i] *(int)$jumlah[$i]);
        // }
        // dd($modal);
        foreach ($modal as $modal) {
            # code...
            $keuntungan = $jual - (int)$modal;
        }
    //    dd($jual);
       $currentMonth = date('m');
        $barang = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')
        ->select('barangs.nama', 'barangs.id', 'detailtransaksis.id_transaksi', 'detailtransaksis.jumlah', 'detailtransaksis.subtotal')
        ->whereYear('detailtransaksis.created_at', Carbon::now()->year)
        ->get();
        $harini = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->whereYear('detailtransaksis.created_at', Carbon::now()->year)
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->first();
        $tanggal = Carbon::now()->today()->format('Y');
        return view('pages.dashboard.tahunnih', compact('keuntungan', 'barang', 'tanggal', 'harini','jual'));
    }
}
