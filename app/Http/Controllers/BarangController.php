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

class BarangController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $kategori = kategoribarang::get();
    $get['kategori'] = $request->query('kategori');

    if ($get['kategori']) {
      $data = barang::paginate(15)->where(
        'id_kategori',
        $get['kategori']
      );
    } else {
      $data = barang::paginate(15);
    }
    $id = $request->query('kategori');
    // dd($data);

    return view('pages.barang.barang', compact('data', 'kategori', 'id'));
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
        'id_kategori' => 'required',
        'minimstok' => 'required',
        'hargabeli' => 'required',
        'untung' => 'required',
        'hargajual' => 'required',
        'stok' => 'required',
        'gambar' => 'file',
    ]);

    // Mendapatkan kode barang dari input pengguna
    $kodeBarang = $request->input('id');

    // Mengecek apakah kode barang sudah ada dalam database
    if (barang::where('id', $kodeBarang)->exists()) {
        // Jika kode barang sudah ada, beri pesan kesalahan
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

    barang::insert($data);

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
    $idnya = $id;
    $barang = barang::find($id);

    return view('pages.barang.edit', compact('barang', 'idnya'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    barang::where('id', $id)->update([
      'nama' => $request->nama,
      'hargabeli' => $request->hargabeli . "000",
      'untung' => $request->untung . "000",
      'hargajual' => $request->hargajual * 1000,
      'stok' => $request->stok
    ]);
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

    $updatestok = (int)$request->stok + $stoklama;
    barang::where('id', $id)->update(['stok' => $updatestok]);
    alert()->success('Berhasil', 'Berhasil Menambahkan Stok');
    return Redirect::back();
  }
  public function kategori()
  {
    return view('pages.barang.kategori');
  }
  public function kt(Request $request)
  {
    $data = $request->validate([
      'id' => 'required',
      'kategori' => 'required',
    ]);
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