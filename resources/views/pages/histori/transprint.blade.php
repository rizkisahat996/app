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

    <div class="text-center fw-semibold fs-5">Jurnal Transaksi</div>
    <div class="d-flex justify-content-center ">
        <div class="col-lg-12 bg-white  p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" scope="col">No Faktur</th>
                        <th rowspan="2" scope="col">Tanggal</th>
                        <th rowspan="2" scope="col">Nama Barang</th>
                        <th colspan="2" scope="col">Stok Awal</th>
                        <th colspan="2" scope="col">Stok Keluar</th>
                        <th colspan="2" scope="col">Stok Akhir</th>
                        <th colspan="2" scope="col">Harga</th>
                        <th rowspan="2" scope="col">Jumlah</th>
                        <th rowspan="2" scope="col">Nama Costumer</th>
                    </tr>
                    <tr>
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
                    @foreach ($detail as $item)
                    <tr>
                        <td>{{ $item->kodefaktur }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->barang_awal }}</td>
                        <td>{{ $item->barang_awal * 25 }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->jumlah * 25 }}</td>
                        <td>{{ $item->barang_awal - $item->jumlah }}</td>
                        <td>{{ ($item->barang_awal - $item->jumlah) * 25 }}</td>
                        <td>{{ $item->hargabeli }}</td>
                        <td>{{ $item->hargajual }}</td>
                        <td>{{ $item->subtotal }}</td>
                        <td>An. {{ $item->pelanggan_nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>