<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\transaksi;
use App\Models\detailtransaksi;
use App\Models\pelanggan;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Str;
use Redirect;
use Exception;
use PDF;
use DB;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = barang::orderBy('nama')->get();
        $pelanggan = pelanggan::get();
        return view('pages.kasir.index', compact('data', 'pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail($id_barang)
    {
        $data =barang::where('id',$id_barang)->first();
        
        return response()->json([
            'data'=>$data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'grandtotal' => 'required|numeric|min:0',
                'pembayaran' => 'required|numeric|min:' . $request->grandtotal,
                'jenispembayaran' => 'required|in:tunai,non-tunai,belum-dibayar',
                'tgl_beli' => 'required|date', 
                'nama.*' => 'required', 
                'jumlah.*' => 'required|numeric|min:1', 
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
    
            // try {
                // code...
                // $jumlah = DB::table('transaksis')->where('created_at', $request->tgl_beli);
                $jumlah = DB::table('transaksis')->get();
                $hasil = $jumlah->count() + 1;
                // dd($hasil);
                $id = sprintf("%03d", $hasil);
                $kodefaktur = "NF - TH/" . date('Y') . "/" . sprintf("%03d", $hasil);
                $kodeproforma = "PRO - BY/" . date('Y') . "/" . sprintf("%03d", $hasil);
                $kodejalan = "SJ - BY/" . date('Y') . "/" . sprintf("%03d", $hasil);
                for ($i=0; $i <count($request->nama) ; $i++) { 
                    $barang = barang::where('id', $request->nama[$i]);
                    $barang->decrement('stok', $request->jumlah[$i]);
                }
                $uuid = str::uuid();
                $grandtotal = $request->grandtotal;
                $pembayaran = $request->pembayaran;
                $kembalian = $pembayaran - $grandtotal;

                if ($pembayaran < $grandtotal) {
                    alert()->error('Pembayaran Tidak Valid', 'Jumlah pembayaran kurang dari grand total.');
                    return back();
                }
                
                $kembalian = $pembayaran - $grandtotal;

                transaksi::insert([
                    'id' => $id,
                    'pelanggan_id' => $request->pelanggan_id,
                    'kodefaktur'=> $kodefaktur,
                    'kodefaktut'=> $uuid,
                    'kodeproforma'=> $kodeproforma,
                    'kodejalan'=> $kodejalan,
                    'jenispembayaran'=> $request->jenispembayaran,
                    'total'=> $grandtotal,
                    'pembayaran'=> $pembayaran,
                    'user_id'=> Auth::user()->id,
                    'kembalian'=> $kembalian,
                    'jatuh_tempo' => $request->jatuh_tempo,
                    'created_at' => $request->tgl_beli,
                ]);

                for ($i=0; $i <count($request->nama) ; $i++) {
                    $detail = detailtransaksi::insert([
                        'id_transaksi' => $id,
                        'id_barang' => $request->nama[$i],
                        'jumlah' => $request->jumlah[$i],
                        'subtotal' => $request->subtotal[$i],
                        'harga_jual' => $request->harga_jual[$i],
                        'modal'=>$request->modal[$i],
                        'keterangan' => $request->keterangan[$i],
                        'barang_awal' => $request->unit[$i],
                        'created_at' => $request->tgl_beli,
                    ]);
                }
            
                return redirect()->route('preview', ['id' => $id]);
            // } catch (\Throwable  $e) {
            //     alert()->error('Gagal', 'Data yang Anda masukkan tidak valid, silakan periksa kembali.');
            //     return back();
            // }
        }
    
    public function polisi(Request $request, string $id)
    {
        transaksi::where('id', $id)->update([
            'nomor_polisi' => $request->nomor_polisi
        ]);

        return redirect()->route('preview', ['id' => $id]);
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
        $transaksi = transaksi::find($id);
        $hasil = barang::select('nama', 'id')->get();
        $data = detailtransaksi::where('id_transaksi',$id)->join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('detailtransaksis.*', 'barangs.nama')->get();
        // dd($hasil);
        return view('pages.kasir.edit', compact('data', 'transaksi', 'hasil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validator = Validator::make($request->all(), [
                'grandtotal' => 'required|numeric|min:0',
                'pembayaran' => 'required|numeric|min:' . $request->grandtotal,
                'jenispembayaran' => 'required|in:tunai,non-tunai,belum-dibayar',
                'tgl_beli' => 'required|date', 
                'nama.*' => 'required', 
                'jumlah.*' => 'required|numeric|min:1', 
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
        // try {
            $grandtotal = $request->grandtotal;
            $pembayaran = $request->pembayaran;
            if ($pembayaran < $grandtotal) {
                alert()->error('Pembayaran Tidak Valid', 'Jumlah pembayaran kurang dari grand total.');
                return back();
            }
            
            $kembalian = $pembayaran - $grandtotal;
            //code...
            transaksi::where('id',$id )->update([
                'jenispembayaran'=> $request->jenispembayaran,
                'total'=>$grandtotal,
                'pembayaran'=> $pembayaran,
                'user_id'=> Auth::user()->id,
                'kembalian'=> $kembalian,
                'jatuh_tempo' => $request->jatuh_tempo,
                'created_at' => $request->tgl_beli,
            ]);
            detailtransaksi::where('id_transaksi', $id)->delete();
            for ($i=0; $i <count($request->nama) ; $i++) {
                $detail = detailtransaksi::where('id_transaksi', $id)->insert([
                    'id_transaksi' => $id,
                    'id_barang' => $request->nama[$i],
                    'jumlah' => $request->jumlah[$i],
                    'subtotal' => $request->subtotal[$i],
                    'harga_jual' => $request->harga_jual[$i],
                    'modal'=>$request->modal[$i],
                    'keterangan' => $request->keterangan[$i],
                    'barang_awal' => $request->unit[$i],
                    'created_at' => $request->tgl_beli,
                ]);
            }
            return redirect()->route('preview', ['id' => $id]);
        // } catch (\Throwable $th) {
        //     alert()->error('Gagal','Data yang anda masukkan tidak valid, Silahkan cek kembali');
        //     return back();
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        transaksi::where('id', $id)->update([
            'user_id' =>  Auth::user()->id,
        ]);
        detailtransaksi::where('id_transaksi', $id)->delete();
        transaksi::where('id', $id)->delete();
        
        alert()->success('Berhasil','Berhasil Menghapus Transaksi');
        return redirect('/penjualan');
    }
    public function pdf($id, Request $request){
       
        $transaksi = transaksi::where('id', '=', $id)->first();
        $detail = detailtransaksi::where('id_transaksi', '=', $id)->join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->get();
        // $transaksi->
        // dd($transaksi);
    
            // dd($detail);
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
            $ket = $request->query('note');
            
            // qr tanda tangan
            $path = base_path('/public/assets/images/bobi.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $ttd = 'data:image/' . $type . ';base64,' . base64_encode($data);

            // logo
            $path2 = base_path('/public/assets/images/logo.png');
            $type2 = pathinfo($path2, PATHINFO_EXTENSION);
            $data2 = file_get_contents($path2);
            $logo = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pages.kasir.pdf', compact('transaksi','detail', 'count', 'tes','ket', 'ttd', 'logo'));

            return $pdf->download($transaksi['kodefaktur'].'.pdf');
            // return view('pages.kasir.pdf', compact('transaksi','detail', 'count', 'tes','ket'));
        }
    public function proforma($id, Request $request){
       
        $transaksi = transaksi::where('id', '=', $id)->first();
        $detail = detailtransaksi::where('id_transaksi', '=', $id)->join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->get();
        // $transaksi->
        // dd($transaksi);
    
            // dd($detail);
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
            $ket = $request->query('note');
            
            // qr tanda tangan
            $path = base_path('/public/assets/images/bobi.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $ttd = 'data:image/' . $type . ';base64,' . base64_encode($data);

            // logo
            $path2 = base_path('/public/assets/images/logo.png');
            $type2 = pathinfo($path2, PATHINFO_EXTENSION);
            $data2 = file_get_contents($path2);
            $logo = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pages.kasir.proforma', compact('transaksi','detail', 'count', 'tes','ket', 'ttd', 'logo'));
            return $pdf->download($transaksi['kodeproforma'].'.pdf');
            // return $pdf->stream();
        }
    public function kwitansi($id, Request $request){
       
        $transaksi = transaksi::where('id', '=', $id)->first();
        $detail = detailtransaksi::where('id_transaksi', '=', $id)->join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->get();
        // $transaksi->
        // dd($transaksi);
    
            // dd($detail);
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
            $ket = $request->query('note');
            
            // qr tanda tangan
            $path = base_path('/public/assets/images/bobi.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $ttd = 'data:image/' . $type . ';base64,' . base64_encode($data);

            // logo
            $path2 = base_path('/public/assets/images/logo.png');
            $type2 = pathinfo($path2, PATHINFO_EXTENSION);
            $data2 = file_get_contents($path2);
            $logo = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pages.kasir.kwitansi', compact('transaksi','detail', 'count', 'tes','ket', 'ttd', 'logo'));        

            return $pdf->download('kwitansi.pdf');
            // return $pdf->stream();
        }
    public function suratjalan($id, Request $request){
       
        $transaksi = transaksi::where('id', '=', $id)->first();
        $detail = detailtransaksi::where('id_transaksi', '=', $id)->join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->get();
        // $transaksi->
        // dd($transaksi);
    
            // dd($detail);
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
            $ket = $request->query('note');
            
            // qr tanda tangan
            $path = base_path('/public/assets/images/bobi.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $ttd = 'data:image/' . $type . ';base64,' . base64_encode($data);

            // logo
            $path2 = base_path('/public/assets/images/logo.png');
            $type2 = pathinfo($path2, PATHINFO_EXTENSION);
            $data2 = file_get_contents($path2);
            $logo = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pages.kasir.suratjalan', compact('transaksi','detail', 'count', 'tes','ket', 'ttd', 'logo'));

            return $pdf->download($transaksi['kodejalan'].'.pdf');
        }
        public function penjualan(Request $request)
        {
            $data['tgl_awal'] = $request->query('tgl_awal');
            $data['tgl_akhir'] = $request->query('tgl_akhir');
            $data['jenispembayaran'] = $request->query('jenispembayaran');
        
            $transaksi = DB::table('transaksis')
                ->join('pelanggans', 'transaksis.pelanggan_id', '=', 'pelanggans.id')
                ->select('transaksis.*', 'pelanggans.nama', 'pelanggans.perusahaan');
        
            if ($data['tgl_awal']) {
                $transaksi->whereDate('created_at', '>=', $data['tgl_awal']);
            }
        
            if ($data['tgl_akhir']) {
                $transaksi->where('created_at', '<=', $data['tgl_akhir']);
            }
        
            if ($data['jenispembayaran']) {
                $transaksi->where('jenispembayaran', '=', $data['jenispembayaran']);
            }
        
            $hasil = $transaksi->get();
        
            return view('pages.kasir.kasir', compact('hasil', 'data'));
        }
        
    public function piutang(){
        $transaksi = transaksi::where('jenispembayaran','belum-dibayar')->orderBy('jatuh_tempo')->get();
        return view('pages.kasir.piutang', compact('transaksi'));
    }
    public function storepiutang($id, Request $request){
        transaksi::where('id', $id)->update(['jenispembayaran' => $request->jenispembayaran, 'user_id' => Auth::user()->id]);
        alert()->success('Berhasil','Berhasil Mengupdate Piutang');
        return redirect('/penjualan');
    }
    public function preview($id){
        $transaksi = transaksi::where('id',$id)->first();
        $detail = detailtransaksi::where('id_transaksi',$id)->join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->get();
        // dd($detail);
        return view('pages.kasir.preview', compact('transaksi', 'detail'));
    }
}
