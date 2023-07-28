@extends('layout.main')
@section('content')
    <div class="text-center fw-semibold fs-5 mb-3">Jurnal Transaksi</div>
    <div class="d-flex justify-content-center ">
        <div class="col-lg-12 bg-white p-5 table-responsive">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nomor Faktur</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($penjualan->isEmpty())
                            <tr>
                                <td colspan="3">
                                    <div class="d-flex text-muted justify-content-center text-center">
                                        Transaksi Belum Ada
                                    </div>
                                </td>
                            </tr>
                        @else
                        @foreach ($penjualan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->kodefaktur }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><div class="d-flex gap-2">
                                    <a target="_blank"
                                  href="/histori/jurnal/{{ $item->id }}">
                                  <div class="btn btn-primary btn-sm text-white mb-1">
                                      <i class="ti ti-brand-cashapp"></i>
                                      <span>Lihat</span>
                                  </div>
                              </a></td>
                                
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
