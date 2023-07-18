<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pelanggan;
use App\Models\SuratJalan;
use App\Models\DetailJalan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Auth;
use Redirect;
use Exception;
use PDF;
use DB;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = barang::orderBy('nama')->get();
        $pelanggan = pelanggan::get();
        return view('pages.suratjalan.index', compact('data', 'pelanggan'));
    }

    public function detail($id_barang)
    {
        $data =barang::where('id',$id_barang)->first();
        
        return response()->json([
            'data'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // code...
        $tgl = $request->tgl_beli;
        // $jumlah = DB::table('surat_jalans')->where('created_at', $tgl);
        $jumlah = SuratJalan::get();
        $hasil = $jumlah->count() + 1;
        $kodejalan = "SJ - BY/" . date('Y') . "/" . sprintf("%03d", $hasil);
        for ($i=0; $i <count($request->nama) ; $i++) { 
            $barang = barang::where('id', $request->nama[$i]);
            $barang->decrement('stok', $request->jumlah[$i]);
        }
        
        $uuid = str::uuid();

        $id = sprintf($hasil);
        SuratJalan::insert([
            'id' => $id,
            'pelanggan_id' => $request->pelanggan_id,
            'kodejalan'=> $kodejalan,
            'kodejalak'=> $uuid,
            'nomor_polisi' => $request->nomor_polisi,
            'created_at' => $tgl,
        ]);
        for ($i=0; $i <count($request->nama) ; $i++) {
            $detail = DetailJalan::insert([
                'surat_id' => $id,
                'barang_id' => $request->nama[$i],
                'jumlah' => $request->jumlah[$i],
                'kuantitas' => $request->kuantitas[$i],
                'keterangan' => $request->keterangan[$i],
                'created_at' => $tgl,
            ]);
        }
       
        return redirect()->route('preview-surat', ['id' => $id]);
    } catch (\Throwable  $e) {
        dd($e);
        alert()->error('Gagal', 'Data yang Anda masukkan tidak valid, silakan periksa kembali.');
        return back();
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = SuratJalan::find($id);
        $hasil = barang::select('nama', 'id')->get();
        $data = DetailJalan::where('surat_id',$id)->join('barangs', 'detail_jalans.surat_id', '=', 'barangs.id')->select('detail_jalans.*', 'barangs.nama')->get();
        // dd($hasil);
        return view('pages.suratjalan.edit', compact('data', 'transaksi', 'hasil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            SuratJalan::where('id',$id )->update([
                'nomor_polisi' => $request->nomor_polisi,
                'created_at' => $request->tgl_beli,
            ]);
            DetailJalan::where('surat_id', $id)->delete();
            for ($i=0; $i <count($request->nama) ; $i++) {
                $detail = DetailJalan::where('surat_id', $id)->insert([
                    'surat_id' => $id,
                    'barang_id' => $request->nama[$i],
                    'jumlah' => $request->jumlah[$i],
                    'kuantitas' => $request->kuantitas[$i],
                    'created_at' => $request->tgl_beli,
                ]);
            }
            return redirect()->route('preview-surat', ['id' => $id]);
        } catch (\Throwable $th) {
            alert()->error('Gagal','Data yang anda masukkan tidak valid, Silahkan cek kembali');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        SuratJalan::where('id', $id)->delete();
        
        alert()->success('Berhasil','Berhasil Menghapus Surat');
        return redirect('/suratjalann');
    }

    public function preview($id){
        $transaksi = SuratJalan::where('id',$id)->first();
        $detail = DetailJalan::where('surat_id',$id)->join('barangs', 'detail_jalans.barang_id', '=', 'barangs.id')->get();
        // dd($detail);
        return view('pages.suratjalan.preview', compact('transaksi', 'detail'));
    }

    public function pdf($id, Request $request){
        $transaksi = SuratJalan::where('id', '=', $id)->first();
        $detail = DetailJalan::where('surat_id', '=', $id)->join('barangs', 'detail_jalans.barang_id', '=', 'barangs.id')->get();
        
            $count = count($detail);
            $transaksi->detail = $detail;
          
            switch ($count % 5) {
                case 1:
                    $break = $count + 4;
                    break;
                
                case 2:
                    $break = $count + 3;
                    break;
                
                case 3:
                    $break = $count + 2;
                    break;
                
                case 4:
                    $break = $count + 1;
                    break;
                
                default:
                $break = $count;
                    break;
            }
            $tes = $break / 5;
            $pdf = PDF::loadview('pages.suratjalan.pdf', compact('transaksi','detail', 'count', 'tes'));
            return $pdf->download($transaksi['kodejalan'].'.pdf');
        }
        public function suratjalann(Request $request)
        {
            $data['tgl_awal'] = $request->query('tgl_awal');
            $data['tgl_akhir'] = $request->query('tgl_akhir');
        
            $transaksi = DB::table('surat_jalans')
                ->join('pelanggans', 'surat_jalans.pelanggan_id', '=', 'pelanggans.id')
                ->select('surat_jalans.*', 'pelanggans.nama', 'pelanggans.perusahaan');
        
            if ($data['tgl_awal']) {
                $transaksi->whereDate('created_at', '>=', $data['tgl_awal']);
            }
        
            if ($data['tgl_akhir']) {
                $transaksi->where('created_at', '<=', $data['tgl_akhir']);
            }
        
            $hasil = $transaksi->get();
        
            return view('pages.suratjalan.surat', compact('hasil', 'data'));
        }

}
