@extends('layout.main')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="d-flex flex-wrap justify-content-start gap-4">
            <a href="/histori/jurnal" class="btn btn-md btn-dark">Jurnal Transaksi</a>
            <a href="/histori/stok" class="btn btn-md btn-secondary">Jurnal Barang</a>
          {{-- <a href="/histori/penjualan" class="btn btn-md btn-primary">Histori Penjualan</a> --}}
          <a href="/histori/barang" class="btn btn-md btn-success">Histori Barang</a>
        </div>
      </div>
    </div>
  </div>
  

@endsection