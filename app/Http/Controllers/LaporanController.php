<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use App\Exports\LabaExport;
use App\Models\transaksi;
use App\Models\detailtransaksi;
use Excel;
use Redirect;
class LaporanController extends Controller
{
    public function index(Request $request){
        try {
            return Excel::download(new LaporanExport($request->tgl_awal,$request->tgl_akhir), 'LaporanTransaksi.xlsx');
        } catch (\Throwable $th) {
            // dd($th);
            alert()->error('Gagal','Silahkan masukkan tanggal dengan benar');
            return Redirect::back();
        }
    }
    public function laba(Request $request){
       try {
        //code...
        return Excel::download(new LabaExport($request->tgl_awal,$request->tgl_akhir), 'LaporanLaba.xlsx');
       } catch (\Throwable $th) {
        alert()->error('Gagal','Silahkan masukkan tanggal dengan benar');
        return Redirect::back();
       }
    }
    public function view(){
        return view('pages.laporan.index');
    }
}
