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
          <div class="d-flex justify-content-between">
              <div class="d-flex gap-2">
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
                  {{-- <div class="btn btn-sm btn-danger">
                    <a href="eksport">Ekspor PDF</a>
                  </div> --}}
              </div>
              <form>
                  <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example" name="kategori"
                          onchange="this.form.submit()">
                          @if ($id)
                              <option value="">Pilih Kategori</option>
                          @else
                              <option selected value="">Pilih Kategori</option>
                          @endif

                          @foreach ($kategori as $item)
                              @if ($id == $item->id)
                                  <option value="{{ $item->id }}" selected>{{ $item->kategori }}</option>
                              @else
                                  <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                              @endif
                          @endforeach
                      </select>
                  </div>
              </form>
          </div>


          <table class="table text-center mt-3 ">
              <thead>
                  <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Kode</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Berat</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @if ($data->isEmpty())
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
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->nama }}</td>
                              <td>{{ $item->satuan }}</td>
                              <td>{{ $item->stok }}</td>
                              <td>{{ $item->berat }}</td>
                              <td>
                                  <div class="d-flex gap-2 justify-content-center">
                                      @component('components.modal')
                                          @slot('target')
                                              {{ $item->id }}
                                          @endslot
                                          @slot('icon')
                                              <div style="border-radius: 5px" type="submit" class="btn btn-success mb-1 text-white">
                                                <i class="ti ti-calendar-plus"></i>
                                                <span>Volume</span>
                                              </div>
                                          @endslot
                                          @slot('isi')
                                              <form action="/barang/tambah/{{ $item->id }}" method="POST" class="px-4 py-4 col-12">
                                                  @method('post')
                                                  @csrf
                                                  <h3>Masukkan Jumlah Volume yang ingin ditambah</h6>
                                                  <div class="my-4">
                                                      <input placeholder="Masukan Tambahan Volume" type="number" class="form-control border border-secondary border-opacity-50" id="exampleFormControlInput1" name="berat" required>
                                                  </div>
                                                  <div class="d-flex justify-content-end">
                                                      <button type="submit" class="btn btn-primary">
                                                        <i class="ti ti-send"></i>
                                                        <span>Submit</span>
                                                      </button>
                                                  </div>
                                              </form>
                                          @endslot
                                      @endcomponent
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

@endsection
