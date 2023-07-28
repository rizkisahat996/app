<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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

    <div class="d-flex justify-content-center ">
        <div class="col-lg-12 bg-white  p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" scope="col">Tanggal</th>
                        <th rowspan="2" scope="col">Nama Barang</th>
                        <th colspan="2" scope="col">Stok Awal</th>
                        <th colspan="2" scope="col">Stok Masuk</th>
                        <th colspan="2" scope="col">Stok Keluar</th>
                        <th colspan="2" scope="col">Stok Akhir</th>
                        <th colspan="2" scope="col">Harga</th>
                        <th rowspan="2" scope="col" width="20%">Jumlah</th>
                        <th rowspan="2" scope="col">Keterangan</th>
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
                        <th scope="col">Beli</th>
                        <th scope="col">Jual</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($detail->isEmpty())
                        <tr>
                            <td colspan="3">
                                <div class="d-flex text-muted justify-content-center text-center">
                                    Transaksi Belum Ada
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($detail as $item)
                        <?php $jumlah = ($item->hargabeli * $item->tambah * 25) + ($item->hargabeli * $item->stokkeluar * 25) ?>
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->stokawal }}</td>
                            <td>{{ $item->stokawal * 25 }}</td>
                            <td>{{ $item->tambah }}</td>
                            <td>{{ $item->tambah * 25 }}</td>
                            <td>{{ $item->stokkeluar }}</td>
                            <td>{{ $item->stokkeluar * 25 }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->stok * 25 }}</td>
                            <td>{{ $item->hargabeli }}</td>
                            <td>{{ $item->hargajual }}</td>
                            <td>@currency($jumlah)</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>