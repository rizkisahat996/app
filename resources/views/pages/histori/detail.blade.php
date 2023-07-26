@extends('layout.main')
@section('content')
<style>
    th{
        border: 1px #000 solid;
            text-align: center;
            vertical-align: middle;
    }
    td{
        border: 1px #000 solid
    }
</style>

    <div class="text-center fw-semibold fs-5">Jurnal Barang</div>
    <div class="d-flex justify-content-center ">
        <div class="col-lg-12 bg-white  p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" scope="col">No Faktur</th>
                        <th rowspan="2" scope="col">Tanggal</th>
                        <th rowspan="2" scope="col">Nama Barang</th>
                        <th colspan="2" scope="col">Stok Awal</th>
                        <th colspan="2" scope="col">Stok Masuk</th>
                        <th colspan="2" scope="col">Stok Akhir</th>
                        <th colspan="2" scope="col">Harga</th>
                        <th rowspan="2" scope="col">Jumlah</th>
                        <th rowspan="2" scope="col">Nama Costumer</th>
                    </tr>
                    <tr>
                        <!-- This row is for the sub-headers, which will be empty since we already merged them in the first row -->
                        <th scope="col">QTY</th>
                        <th scope="col">KG</th>
                        <th scope="col">QTY</th>
                        <th scope="col">KG</th>
                        <th scope="col">QTY</th>
                        <th scope="col">KG</th>
                        <th scope="col">QTY</th>
                        <th scope="col">KG</th>
                        <th scope="col">Jual</th>
                        <th scope="col">Beli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $item)
                    <tr>
                        <td>{{ $item->kodefaktur }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->barang_awal }}</td>
                        <td>{{ $item->barang_awal }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->jumlah * 25 }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ $item->hargajual }}</td>
                        <td>{{ $item->hargabeli }}</td>
                        <td>{{ $item->subtotal }}</td>
                        <td>An. {{ $item->pelanggan_nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
