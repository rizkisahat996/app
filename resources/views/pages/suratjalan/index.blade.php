@extends('layout.main')
@section('content')
  <div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size:1.3rem" class="mb-3 py-3 px-4 col-2 col-sm-3 col-lg-2">
    <div style="text-align: center">
      <i class="ti ti-building-bank"></i>
      <span>Surat Jalan</span>
    </div>
  </div>
  <form action="/suratjalan" method="post" class="form-horizontal form-label-left" novalidate>
      @csrf
      <div class="row row-cols-2 bg-white px-4 py-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px">
        <div class="col">
          <div class="mb-3">
            <label for="id_kategori" class="form-label">Nama, Perusahaan</label>
              <select class="form-select" aria-label="Default select example" name="pelanggan_id">
                  <option selected>==Pilih Penerima==</option>
                  @foreach ($pelanggan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}, {{ $item->perusahaan }}</option>
                  @endforeach
                </select>
          </div>
          <div class="item form-group">
            <label class="control-label" for="tgl_beli">Tanggal Dibuat</label>
              <div class="">
                  <div class='input-group date' id='myDatepicker2'>
                      <input style="background-color: white" type="date" name="tgl_beli" id="tgl_beli" class="form-control" required="required">
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
                    <input type="text" id="regular1" name="nomor_polisi" class="form-control">
                </div>
              </div>
              <div hidden class="item form-group mb-2">
                <label for="">Pembayaran</label>
                  <div class='input-group date' id='myDatepicker2'>
                      <select style="background-color: white" class="form-select" aria-label="Default select example" name="jenispembayaran" onchange="bon()" id="jenispembayaran">
                          <option selected>==Pilih Metode Pembayaran==</option>
                          <option value="tunai">Tunai</option>
                          <option value="non-tunai">Non-Tunai</option>
                          <option value="belum-dibayar" >Belum Dibayar</option>
                      </select>
                  </div>
              </div>
          </div>
        </div>
      </div>


      <table style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" id="prod" class="table table-bordered bg-white mt-3 py-4 px-4">
        <thead>
            <tr>
                <th style="text-align: center" width="30%">Nama Barang</th>
                <th style="text-align: center" width="10%">Satuan</th>
                <th style="text-align: center" width="10%">Stok</th>
                <th style="text-align: center" width="10%">Volume</th>
                <th style="text-align: center" width="10%">Kuantitas</th>
                <th style="text-align: center" width="30%">Keterangan</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <tr role="row" class="1" id="trow">
                <td>
                    <select required style="width:100%;" class="form-control nama_obat" id="nama1" name="nama[]" data-stok="#stok1" data-unit="#unit1" onchange="showDetails(1)">
                        <option disabled selected value>--Pilih nama barang--</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}" data-stok="{{ $item->stok }}" data-unit="{{ $item->satuan }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input id="satuan1" class="form-control stok" readonly="">
                </td>
                <td>
                    <input id="stok1" class="form-control" readonly="">
                </td>
                <td>
                    <input id="stok1" name="jumlah[]" class="form-control" readonly="" value=10>
                </td>
                <td>
                    <input type="number" id="jumlah1" name="kuantitas[]" class="form-control jumlah" required>
                </td>
                <td>
                  <input type="text" name="keterangan[]" class="form-control jumlah" required>
                </td>
                <td>
                    <button id="1" class="btn btn-danger hapus" type="button" onclick="hapus(this)">
                        <i class="ti ti-trash"></i>
                        <span>Hapus</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

      <div class="ln_solid"></div>
      <div class="form-group d-flex justify-content-end">
          <div class="d-flex gap-3">
              <button style="color: white" id='addRow' class="btn btn-primary" type="button" onclick="tambah()">
                <i class="ti ti-plus"></i>
                <span>Tambah Produk</span>
              </button>

              <button id="send" type="submit" class="btn btn-success">
                <i class="ti ti-printer"></i>
                <span>Print Surat</span>
              </button>
              {{-- <button onclick="printDiv('prod')" class="btnprn btn">Print Preview< /button> --}}
          </div>
      </div>
  </form>

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
       function showDetails(rowId) {
        var selectElement = document.getElementById('nama' + rowId);
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        var stokInput = document.getElementById('stok' + rowId);
        var satuanInput = document.getElementById('satuan' + rowId);

        var stok = selectedOption.getAttribute('data-stok');
        var satuan = selectedOption.getAttribute('data-unit');

        stokInput.value = stok;
        satuanInput.value = satuan;
    }
    </script>
@endsection
