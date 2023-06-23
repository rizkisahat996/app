@extends('layout.main')
@section('content')
<style>
    a{
        text-decoration: none;
        color: white;
    }
</style>
    <div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size:1rem" class="py-3 px-4 mb-4 mt-3 col-sm-6 col-xl-4 col-lg-4 d-flex">
      <div>
        <span>Daftar Pembelian Pelanggan</span> <br>
        <span><b>{{ $pelanggan->nama }}, {{ $pelanggan->perusahaan }}</b></span>
      </div>
    </div>
    <div class="bg-white px-4 py-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Faktur</th>
                    <th scope="col">Tanggal Pembelian</th>
                    <th scope="col">Total</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (empty($data))
                    <tr>
                        <td colspan="8">
                            <div class="d-flex text-muted justify-content-center text-center">
                                Transaksi Belum Ada
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->id }}</td>
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

@endsection
