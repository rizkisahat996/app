<?php

namespace App\Http\Controllers;

use Alert;

use PDF;
use Redirect;
use App\Models\barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\kategoribarang;
use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $kategori = kategoribarang::get();
    $get['kategori'] = $request->query('kategori');

    $data = barang::join('kategoribarangs', 'barangs.id_kategori', '=', 'kategoribarangs.id')
                        ->select('barangs.*', 'kategoribarangs.id as kategori_id', 'kategoribarangs.kategori as namakategori')
                        ->get();
    $id = $request->query('kategori');
    // dd($data[0]);

    $jumlah = barang::sum(\DB::raw('CAST(stok as UNSIGNED)'));

    return view('pages.barang.barang', compact('data', 'kategori', 'id', 'jumlah'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $kategori = kategoribarang::get();
    // dd($kategori);
    return view('pages.barang.tambahbarang', compact('kategori'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
{
    $data = $request->validate([
        'id' => 'required',
        'nama' => 'required|max:255',
        'satuan' => 'required',
        'jenis' => 'required',
        'stok' => 'required',
        'id_kategori' => 'required',
        'hargabeli' => 'required',
        'untung' => 'required',
        'hargajual' => 'required',
        'gambar' => 'file',
    ]);

    $berat = $request->stok * 25;
    $tambah = $request->stok;
    $beli = $request->hargabeli;
    $berat = $request->berat;
    $total =  $beli * $berat;
    $keterangan = $request->keterangan;
    $awal = 0;

    $data['minimstok'] = 10;
    $data['berat'] = $berat;
    $data['tambah'] = $tambah;
    $data['total'] = $total;
    $data['stokawal'] = $awal;
    $data['keterangan'] = $keterangan;


    $kodeBarang = $request->input('id');
    // dd($kodeBarang);

    if (barang::where('id', $kodeBarang)->exists()) {
        return back()->with('error', 'Kode barang sudah ada dalam database.');
    }

    if ($request->file('gambar')) {
        $file = $request->file('gambar');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('public/Image'), $filename);
        $data['gambar'] = $filename;
    }

    $data['hargabeli'] = $data['hargabeli'];
    $data['untung'] = $data['untung'];
    $data['hargajual'] = $data['hargajual'];
    $data['id'] = $kodeBarang;

    // dd($data['id']);

    $newBarang = barang::create($data);

    alert()->success('Berhasil', 'Berhasil Menambahkan Barang');
    return redirect('/barang');
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
    $barang = barang::where('barangs.id', '=', $id)
              ->join('kategoribarangs', 'barangs.id_kategori', '=', 'kategoribarangs.id')
              ->select('barangs.*', 'kategoribarangs.id as kategori_id', 'kategoribarangs.kategori as nama_kategori')
              ->first();
    // dd($barang);

    return view('pages.barang.edit', compact('barang'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // dd($request->all());
    $barang = barang::where('id', $id)->first();
    $berat = $request->berat;

    $stoklama = $barang->stok;
    $tambah = ($request->berat - $barang->berat )/ 25;
    $updatestok = $tambah + $stoklama;

    $hargalama = $barang->hargabeli * $stoklama * 25;
    $total = $berat * $request->hargabeli;
    $nama = $request->nama;
    $hargabeli = $request->hargabeli;
        $untung = $request->untung;
        $hargajual = $request->hargajual;
        $keterangan = $request->keterangan;
    $tok = $berat/25;

    $barang->update([
        'nama' => $nama,
        'hargabeli' => $hargabeli,
        'untung' => $untung,
        'hargajual' => $hargajual,
        'berat' => floatval($berat),
        'keterangan' => $keterangan,
        'stok' => floatval($tok),
        'stokawal' => $stoklama,
        'total_lama' => $hargalama, 
        'total' => $total,
      ]);
    if($stoklama < $updatestok)
    {
      $barang->update([
        'stokkeluar' => 0,
        'tambah' => $tambah
      ]);
    }

    elseif($stoklama > $updatestok)
    {
      $barang->update([
        'stokkeluar' => abs($tambah),
        'tambah' => 0
      ]);
    }

    alert()->success('Berhasil', 'Berhasil Memperbarui Data');
    return redirect('/barang');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $barang = barang::find($id);
    $barang->delete();
    alert()->success('Berhasil', 'Berhasil Menghapus Data');

    return Redirect::back();
  }
  public function tambah(Request $request, $id)
  {
    $barang = barang::where('id', $id)->first();
    $stoklama = (int)$barang->stok;

    $tambah = $request->berat / 25;

    $updatestok = $tambah + $stoklama;
    $updateberat = $updatestok * 25;
    $hargalama = $barang->hargabeli * $stoklama * 25;
    $total = $updatestok * $barang->hargabeli * 25;

    barang::where('id', $id)->update([
      'berat' => $updateberat, 
      'stok' => $updatestok, 
      'stokawal' => $stoklama, 
      'tambah' => $tambah, 
      'stokkeluar' => 0, 
      'total_lama' => $hargalama, 
      'total' => $total
    ]);
    alert()->success('Berhasil', 'Berhasil Menambahkan Stok');
    return Redirect::back();
  }

  public function kategori()
  {
    return view('pages.barang.kategori');
  }
  public function kt(Request $request)
  {
    $kat = DB::table('kategoribarangs')->count() + 1;
    $id = sprintf("%d", $kat);
    $data = $request->validate([
      'kategori' => 'required',
    ]);
    $data['id'] = $id;
    kategoribarang::insert($data);
    alert()->success('Berhasil', 'Berhasil Menambahkan kategori');
    return redirect('/barang');
  }
  public function pdf()
  {
    $kategori = kategoribarang::get();
    foreach ($kategori as $data) {
      $data['barang'] = barang::where('id_kategori', $data->id)->get();
    }
    // dd($kategori);
    // return view('pages.barang.pdf', compact('kategori','data'));
    $pdf = PDF::loadview('pages.barang.pdf', compact('kategori', 'data'));
    return $pdf->download('PRICELIST.pdf');
  }
}