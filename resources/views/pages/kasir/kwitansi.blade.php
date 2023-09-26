<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
   
   
    <style>
        @import url('https://fonts.cdnfonts.com/css/cooper-black');

        body * {
            font-family: 'Times New Roman', Times, serif;
            
        }

        h1{
            font-family: 'Cooper Black', sans-serif;
        }
        table {
        width: 100%;
    }
    tr {
        padding: 0;
        width: 100%;
    }
    td {
      vertical-align: top; /* Set vertical alignment to top */
      vertical-align:middle;
    }
    .sa {
        width: 30%;
    }
    .du {
        width: 10%;
        text-align: center;
    }
    .em {
        width: 50%;
    }
    .li {
        text-align: center;
    }
    .en {
        height: 25px;
    }
    .oke {
        text-decoration: underline;
        text-align: center;
    }
    .ti {
        width: 60%;
    }
    h2 {
        text-align: center;
        padding: 0;
    }
    .okess {
        border: #000 solid 4px;
    }
    td.sa {
        white-space: nowrap; /* Prevent the text from wrapping */
      }
  
      .dot-dot-dot {
        white-space: nowrap; /* Prevent the text from wrapping */
        overflow: hidden; /* Hide any overflow content */
        text-overflow: ellipsis; /* Show "..." at the end if the content is too long */
      }
  .catatan {
    width: 70%;
    margin-right: 20px;
    float: left;
    margin-top: 15px;
    padding-top: 15px;
}

.barcode {
    width: 14%;
    margin-top: 15px;
    padding-top: 15px;
    float: left;
}

#barcode {
    width: 50%;
    height: 100px;
    margin-left: 50px;
    border: 1px solid black;
}

.barcode-digit {
    flex-grow: 1;
    border-right: 1px solid black;
}
#okkk {
    text-align: center;
    margin-top: 2px;
    padding-top: 2px;
    font-size: small;
}
.container {
    display: flex;
    align-items: center;
    width: 100%;
}

        @media print {}
    </style>
</head>

<body class="px-2 " onload="window.print()">
    <h2><u>KWITANSI</u></h2>
    <h2>OFFICIAL RECEIPT</h2>
  <table>
    <tr>
        <td class="sa">Sudah Diterima Dari</td> 
        <td class="du">:</td>
        <td class="ti">
          {{ $transaksi->pelanggan->nama }}<br>
          <div class="dot-dot-dot">...........................................................................................................</div>
        </td>
      </tr>
      <tr>
        <td class="sa"></td> 
        <td class="du">:</td>
        <td class="ti">
          <br>
          <div class="dot-dot-dot">...........................................................................................................</div>
        </td>
      </tr>
      <tr>
        <td class="sa"></td> 
        <td class="du">:</td>
        <td class="ti">
          <br>
          <div class="dot-dot-dot">...........................................................................................................</div>
        </td>
      </tr>
    </table>
      <table>
      <tr>
        <td class="sa"></td> 
        <td class="du">:</td>
        {{-- <td style="width: 10%; text-align: right">Rp.</td> --}}
        <td class="okess" style="text-align: center;">@currency($transaksi->pembayaran) ,-</td>
      </tr>
      </table>
    <br>
      <table>
      <tr>
        <td class="sa">Terbilang</td> 
        <td class="du">:</td>
        <td class="ti">
          {{ terbilang($transaksi->pembayaran) }}<br>
          <div class="dot-dot-dot">...........................................................................................................</div>
        </td>
      </tr>
      <tr>
        <td class="sa">UNTUK PEMBAYARAN</td> 
        <td class="du">:</td>
        <td class="ti">
            @foreach ($detail as $item)
                {{ $item->nama }}, &nbsp;
            @endforeach<br>
          <div class="dot-dot-dot">...........................................................................................................</div>
        </td>
      </tr>
  </table>
    <br><br><br><br><br>
  <table>
    <tr class="en">
        <td class="em"></td>
        <td class="li"></td>
    </tr>
    @php
        $tanggal = \Carbon\Carbon::parse($transaksi->created_at);
        $tgl = $tanggal->locale('id_ID')->isoFormat('D MMMM Y');;
    @endphp
    <tr class="en">
        <td class="em"></td>
        <td class="li">Medan, Tanggal {{ $tgl }}</td>
    </tr>
    <tr class="en">
        <td class="em"></td>
        <td class="li">Yang Menerima,</td>
    </tr>
    <br>
    <br>
    <br>
    <tr class="en">
        <td class="em"></td>
        <td class="li"><b><u>BOBBY N PRIBADI</u></b></td>
    </tr>
  </table>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
