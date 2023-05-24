@extends('layout.main')
@section('content')
    <style>
        #top {
            color: rgba(24, 24, 24, 0.77)
        }

        #tab {
            font-weight: 400;
            font-size: 15px;
            color: rgb(92, 92, 92)
        }

        a {
            text-decoration: none;
            color: white
        }
    </style>
    <div class="col-lg-10 mx-auto">
      <form action="/pdf/{{ $transaksi->id }}">
          <h5 class="text-center">Preview</h5>
          <div class="mx-1 mt-3 py-5 px-5 bg-white">
              <div class="d-flex justify-content-between px-1 py-2" id="top">
                  <div class="fw-bold fs-5">BOBIE</div>
                  <div class="fw-bold fs-5">Faktur Penjualan</div>
              </div>
              <table class="table " id="tab">
                  <tr class="">
                      <td width="20%">Nomor Faktur</td>
                      <td width="5%">:</td>
                      <td>{{ $transaksi->id }}</td>
                      <td width="10%"></td>
                      <td width="20%">Kepada</td>
                      <td width="5%">:</td>
                      <td style="text-align: start">{{ $transaksi->nama }}</td>
                  </tr>
                  <tr class="">
                      <td width="20%">Tanggal Faktur</td>
                      <td width="5%">:</td>
                      <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                      <td width="10%"></td>
                      <td width="20%">Alamat</td>
                      <td width="5%">:</td>
                      <td style="text-align: start">{{ $transaksi->alamat }}</td>
                  </tr>
                  <tr class="">
                      <td width="20%">Tanggal Tempo</td>
                      <td width="5%">:</td>
                      <td>{{ Carbon\Carbon::parse($transaksi->jatuh_tempo)->format('d-m-Y') ?? '-' }}</td>
                      <td width="10%"></td>
                      <td width="20%">Metode Pembayaran</td>
                      <td width="5%">:</td>
                      <td style="text-align: start">{{ $transaksi->jenispembayaran }}</td>
                  </tr>
              </table>
          </div>
          <div class="mx-1 mt-3 py-5 px-5 bg-white">
              <table class="table " id="tab">
                  <thead class="text-center">
                      <tr>
                          <th>No.</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                          <th>Harga</th>
                          <th>Subtotal</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($detail as $item)
                          <tr class="text-center" >
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->nama }}</td>
                              <td>{{ $item->jumlah }}</td>
                              <td>{{ $item->satuan }}</td>
                              <td>@currency($item->harga_jual) </td>
                              <td>@currency($item->subtotal) </td>
                          </tr>
                      @endforeach
                      <tr>

                          <td colspan="5" class="text-end">Total&nbsp;:</td>
                          <td class="text-center">@currency($transaksi->total)</td>
                      </tr>
                  </tbody>
              </table>
              <div class="col-md-3 mt-5">
                <input class="form-control border border-3" type="text" id="note" name="note" placeholder="Masukan keterangan disini">
              </div>
            </div>
            <div class="d-flex justify-content-start ml-4">
                <button type="submit" class="btn border-2 border border-gray-500 btn-primary py-2 text-white px-3 mt-4">
                  <span>Print Faktur</span>
                  <i class="fa-solid fa-print"></i>
                </button>
            </div>
      </form>
    </div>
    @push('css')
    @endpush
@endsection
