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
        {{-- {{ dd($transaksi->id) }} --}}
      <form action="/pdfsurat/{{ $transaksi->id }}">
          <h5 class="text-center">Preview Surat</h5>
          <div class="mx-1 mt-3 py-5 px-5 bg-white">
              <div class="d-flex justify-content-between px-1 py-2" id="top">
                  <div class="fw-bold fs-5">BOBIE</div>
                  <div class="fw-bold fs-5">Surat Perjalanan</div>
              </div>
              <table class="table " id="tab">
                  <tr class="">
                      <td width="20%">Nomor Surat</td>
                      <td width="5%">:</td>
                      <td>{{ $transaksi->kodejalan }}</td>
                      <td width="10%"></td>
                      <td width="20%">Kepada</td>
                      <td width="5%">:</td>
                      <td style="text-align: start">{{ $transaksi->pelanggan->nama }}</td>
                  </tr>
                  <tr class="">
                      <td width="20%">Tanggal Surat</td>
                      <td width="5%">:</td>
                      <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                      <td width="10%"></td>
                      <td width="20%">Alamat</td>
                      <td width="5%">:</td>
                      <td style="text-align: start">{{ $transaksi->pelanggan->alamat }}</td>
                  </tr>
                  <tr class="">
                      <td width="20%">Perusahaan</td>
                      <td width="5%">:</td>
                      <td>{{ $transaksi->pelanggan->perusahaan }}</td>
                      <td width="10%"></td>
                      <td width="20%"></td>
                      <td width="5%"></td>
                      <td style="text-align: start"></td>
                  </tr>
                  <tr class="">
                      <td width="20%">Nomor Polisi</td>
                      <td width="5%">:</td>
                      <td>{{ $transaksi->nomor_polisi }}</td>
                      <td width="10%"></td>
                      <td width="20%"></td>
                      <td width="5%"></td>
                      <td style="text-align: start"></td>
                  </tr>
              </table>
          </div>
          <div class="mx-1 mt-3 py-5 px-5 bg-white">
              <table class="table " id="tab">
                  <thead class="text-center">
                      <tr>
                          <th>No.</th>
                          <th>Nama Barang</th>
                          <th>Kuantitas</th>
                          <th>Satuan</th>
                          <th>Volume</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($detail as $item)
                          <tr class="text-center" >
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->nama }}</td>
                              <td>{{ $item->kuantitas }}</td>
                              <td>{{ $item->satuan }}</td>
                              <td>10</td>
                              <td>{{ $item->keterangan }}</td>
                          </tr>
                          {{ $item->keterangan }}
                      @endforeach
                  </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-start ml-4">
                <button type="submit" class="btn border-2 border border-gray-500 btn-primary py-2 text-white px-3 mt-4">
                  <span>Print Surat</span>
                  <i class="fa-solid fa-print"></i>
                </button>
            </div>
      </form>
    </div>
    @push('css')
    @endpush
@endsection
