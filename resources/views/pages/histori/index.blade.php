@extends('layout.main')
@section('content')
<div class="d-flex justify-content-start align-items-center me-5 gap-5">
        
    <a href="/histori/penjualan">
        <div class="btn btn-md btn-primary">Histori Penjualan</div>
    </a>

    <a href="/histori/barang">
        <div class="btn btn-md btn-success">Histori barang</div>
    </a>

    <a href="/histori/jurnal">
        <div class="btn btn-md btn-dark">Jurnal Transaksi</div>
    </a>

    <a href="/histori/stok">
        <div class="btn btn-md btn-secondary">Jurnal Barang</div>
    </a>

</div>
@endsection