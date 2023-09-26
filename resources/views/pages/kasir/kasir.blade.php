@extends('layout.main')
@section('content')
    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>
    <div class="container">
        <div class="mx-auto">
          <div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size: 1.3rem"
            class="mb-3 py-3 px-4 col-12 col-sm-6 col-md-4 col-lg-3">
            <div style="text-align: center">
              <i class="ti ti-building-bank"></i>
              <span>Kasir</span>
            </div>
          </div>
      
          <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px"
            class="bg-white py-5 px-5">
            <div class="d-flex justify-content-start align-items-center me-5 gap-2 mb-4">
              <a href="/kasir">
                <div style="border-radius: 5px" class="btn btn-primary">
                  <i class="ti ti-currency-dollar"></i>
                  <span>Tambah Penjualan</span>
                </div>
              </a>
            </div>
            {{-- <form>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-sm-end align-items-end pb-3">
                  <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mb-sm-0">
                          <!-- Add an empty column for proper alignment -->
                        </div>
                      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mb-sm-0">
                        <label for="">Dari</label>
                        <input type="date" name="tgl_awal" id="tgl_beli" class="form-control">
                      </div>
                      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mb-sm-0">
                        <label for="">sampai</label>
                        <input type="date" name="tgl_akhir" id="tgl_beli" class="form-control">
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-success w-100">
                          <i class="ti ti-search"></i>
                          <span>Cari</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form> --}}
              
      
            <div class="table-responsive">
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
    </div>
  </div>
@endsection
