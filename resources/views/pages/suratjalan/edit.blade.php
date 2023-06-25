@extends('layout.main')
@section('content')
<div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size:1.3rem" class="mb-3 py-3 px-4 col-2 col-sm-3 col-lg-2">
    <div style="text-align: center">
      <i class="ti ti-building-bank"></i>
      <span>Surat Edit</span>
    </div>
  </div>
    <form action="/suratjalan/{{ $transaksi->id }}/update" method="post" class="form-horizontal form-label-left" novalidate>
        @csrf
        @method('put')
      <div class="row row-cols-2 bg-white px-4 py-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px">
        <div class="col">
          <div class="item form-group">
              <label class="control-label" for="nama_pembeli">Nama, Perusahaan</label>
              <div class="mb-2">
                  <div id="nama_pembeli" class="form-control bg-white" data-validate-length-range="6" data-validate-words="1" value="" type="text" >
                  {{ $transaksi->pelanggan->nama }}, {{ $transaksi->pelanggan->perusahaan }}
                </div>
              </div>
          </div>
          <div class="item form-group">
            <label class="control-label" for="tgl_beli">Tanggal Dibuat</label>
              <div class="">
                  <div class='input-group date' id='myDatepicker2'>
                      <input type="date" name="tgl_beli" value="{{ old('created_at', $transaksi->created_at->format('Y-m-d')) }}" id="tgl_beli" class="form-control bg-white" required="required" readonly>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="item form-group">
            <div class="item form-group mb-2">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label for="regular1" class="control-label">
                        Nomor Polisi
                    </label>
                    <input type="text" id="regular1" name="nomor_polisi" class="form-control" value="{{ old('nomor_polisi', $transaksi->nomor_polisi) }}">
                </div>
              </div>
              <div hidden class="item form-group mb-2">
                <label for="">Pembayaran</label>
                  <div class='input-group date' id='myDatepicker2'>
                      <select class="form-select" aria-label="Default select example"
                        value="{{ old('jenispembayaran', $transaksi->jenispembayaran) }}" name="jenispembayaran"
                        onchange="bon()" id="jenispembayaran">
                        <option value="{{ old('jenispembayaran', $transaksi->jenispembayaran) }}" selected>
                            {{ old('jenispembayaran', $transaksi->jenispembayaran) }}</option>
                        <option value="tunai">Tunai</option>
                        <option value="non-tunai">Non-Tunai</option>
                        <option value="belum-dibayar">Belum Dibayar</option>
                    </select>
                  </div>
              </div>
          </div>
        </div>
      </div>
        <table id="prod" class="table table-bordered bg-white mt-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px">
            <thead>
                <tr>
                    <th style="text-align: center" width="30%">Nama Barang</th>
                    <th style="text-align: center" width="15%">Satuan</th>
                    <th style="text-align: center" width="10%">Stok</th>
                    <th style="text-align: center">Harga</th>
                    <th style="text-align: center">jumlah</th>
                    <th style="text-align: center">Subtotal</th>
                    <th style="text-align: center">Aksi</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                  <td style="text-align:right; vertical-align: middle" colspan="5">
                    <b>Grandtotal</b>
                  </td>
                  <td>
                    <input id="grandtotal2" type="text" class="form-control grandtotal" value="0" readonly>
                    <input id="grandtotal" name="grandtotal" type="text" class="form-control grandtotal" hidden>
                  </td>
                </tr>
                <tr>
                  <td style="text-align:right; vertical-align: middle" colspan="5">
                    <b>Pembayaran</b>
                  </td>
                  <td>
                    <input id="pembayaran" name="pembayaran" type="number" class="form-control pembayaran" value="{{ old('pembayaran', $transaksi->pembayaran) }}">
                  </td>
                </tr>
              </tfoot>

            <tbody id="tbody">
                @foreach ($data as $item)
                    <tr role="row" class="1" id="trow">
                        <td>
                            <select required="required" style="width:100%;" class="form-control nama_obat"
                                id="{{ 'nama' . $loop->iteration }}" name="nama[]" data-stok="#stok1" data-unit="#unit1"
                                data-harga_jual="#harga_jual1" onchange="coba()">

                                <option value="{{ old('id_barang', $item->id_barang) }}" selected>
                                    {{ old('nama', $item->nama) }}</option>
                                @foreach ($hasil as $barang)

                                    @if ($barang->id !== old('id_barang', $item->id_barang))
                                        <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                                    @endif
                                @endforeach

                                {{-- @foreach ($obat as $o)


                  <option value=" {{$o->id_obat}} "> {{$o->nama_obat}} </option>
                        @endforeach --}}
                            </select>
                        </td>
                        <td>
                            <input id="{{ 'satuan' . $loop->iteration }}" name="stok[]" class="form-control stok"
                                readonly="">
                            <input id="{{ 'modal' . $loop->iteration }}" name="modal[]" class="form-control stok" hidden>
                        </td>
                        <td><input id="{{ 'stok' . $loop->iteration }}" name="unit[]" class="form-control"
                                readonly=""></td>
                        <td><input id="{{ 'harga' . $loop->iteration }}" name="harga_jual[]"
                                class="form-control harga_jual" readonly="" onchange="hitung()">
                        </td>
                        <td><input type="number" id="{{ 'jumlah' . $loop->iteration }}" name="jumlah[]"
                                class="form-control jumlah" required="required" onchange="hitung()"
                                value="{{ old('jumlah', $item->jumlah) }}">
                        </td>
                        <td><input id="{{ 'subtotaltampil' . $loop->iteration }}" class="form-control subtotal" readonly>
                        </td>
                        <td><input id="{{ 'subtotal' . $loop->iteration }}" name="subtotal[]"
                                class="form-control subtotal" hidden onchange="hitungseluruh()"></td>
                        <td><button id="1" class="btn btn-danger btn-sm hapus" type="button"
                                onclick="hapus(this)">
                                <span class="fa fa-trash"></span> Hapus</button>
                        </td>
                    </tr>
                @endforeach
        </table>

        <div class="ln_solid"></div>
        <div class="form-group form-group d-flex justify-content-end">
            <div class="d-flex gap-3">
                {{-- <a href=""><button type="button" class="btn btn-danger">Batal</button></a> --}}
                <button id='addRow' class="btn btn-info" type="button" onclick="tambah()">
                  <i class="ti ti-plus"></i>
                  <span>Tambah Produk</span>
                </button>
                <button id="send" type="submit" class="btn btn-success">
                  <i class="ti ti-device-floppy"></i>
                  <span>Simpan</span>
                </button>
                {{-- <button onclick="printDiv('prod')" class="btnprn btn">Print Preview</button> --}}

            </div>
        </div>
    </form>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        setInterval(function() {
            hitung();
            coba();
            hitungseluruh();
            kembalian();
        }, 1000);
    
        function bon() {
            var jenis = document.getElementById("jenispembayaran").value;
            if (jenis === String("belum-dibayar").valueOf()) {
                var bon = document.getElementById("bon");
                bon.classList.remove("d-none");
            } else {
                var bon = document.getElementById("bon");
                bon.classList.add("d-none");
            }
        }
    
        var balek = document.getElementById("kembali");
        var balektampil = document.getElementById("kembalian");
        balek.addEventListener("keyup", function(e) {
            balektampil.value = formatRupiah(balek.value, "Rp. ");
        });
    
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }
    
            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    
        function tambah() {
            let a = document.querySelectorAll("#trow");
            setInterval(a.length, 100);
            let panjang = a.length + 1;
    
            var b = document.getElementById("trow");
            var baru = b.cloneNode(true);
    
            baru.querySelector("#harga1").id = 'harga' + panjang;
            baru.querySelector("#nama1").id = 'nama' + panjang;
            baru.querySelector("#stok1").id = 'stok' + panjang;
            baru.querySelector("#subtotal1").id = 'subtotal' + panjang;
            baru.querySelector("#subtotaltampil1").id = 'subtotaltampil' + panjang;
            baru.querySelector("#jumlah1").id = 'jumlah' + panjang;
            baru.querySelector("#modal1").id = 'modal' + panjang;
            baru.querySelector("#satuan1").id = 'satuan' + panjang;
            baru.querySelector(".hapus").id = panjang;
            baru.className = panjang;
    
            let bodya = document.getElementById("tbody");
            bodya.appendChild(baru);
        }
    
        function incrementJumlah(id) {
            let jumlah = document.getElementById('jumlah' + id);
            let stok = document.getElementById('stok' + id);
            let currentJumlah = parseInt(jumlah.value);
            let currentStok = parseInt(stok.value);
    
            if (currentJumlah < currentStok) {
                jumlah.value = currentJumlah + 1;
                hitung();
            }
        }
    
        function decrementJumlah(id) {
            let jumlah = document.getElementById('jumlah' + id);
            let currentJumlah = parseInt(jumlah.value);
    
            if (currentJumlah > 1) {
                jumlah.value = currentJumlah - 1;
                hitung();
            }
        }
    
        function hitung() {
            let a = document.querySelectorAll("#trow");
            setInterval(a.length, 1000);
            let panjang = a.length;
    
            for (let i = 1; i <= panjang; i++) {
                let id = "jumlah" + i;
                let jual = "harga" + i;
                let total = "subtotal" + i;
                let tampil = "subtotaltampil" + i;
                let stk = "stok" + i;
                let jumlah = parseInt(document.getElementById(id).value);
                let satuan = document.getElementById(jual).value;
                let stok = parseInt(document.getElementById(stk).value);
    
                if (jumlah > stok) {
                    document.getElementById(id).value = " ";
                    document.getElementById(id).placeholder = " ";
                    var element = document.getElementById("alert");
                    element.classList.remove("d-none");
                    element.classList.add("d-flex");
                } else {
                    let hasil = document.getElementById(id).value * satuan;
                    document.getElementById(total).value = hasil;
                    document.getElementById(tampil).value = formatRupiah(document.getElementById(total).value, "Rp. ");
                }
            }
        }
    
        function hapus(e) {
            e.parentNode.parentNode.remove();
        }
    
        function coba() {
            let a = document.querySelectorAll("#trow");
            let tipe = document.getElementById('tipe').value;
            setInterval(a.length, 100);
    
            let panjang = a.length;
    
            for (let i = 1; i <= panjang; i++) {
                let id = "#nama" + i;
                let stok = "#stok" + i;
                let harga = '#harga' + i;
                let unit = '#satuan' + i;
                let modal = '#modal' + i;
    
                $(id).each(function() {
                    var id = $(this).val();
    
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: "{{ url('/detail-barang-') }}" + id,
                        success: function(data) {
                            document.querySelector(stok).placeholder = data.data.stok;
                            document.querySelector(stok).value = data.data.stok;
                            document.querySelector(unit).value = data.data.satuan;
    
                            let tes = document.querySelector(harga);
                            let c = data.data.hargajual;
                            document.querySelector(modal).value = data.data.hargabeli;
                            tes.value = c;
                        }
                    });
                });
            }
        }
    
        function hitungseluruh() {
            let a = document.querySelectorAll("#trow");
            setInterval(a.length, 1000);
            let seluruh = 0;
            let panjang = a.length;
    
            for (let i = 1; i <= panjang; i++) {
                let total = "subtotal" + i;
                let jumlah = parseInt(document.getElementById(total).value);
                seluruh = seluruh + jumlah;
                document.getElementById("grandtotal").value = seluruh;
                document.getElementById("grandtotal2").value = formatRupiah(document.getElementById("grandtotal").value, "Rp. ");
            }
        }
    </script>
@endsection
