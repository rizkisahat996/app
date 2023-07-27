@extends('layout.main')
@section('content')
    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>
    <div class=" mx-auto">
      <div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size:1.3rem" class="mb-3 py-3 px-4 col-2 col-sm-3 col-lg-2">
        <div style="text-align: center">
          <i class="ti ti-building-bank"></i>
          <span>Kasir</span>
        </div>
      </div>
      <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px" class="bg-white py-5 px-5">
          <div class="d-flex justify-content-start align-items-center me-5 gap-2">
            <a href="/kasir">
                <div style="border-radius: 5px" class="btn btn-primary">
                  <i class="ti ti-currency-dollar"></i>
                  <span>Tambah Penjualan</span>
                </div>
            </a>
        </div>
          <form>
              <div class="d-flex gap-3 justify-content-end align-items-end pb-5">
                <div class="d-flex col-3">
                      <select class="form-select" aria-label="Default select example" name="jenispembayaran">
                          <option value="" selected>Semua Pembayaran</option>
                          <option value="tunai">Tunai</option>
                          <option value="non-tunai">Non-Tunai</option>
                          <option value="belum-dibayar">Belum Dibayar</option>
                      </select>
                  </div>
                  <div class="">
                      <div class="d-flex gap-3">
                          <div class="col-sm-4 ">
                            <label for="">Dari</label>
                              <div class='input-group date' id='myDatepicker2'>
                                  <input type="date" name="tgl_awal" id="tgl_beli" class="form-control">
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>
                          <div class="col-sm-4 ">
                            <label for="">sampai</label>
                              <div class='input-group date' id='myDatepicker2'>
                                  <input type="date" name="tgl_akhir" id="tgl_beli" class="form-control">
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                              <button type="submit" class="btn btn-success">
                                <i class="ti ti-search"></i>
                                <span>Cari</span>
                              </button>
                            </div>
                        </div>
                  </div>
              </div>
          </form>

          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Faktur</th>
                      <th scope="col">Nama, Perusahaan</th>
                      <th scope="col">Tanggal Pembelian</th>
                      <th scope="col">Total</th>
                      <th scope="col" width="10%">Metode Pembayaran</th>
                      <th scope="col" class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @if ($hasil->isEmpty())
                      <tr>
                          <td colspan="8">
                              <div class="d-flex text-muted justify-content-center text-center">
                                  Transaksi Belum Ada
                              </div>
                          </td>
                      </tr>
                  @else
                      @foreach ($hasil as $item)
                          <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $item->kodefaktur }}</td>
                              <td>{{ $item->nama }}, {{ $item->perusahaan }}</td>
                              <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                              <td>@currency($item->total)</td>
                              <td class="text-start ms-5 ps-5">{{ $item->jenispembayaran }}</td>
                              <td class="d-flex justify-content-center gap-3"> 
                                <a target="_blank"
                                      href="/preview/{{ $item->id }}">
                                      <div class="btn btn-primary btn-sm text-white mb-1">
                                          <i class="ti ti-printer"></i>
                                          <span>Print</span>
                                      </div>
                                  </a>
                                  @if (auth()->user()->jabatan == 'superadmin')
                                      
                                  <a target="" href="/kasir/edit/{{ $item->id }}">
                                      <div class="btn btn-warning btn-sm text-white mb-1">
                                        <i class="ti ti-edit"></i>
                                        <span>Edit</span>
                                      </div>
                                  </a>
                                            @component('components.modal')
                                                @slot('target')
                                                    {{ $item->id }}
                                                @endslot
                                                @slot('icon')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="ti ti-trash"></i>
                                                        <span>Hapus</span>
                                                    </button>
                                                @endslot
                                                @slot('isi')
                                                    <div class="py-4">
                                                        <h3 style="text-align: center">Apakah Anda yakin ingin Faktur ini?</h6>
                                                        <div class="d-flex justify-content-center mt-4">
                                                            <a href="/kasir/delete/{{ $item->id }}" class="btn btn-danger">
                                                                <i class="ti ti-trash"></i>
                                                                <span>Hapus</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endslot
                                            @endcomponent
                                  @endif
                              </td>
                          </tr>
                      @endforeach
                  @endif
              </tbody>
          </table>

      </div>
    </div>


@endsection
