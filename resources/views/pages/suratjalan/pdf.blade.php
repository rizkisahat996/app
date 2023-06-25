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

        .page-break {
            page-break-before: always;
        }

        #info td {
            margin: 0 0 0 0;
            padding: 0 0 0 0;
        }

        #info {
            width: 100% !important;
        }

        #barang td {
            text-align: center !important;
            font-size: 15px;
        }
        #fott{
            width: 100%;
            margin-left: 0.5rem !important;
        }
        #barang th {
           
            text-align: center !important;
            font-size: 18px !important;
        }
#a{
padding-top:4rem;
}
#ak{
    margin-top: -1rem !important;
}
    #total{
            text-align: center !important;
            border-collapse: collapse
        }
        .page-break {
            page-break-after: always;
        }

        #bawah td {
            padding-bottom: 0rem !important;
            font-size: 18px
        }
      
        #barang thead  tr th{
            border-spacing: -1px;
            background-color: #B6EE05;
            color: white;
            font-size: 20px;
            width = 100% !important;
        }

        #barang tbody {
            
        }

        #barang {
            border-collapse: collapse; 
            border-spacing: -1px;
	width = 500% !important;
padding :        0 0 0 0 !important;
        }
        #bar tr td{
            border-bottom: 1px solid #000000;
        background-image: linear-gradient(to right, #000000 50%, transparent 50%);
        background-repeat: repeat-x;
        background-position: bottom;
        background-size: 8px 1px;
        }
#tek {
font-weight:500 !important ;
text-align: center;
text-decoration: underline;
}
.dash-2 {
    border: none;
    height: 5px;
    background: #B6EE05;
    background: repeating-linear-gradient(90deg, #B6EE05 0, #B6EE05 5px, transparent 5px, transparent 15px);
    transform: skew(-45deg);
    transform-origin: top left;
    filter: drop-shadow(0 0 0 transparent);
  }
  .pp{
    margin-bottom: 2px;
    margin-top: 2px;
  }
  .container {
    display: flex;
    align-items: start;
    width: 100%;
}

.catatan {
    width: 70%;
    margin-right: 20px;
    float: left;
    margin-top: 15px;
    padding-top: 15px;
}

.barcode {
    width: 30%;
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

.black {
    background-color: black;
}
#okkk {
    text-align: center;
    margin-top: 2px;
    padding-top: 2px;
}

        @media print {}
    </style>
</head>

<body class="px-2 " onload="window.print()">
    <div>
        <h1>BOBIE</h1>
        <div class="pp">
            <p class="pp">Hp. 0812 6455 677</p>
            <p class="pp">Jl. Tanjung Raya Pasar 6 Helvetia Marelan</p>
            <p class="pp">Desa Manunggal Kec. Labuhan Deli Kab. Deli Serdang - Sumut</p></div>
    </div>
    <hr>
        <div class="d-flex" id="tek">
            <h2><i>FAKTUR</i></h2>
        </div>
        <table class="table table-borderless" id="info">
            <tr>
                <td width="15%"><b>Kepada Yth,</b><br>&nbsp;</td>
                <td>{{ $transaksi->pelanggan->nama }}
                    <br> {{ $transaksi->pelanggan->perusahaan }}
                </td>
                <td style="text-align: right;">
                    <div style="display: inline-block; text-align: left;">Nomor : {{ $transaksi->id }}</div>
                </td>
            </tr>
            <tr>
                <td width="15%">&nbsp;</td>
                <td>{{ $transaksi->nama }}</td>
                <td style="text-align: right;">
                    <div style="display: inline-block; text-align: left;">Medan, {{ $transaksi->created_at->format('d-m-Y') }}</div>
                </td>
            </tr>
            <tr>
                    <td rowspan="2">Alamat</td>
                    <td rowspan="2">{{ $transaksi->pelanggan->alamat }}</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Faktur</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
            </tr>
            <tr>
                @if (($transaksi->jatuh_tempo == null))
                <td></td>
                <td></td>
                <td></td>
                @else
                <td>Tanggal Tempo</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::parse($transaksi->jatuh_tempo)->format('d-m-Y') }}</td>
                <td></td>
                <td></td>
                <td></td>
                @endif
                
            </tr>
        </table>
        <table class="table table-borderless" id="barang" style="width: 100%; height:100px">
            <thead>
                <tr>
                    <th width="10%">No.</th>
                    <th width="30%">Nama Barang</th>
                    <th width="10%">Volume</th>
                    <th width="10%">Satuan</th>
                    <th width="20%">Harga</th>
                    <th width="20%">Jumlah</th>
                </tr>
            </thead>
            <tbody id="bar">
                @foreach ($detail as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>@currency($item->harga_jual)</td>
                        <td>@currency($item->subtotal)</td>
                    </tr>
                @endforeach
                    
            </tbody>
            <tfoot>
                <tr class="">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="total" class="text-start fw-semibold" style="text-align: left;font-weight:500">Jumlah Total&nbsp;:</td>
                    <td id="total" class="text-start fw-semibold" style="text-align: left;font-weight:500">@currency($transaksi->total)</td>
                </tr>
                <tr class="">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="bayar" class="text-start fw-semibold" style="text-align: left;font-weight:500">Bayar&nbsp;:</td>
                    <td id="bayar" class="text-start fw-semibold" style="text-align: left;font-weight:500">@currency($transaksi->pembayaran)</td>
                </tr>
                <tr class="">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="sisa" class="text-start fw-semibold" style="text-align: left;font-weight:500">Sisa&nbsp;:</td>
                    <td id="sisa" class="text-start fw-semibold" style="text-align: left;font-weight:500">@currency($transaksi->kembalian)</td>
                </tr>
            </tfoot>
            
        </table>
	
   
        <div class="container">
            <div class="catatan">
                <div class="text-start"><b>Catatan :</b></div>
                <div class="text-start">1. Barang yang sudah dibeli tidak dapat dikembalikan</div>
                <div class="text-start">2. Harap diperiksa dengan seksama</div>
                <div class="text-start">3. Pembayaran Transfer melalui rekening an. <b>BOBBY NUSANTARA PRIBADI</b></div>
                <div class="text-start">terbilang {{ terbilang($transaksi->total) }} Rupiah</div>
                <div class="text-start">MANDIRI : 106.0055.4466.71</div>
                <div class="text-start">BNI : 1264.666.777</div>
            </div>
            <div class="barcode">
                <div id="barcode"></div>
                <div id="okkk"><b>{{ Auth::user()->name; }}</b></div>
                <div id="okkk">{{ Auth::user()->jabatan; }}</div>
            </div>
        </div>
        
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>





  
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script type="text/javascript">
        function generateBarcode() {
        var barcodeDiv = document.getElementById("barcode");
        var barcodeData = "123456789"; // Nilai barcode yang diinginkan
        
        for (var i = 0; i < barcodeData.length; i++) {
            var barcodeDigit = barcodeData.charAt(i);
            var barcodeElement = document.createElement("div");
            barcodeElement.classList.add("barcode-digit");
            
            if (barcodeDigit === "1") {
                barcodeElement.classList.add("black");
            }
            
            barcodeDiv.appendChild(barcodeElement);
        }
    }
    
    generateBarcode();
    </script>
</body>

</html>