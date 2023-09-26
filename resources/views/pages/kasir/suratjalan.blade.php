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
            text-align: center;
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
            text-align: center;
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
        <img style="height:70px;padding: 0;margin:0;" src="<?php echo $logo ?>" alt="logo" width="130px">
        <div>
            <p style="height: 5px">Hp. 0812 6466 677</p>
            <p style="height: 5px">Jl. Tanjung Raya Pasar 6 Helvetia Marelan</p>
            <p style="height: 5px">Desa Manunggal Kec. Labuhan Deli Kab. Deli Serdang - Sumut</p></div>
    </div>
    <hr style="color:#B6EE05">
        <div class="d-flex" id="tek">
            <h2><i>SURAT JALAN</i></h2>
        </div>
        <table class="table table-borderless" id="info">
            <tr>
                <td width="15%"><b>Kepada Yth,</b><br>&nbsp;</td>
                <td>{{ $transaksi->pelanggan->nama }}
                    <br> {{ $transaksi->pelanggan->perusahaan }}
                </td>
                <td style="text-align: right;">
                    <div style="display: inline-block; text-align: left;">Nomor : {{ $transaksi->kodejalan }}</div>
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
                    <td style="text-align: right;">
                        <div style="display: inline-block; text-align: left;">Nomor Polisi : {{ $transaksi->nomor_polisi }}</div>
                    </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>{{ $transaksi->pelanggan->no_telp }}</td>
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
                    <th width="30%">Uraian</th>
                    <th width="10%">Qty</th>
                    <th width="10%">Satuan</th>
                    <th width="20%">Volume</th>
                    <th width="20%">Keterangan</th>
                </tr>
            </thead>
            <tbody id="bar">
                @foreach ($detail as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->berat }}</td>
                        <td>{{ $item->keterangann }}</td>
                    </tr>
                @endforeach
                    
            </tbody>
            
        </table>
	

        <table  class="table table-borderless" id="info">
            <tr>    
                <td style="text-align: center"><b>SUPIR</b></td>
                <td></td>
                <td></td><br><br>
                <td style="text-align: center; position: relative;margin-top: -20px;">
                    <img style="display: inline-block" src="<?php echo $ttd ?>" alt="ttd" height="100px" width="100px">
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td style="text-align: center;margin-top:20px">{{ "(........................................)" }}</td>
                <td></td>
                <td></td>
                <td style="text-align: center;">
                    <div><b>{{ Auth::user()->name }}</b></div>
                </td>
            </tr>
            <tr style="position: relative;margin-top: -20px;">
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center; ">
                    <div>{{ Auth::user()->jabatan }}</div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>




  
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
