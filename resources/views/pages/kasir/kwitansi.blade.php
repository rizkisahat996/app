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
    align-items: start;
    width: 100%;
}
.pad{
    padding-top: 10px;
}
.box {
    width: 400px;
    height: 100px;
    border: 1px solid black;
    font-size: small;
    font-weight: bold;
}
        @media print {}
    </style>
</head>

<body class="px-2 " onload="window.print()">
    <div class="keranjang">
    <div>
        <h1>BOBIE</h1>
        <div class="pp">
            <p class="pp">Hp. 0812 6455 677</p>
            <p class="pp">Jl. Tanjung Raya Pasar 6 Helvetia Marelan</p>
            <p class="pp">Desa Manunggal Kec. Labuhan Deli Kab. Deli Serdang - Sumut</p></div>
    </div>
    <hr>
        <div class="d-flex" id="tek">
            <h3 style="text-decoration: underline;">KWITANSI</h3>
            <h3>OFFICIAL RECEIPT</h3>
        </div>

        <div class="pad">
            <span style="padding-right: 100px;">Sudah Diterima Dari</span> : <span style="padding-left: 25px;">{{ $transaksi->pelanggan->nama ?? '...........................................................................' }}</span>
            <p><span style="padding-right: 228px;">&nbsp;</span> : <span style="padding-left: 25px">...........................................................................</span></p>
            <p><span style="padding-right: 228px;">&nbsp;</span> : <span style="padding-left: 25px">...........................................................................</span></p>
            {{-- <p><span style="padding-right: 228px;">&nbsp;</span> : <span style="padding-left: 25px">{{ $transaksi->pelanggan->skip(1)->nama ?? '...........................................................................' }}</span></p> --}}
            {{-- <p><span style="padding-right: 228px;">&nbsp;</span> : <span style="padding-left: 25px">{{ $transaksi->pelanggan->skip(2)->nama ?? '...........................................................................' }}</span></p> --}}
        </div>
        <div class="pad">
            {{-- <span style="padding-right: 134px;">Uang Sejumlah</span> : <span style="padding-left: 40px;">Rp. <span class="box">{{ @currency($transaksi->pembayaran) }}</span></span> --}}
            <span style="padding-right: 134px;">Uang Sejumlah</span> : <span style="padding-left: 40px;">Rp. <span class="box">{{ $transaksi->pembayaran }}</span></span>
        </div>
        <div class="pad">
            <span style="padding-right: 174px;">Terbilang</span><span style="padding-right: 60px;">:</span> <span><b>{{ terbilang($transaksi->pembayaran)}} rupiah</b></span>
        </div>
        <div class="pad">
            <span style="padding-right: 61px;">UNTUK PEMBAYARAN</span> : <span style="padding-left: 25px;">...........................................................................</span>
            <p><span style="padding-right: 228px;">&nbsp;</span> : <span style="padding-left: 25px">...........................................................................</span></p>
            <p><span style="padding-right: 228px;">&nbsp;</span> : <span style="padding-left: 25px">...........................................................................</span></p>
            <p><span style="padding-right: 228px;">&nbsp;</span> : <span style="padding-left: 25px">...........................................................................</span></p>
            <p><span style="padding-right: 228px;">&nbsp;</span> : <span style="padding-left: 25px">...........................................................................</span></p>
        </div>
        
        
        <div class="container">
            <div class="catatan">
                <div id="okkk" style="padding-bottom: 70px;"></div>
                <div id="okkk"></div>
            </div>
            <div class="barcode" style="padding-right: 40px">
                <div id="okkk" style="padding-left: 20px;">Medan, {{ now()->format('d F Y') }}</div>
                <div id="okkk" style="padding-bottom: 70px; padding-left: 20px;">Yang menerima,</div>
                <div id="okkk">(........................................)</div>
            </div>
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
</body>

</html>
