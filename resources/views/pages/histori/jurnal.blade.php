@extends('layout.main')
@section('content')
    <div class="text-center fw-semibold fs-5">Jurnal Transaksi</div>
    <div class="d-flex justify-content-center ">
        <div class="col-lg-12 bg-white  p-5">
            {{-- {{ dd($penjualan) }} --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No Faktur</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col" colspan="2">Stok Awal </th>
                        <th scope="col" colspan="2">Stok Masuk</th>
                        <th scope="col" colspan="2">Stok Keluar</th>
                        <th scope="col" colspan="2">Stok Akhir</th>
                        <th scope="col" colspan="2">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Ket</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- @if ($barang->isEmpty())
                        <tr>
                            <td colspan="5">
                                <div class="d-flex text-muted justify-content-center text-center">
                                    Histori Belum Ada
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($barang as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->id_barang }}</td>
                                <td>{{ $item->hargabeli }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->created_at }}</td>
                                @if (Str::lower($item->action) == 'insert')
                                    <td><button class="btn btn-sm btn-success">{{ $item->action }}</button></td>
                                @elseif(Str::lower($item->action) == 'update')
                                    <td><button class="btn btn-sm btn-warning text-white">{{ $item->action }}</button></td>
                                @else
                                    <td><button class="btn btn-sm btn-danger">{{ $item->action }}</button></td>
                                @endif

                            </tr>
                        @endforeach
                    @endif --}}



                </tbody>
            </table>
        </div>
    </div>

@endsection
