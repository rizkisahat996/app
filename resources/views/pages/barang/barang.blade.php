@extends('layout.main')
@section('content')
    <style>
        a {
            text-decoration: none;
            color: white
        }
        #tab{
            font-size: 17px
        }
    </style>
    <div class="mx-auto">
        <div class="row">
          <div class="col-sm-4 col-lg-2 col-6">
            <div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size: 1rem; text-align: center;" class="py-3 px-4 mb-4 mt-3">
              <i class="ti ti-building-warehouse"></i>
              <span>Gudang</span>
            </div>
          </div>
        </div>
        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px" class="bg-white py-4 px-4">
            <div class="d-md-flex justify-content-between">
              <div class="d-flex flex-wrap gap-2">
                <div class="btn btn-primary">
                  <a href="/barang/create">
                    <i class="ti ti-shopping-cart-plus"></i>
                    <span>Tambah Barang</span>
                  </a>
                </div>
                <div class="btn btn-success">
                  <a href="kategori">
                    <i class="ti ti-category-2"></i>
                    <span>Tambah Kategori</span>
                  </a>
                </div>
              </div>
            </div>
          
            <div class="table-responsive mt-3">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th width="5%">No</th>
                          <th>Kode</th>
                          <th>Nama Barang</th>
                          <th>Satuan</th>
                          <th>Stok</th>
                          <th>Berat</th>
                          <th>Kategori</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @if ($data->count() == null)
                      <tr>
                        <td colspan="8">
                          <div class="d-flex text-muted justify-content-center text-center">
                            Barang Belum Ada
                          </div>
                        </td>
                      </tr>
                      @else
                      @foreach ($data as $item)
                      <tr>
                        {{-- {{ dd($item->id) }} --}}
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->berat }}</td>
                        <td>{{ $item->namakategori }}</td>
                        <td>
                          <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="barang/{{ $item->id }}/edit">
                              <div style="border-radius: 5px" class="btn btn-warning text-white mb-1">
                                <i class="ti ti-edit"></i>
                                <span>Edit</span>
                              </div>
                            </a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                  </tbody>
              </table>
          </div>
          </div>
          
    </div>

@endsection
