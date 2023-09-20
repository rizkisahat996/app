if($stoklama < $updatestok)
      {
        $barang->update([
        'nama' => $nama,
        'hargabeli' => $hargabeli,
        'untung' => $untung,
        'hargajual' => $hargajual,
        'berat' => $berat,
        'keterangan' => $keterangan,
        'stok' => $updatestok,
        'stokawal' => $stoklama,
        'stokkeluar' => 0,
        'total_lama' => $hargalama, 
        'total' => $total,
        'tambah' => $tambah
      ]);
    }

    elseif($stoklama > $updatestok)
    {
      $barang->update([
        'nama' => $nama,
        'hargabeli' => $hargabeli,
        'untung' => $untung,
        'hargajual' => $hargajual,
        'berat' => $berat,
        'keterangan' => $keterangan,
        'stok' => $updatestok,
        'stokawal' => $stoklama,
        'stokkeluar' => abs($tambah),
        'total_lama' => $hargalama, 
        'total' => $total,
        'tambah' => 0
      ]);
    }