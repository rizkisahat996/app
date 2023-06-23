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
        <i class="ti ti-user"></i>
        <span>Manajemen Pelanggan</span>
      </div>
    </div>
    <div class="bg-white px-4 py-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px">
        <div class="d-flex justify-content-start">
          <a href="{{ route('pelanggan.create') }}">
            <button class="btn btn-primary p-2 fs-4">
              <i class="ti ti-user-plus"></i>
              <span>Tambah Pelanggan</span>
            </button>
          </a>
        </div>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->isEmpty())
                            <tr>
                                <td colspan="5">
                                    <div class="d-flex text-muted justify-content-center text-center">
                                        Pelanggan Belum Ada
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->perusahaan }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a target="_blank"
                                          href="{{ route('pelanggan.show', $item->id) }}">
                                          <div class="btn btn-primary btn-sm text-white mb-1">
                                              <i class="ti ti-brand-cashapp"></i>
                                              <span>Lihat</span>
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
                                                    <form action="/pelanggan/{{ $item->id }}" method="POST" class="py-4">
                                                        @method('DELETE')
                                                        @csrf
                                                        <h3 style="text-align: center">Apakah Anda yakin ingin menghapus Pelanggan ini?</h6>
                                                        <div class="d-flex justify-content-center mt-4">
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="ti ti-trash"></i>
                                                                <span>Hapus</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endslot
                                            @endcomponent
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
    </div>

@endsection
