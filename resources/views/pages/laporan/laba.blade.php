<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <table style="word-wrap:break-word;">
        <thead>
            <tr>
                <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;font-size:xx-large" colspan="5">Laba Bobie</th>
              
            </tr>
            <tr>
                <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;">Tanggal</th>
                <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;">Jumlah Barang Keluar</th>
                <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;">Modal</th>
                <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;">Subtotal</th>
                <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;">Keuntungan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $modal = 0;
                $subtotal = 0;
            @endphp
            @foreach ($data as $data)
                <tr>
                    <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">
                        {{ $data->created_at->format('d-m-y') }}</td>
                    <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">{{ $data->barang }}</td>
                    <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">@currency($data->modal)</td>
                    <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">@currency($data->total)</td>
                    <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">
                        @currency($data->total - $data->modal)</td>
                    @php
                        $modal = $modal + $data->modal;
                        $subtotal = $subtotal + $data->total;
                    @endphp
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:right;font-weight:bold;">Total&nbsp;:</td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;">@currency($modal) </td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;">@currency($subtotal) </td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;font-weight:bold;">@currency($subtotal - $modal)</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
