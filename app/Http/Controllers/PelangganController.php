<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use App\Models\transaksi;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelanggan::get();
        return view('pages.pelanggan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepelangganRequest $request)
    {
        pelanggan::create([
            'nama' => $request->nama,
            'perusahaan' => $request->perusahaan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);
        alert()->success('Berhasil','Berhasil Menambahkan Pengguna');
        return redirect('/pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        $data = transaksi::where('pelanggan_id', $id)->get();
        return view('pages.pelanggan.show', compact('data', 'pelanggan'));
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan)
    {
        //
    }
}
