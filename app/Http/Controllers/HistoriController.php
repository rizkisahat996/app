<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use str;
use PDF;
class HistoriController extends Controller
{
    public function penjualan(){
        $penjualan = DB::table('log_transaksis')->join('users', 'users.id', '=', 'log_transaksis.user_id')
        ->select('log_transaksis.*', 'users.name')->latest()->get();
  
        return view('pages.histori.penjualan', compact('penjualan'));
    }
    public function barang(){
        $barang = DB::table('log_barang')->latest()->get();
  
        return view('pages.histori.barang', compact('barang'));
    }
    public function index(){
        return view('pages.histori.index');
    }

    public function jurnal()
    {
        $penjualan = DB::table('log_transaksis')
            ->select('log_transaksis.*')
            ->get();
        

        
        return view('pages.histori.jurnal', compact('penjualan'));
    }

    public function show($id)
    {
        $penjualan = DB::table('log_transaksis')
            ->where('log_transaksis.id', $id)
            ->first();
        
        $detail = DB::table('log_detail')
            ->where('id_transaksi', '=', $id)
            ->join('barangs', 'log_detail.id_barang', '=', 'barangs.id')
            ->join('log_transaksis', 'log_detail.id_transaksi', '=', 'log_transaksis.id')
            ->join('pelanggans', 'log_transaksis.pelanggan_id', '=', 'pelanggans.id')
            ->select('log_detail.*', 'barangs.*', 'log_transaksis.*', 'pelanggans.nama AS pelanggan_nama')
            ->get();

        return view('pages.histori.show', compact('penjualan', 'detail'));
    }

    public function stok()
    {
        $detail = DB::table('log_barang')
                ->get();
        
        // dd($detail);
        return view('pages.histori.stok', compact('detail'));
    }

    public function stokprint(){
       
        $detail = DB::table('log_barang')
                ->get();
    
            $count = count($detail);
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pages.histori.stokprint', compact('detail'));

            return $pdf->stream();
        }
    public function transprint($id, Request $request){
       
        $penjualan = DB::table('log_transaksis')
            ->where('log_transaksis.id', $id)
            ->first();
        
        $detail = DB::table('log_detail')
            ->where('id_transaksi', '=', $id)
            ->join('barangs', 'log_detail.id_barang', '=', 'barangs.id')
            ->join('log_transaksis', 'log_detail.id_transaksi', '=', 'log_transaksis.id')
            ->join('pelanggans', 'log_transaksis.pelanggan_id', '=', 'pelanggans.id')
            ->select('log_detail.*', 'barangs.*', 'log_transaksis.*', 'pelanggans.nama AS pelanggan_nama')
            ->get();
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pages.histori.transprint', compact('detail', 'penjualan'));

            return $pdf->stream();
        }
}
