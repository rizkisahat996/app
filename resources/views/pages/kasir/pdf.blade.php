<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
   
   
    <style>
        body * {
            font-family: 'Times New Roman', Times, serif;
            
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
           padding: 2 2 2 2 !important;
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
            border: 1px solid rgba(0, 0, 0, 0.49);
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
            border: 1px solid rgba(0, 0, 0, 0.49);
            border-spacing: -1px;
width = 100% !important;
        }

        #barang tbody {
            border: 0.5px solid rgba(0, 0, 0, 0.49);
            
        }

        #barang {
            border-collapse: collapse; 
            border-spacing: -1px;
	width = 500% !important;
padding :        0 0 0 0 !important;
        }

        #ket {
            margin-left: 2rem !important;
        }
        #bar tr td{
            border: 0.5px solid rgba(0, 0, 0, 0.49) !important 
        }
#tek {
font-weight:500 !important ;
}

        @media print {}
    </style>
</head>

<body class="px-2 " onload="window.print()">
    @if ($count > 5)
        <div class="d-flex justify-content-between" id="tek">
            <div class="fw-semibold fs-4" style="float: left; width: 25%; ">BOBIE</div>
            <div class="fw-semibold fs-4" style="margin-left: 70%; width: 30%;" id="fak">FAKTUR PENJUALAN</div>
        </div>
        <table class="table table-borderless" id="info">
            <tr>
                <td  colspan="3" width="50%">
                    Jl. Gatot Subroto KM.4, No.63,</td>
                
                <td width="10%">Kepada</td>
                <td width="5%">:&nbsp;</td>
                <td>{{ $transaksi->nama }}</td>
            </tr>
            <tr>
                <td  colspan="3" width="50%">
                    Medan, 0821-6291-9393</td>
                
                    <td rowspan="2">Alamat</td>
                    <td rowspan="2">:&nbsp;</td>
                    <td rowspan="2">{{ $transaksi->alamat }}</td>
            </tr>
            <tr>
                <td >Nomor Faktur</td>
                <td width="3%">:&nbsp;</td>
                <td>{{ $transaksi->id }}</td>
            </tr>
            <tr>
                <td>Tanggal Faktur</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                
                <td>Petugas</td>
                <td>:&nbsp;</td>
                <td>Imelda</td>
                
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
        <table class="table table-borderless" id="barang" style="width: 100%; ">
            <thead>
                <tr class="fw-semibold">
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            @php
                $nomor = 1;
            @endphp
            <tbody class="" id="bar">
                @foreach ($detail->slice(0, 5) as $item)
                    <tr>
                        <td id="bar">{{ $nomor }}</td>
                        <td id="bar">{{ $item->nama }}</td>
                        <td id="bar">{{ $item->jumlah }}</td>
                        <td id="bar">{{ $item->satuan }}</td>
                        <td id="bar">@currency($item->harga_jual)</td>
                        <td id="bar">@currency($item->subtotal)</td>
                    </tr>
                    @php
                        $nomor++;
                    @endphp
                @endforeach

            </tbody>
            <tfoot>
                <tr class="">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="total"  class="text-end fw-semibold" style=" style="text-align: right;font-weight:500">Total&nbsp;:</td>
                    <td id="total" class="text-center fw-semibold" style="font-weight:500">@currency($transaksi->total)</td>
                </tr>
            </tfoot>
        </table>
        <table class="table table-borderless" id="fott">
            <tr id="bawah">
                <td class="text-center" style="text-align: center;">Penerima</td>
                <td class="text-center" style="text-align: center;" ><span style=" margin-left:4rem;">Petugas</span> </td>
                <td  class="" style="text-align: start; margin-left:5rem;"><span
                        style="font-size: 17px;margin-left:4rem;text-decoration:underline"> Transfer via:</span> <br>
                        
                </td>
            </tr>

            <tr>
                <td class="text-center" style="text-align: center;padding-top:3rem">{{ $transaksi->nama }}</td>
                <td class="text-center" style="text-align: center;padding-top:3rem"><span style="text-align: center; margin-left:4rem;">Imelda </span></td>
                <td>
                    <span style="font-size: 13px ;margin-left:4rem;">
                        BRI - 133301001293531
                       </span> 
                       </span> <br> <span style="font-size: 13px ;padding-left:4rem;">
                        BSI - 723053270</span>
        <br> <span style="font-size: 13px ;padding-left:4rem;">
                        AN - IMELDA</span>
                </td>
            </tr>
        </table>
        <div id="ket">
            <div class="text-start fw-semibold">Keterangan</div>
            <div class="text-start ">-{{$ket ?? ''}}</div>

        </div>
        <div class="d-flex justify-content-between" style="margin-top: 8rem;" id="tek">
            <div class="fw-semibold fs-4" style="float: left; width: 25%; ">BOBIE</div>
            <div class="fw-semibold fs-4" style="margin-left: 70%; width: 30%;" id="fak">FAKTUR PENJUALAN</div>
        </div>
        <table class="table table-borderless" id="info">
            <tr>
                <td  colspan="3" width="50%">
                    Jl. Tanjung Raya Pasar 6 Helvetia Marelan ,</td>
                
                <td width="10%">Kepada</td>
                <td width="5%">:&nbsp;</td>
                <td>{{ $transaksi->nama }}</td>
            </tr>
            <tr>
                <td  colspan="3" width="50%">
                    Medan, 0821-6291-9393</td>
                
                    <td rowspan="2">Alamat</td>
                    <td rowspan="2">:&nbsp;</td>
                    <td rowspan="2">{{ $transaksi->alamat }}</td>
            </tr>
            <tr>
                <td >Nomor Faktur</td>
                <td width="3%">:&nbsp;</td>
                <td>{{ $transaksi->id }}</td>
            </tr>
            <tr>
                <td>Tanggal Faktur</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                
                <td>Petugas</td>
                <td>:&nbsp;</td>
                <td>Imelda</td>
                
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
        <table class="table table-borderless " id="barang" style="width: 100%; ">
            <thead>
                <tr class="fw-semibold">
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="bar">
                @foreach ($detail->slice(5, $count+2) as $item)
                    <tr>
                        <td>{{ $nomor }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>@currency($item->harga_jual)</td>
                        <td>@currency($item->subtotal)</td>
                    </tr>
                    @php
                        $nomor++;
                    @endphp
                    @endforeach

            </tbody>
            <tfoot>
                <tr class="">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="total"  class="text-end fw-semibold" style="font-weight:500">Total&nbsp;:</td>
                    <td id="total" class="text-center fw-semibold" style="font-weight:500">@currency($transaksi->total)</td>
                </tr>
            </tfoot>
        </table>
      	<table class="table table-borderless" id="fott">
            <tr id="bawah">
                <td class="text-center" style="text-align: center;" >Penerima</td>
                <td class="text-center" style="text-align: center;" ><span style=" margin-left:4rem;">Petugas</span> </td>
                <td  class="" style="text-align: start; margin-left:5rem;"><span
                        style="font-size: 17px;margin-left:4rem;text-decoration:underline"> Transfer via:</span> <br>
                        
                </td>
            </tr>

            <tr>
                <td class="text-center" style="text-align: center;padding-top:3rem">{{ $transaksi->nama }}</td>
                <td class="text-center" style="text-align: center;padding-top:3rem"><span style="text-align: center; margin-left:4rem;">Imelda </span></td>
                <td>
                    <span style="font-size: 13px ;margin-left:4rem;">
                        BRI - 133301001293531
                       </span> 
                       </span> <br> <span style="font-size: 13px ;padding-left:4rem;">
                        BSI - 723053270</span>
        <br> <span style="font-size: 13px ;padding-left:4rem;">
                        AN - IMELDA</span>
                </td>
            </tr>
        </table>
        <div id="ket">
            <div class="text-start fw-semibold">Keterangan</div>
            <div class="text-start ">-{{$ket ?? ''}}</div>

        </div>
    @else
        <div class="d-flex justify-content-between" id="tek">
            <div class="fw-semibold fs-4" style="float: left; width: 25%; ">BOBIE</div>
            <div class="fw-semibold fs-4" style="margin-left: 70%; width: 30%;" id="fak">FAKTUR PENJUALAN</div>
        </div>
        <table class="table table-borderless" id="info">
            <tr>
                <td  colspan="3" width="50%">
                    Jl. Tanjung Raya Pasar 6 Helvetia Marelan ,</td>
                
                <td width="10%">Kepada</td>
                <td width="5%">:&nbsp;</td>
                <td>{{ $transaksi->nama }}</td>
            </tr>
            <tr>
                <td  colspan="3" width="50%">
                    Medan, 0821-6291-9393</td>
                
                    <td rowspan="2">Alamat</td>
                    <td rowspan="2">:&nbsp;</td>
                    <td rowspan="2">{{ $transaksi->alamat }}</td>
            </tr>
            <tr>
                <td >Nomor Faktur</td>
                <td width="3%">:&nbsp;</td>
                <td>{{ $transaksi->id }}</td>
            </tr>
            <tr>
                <td>Tanggal Faktur</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                
                <td>Petugas</td>
                <td>:&nbsp;</td>
                <td>Imelda</td>
                
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
        <table class="table table-borderless" id="barang" style="width: 100%; ">
            <thead>
                <tr class="fw-semibold">
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
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
                    <td id="total"  class="text-end fw-semibold" style="text-align: right;font-weight:500">Total&nbsp;:</td>
                    <td id="total" class="text-center fw-semibold"style="font-weight:500">@currency($transaksi->total)</td>
                </tr>
            </tfoot>
        </table>
	<table class="table table-borderless" id="fott">
        <tr id="bawah">
            <td class="text-center" style="text-align: center;">Penerima</td>
            <td class="text-center" style="text-align: center;" ><span style=" margin-left:4rem;">Petugas</span> </td>
            <td  class="" style="text-align: start; margin-left:5rem;"><span
                    style="font-size: 17px;margin-left:4rem;text-decoration:underline"> Transfer via:</span> <br>
                    
            </td>
        </tr>

        <tr>
            <td class="text-center" style="text-align: center;padding-top:3rem">{{ $transaksi->nama }}</td>
            <td class="text-center" style="text-align: center;padding-top:3rem"><span style="text-align: center; margin-left:4rem;">Imelda </span></td>
            <td>
                <span style="font-size: 13px ;margin-left:4rem;">
                    BRI - 133301001293531
                   </span> 
                   </span> <br> <span style="font-size: 13px ;padding-left:4rem;">
                    BSI - 723053270</span>
    <br> <span style="font-size: 13px ;padding-left:4rem;">
                    AN - IMELDA</span>
            </td>
        </tr>
        </table>
   
        <div id="ket">
            <div class="text-start fw-semibold">Keterangan</div>
            <div class="text-start ">-{{$ket ?? ''}}</div>

        </div>
    @endif





  
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
