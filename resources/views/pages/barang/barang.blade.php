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
    <div class="col-lg-10 mx-auto">
      <div style="background-color: #b8a266; border-radius: 5px; box-shadow: 1em; color: white" class="py-3 px-4 mb-5 mt-3 col-lg-2">
        <i class="fa-solid fa-cart-flatbed"></i>
        <span>Edit Barang</span>
      </div>
      <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px" class="bg-white py-4 px-4">
          <div class="d-flex justify-content-between">
              <div class="d-flex gap-2">
                  <div class="btn btn-primary">
                    <a href="/barang/create">Tambah Barang</a>
                    <i class="fa-solid fa-cart-plus"></i>
                  </div>
                  <div class="btn btn-success">
                    <a href="kategori">Tambah Kategori </a>
                    <i class="fa-solid fa-circle-plus"></i>
                  </div>
                  {{-- <div class="btn btn-sm btn-danger">
                    <a href="eksport">Ekspor PDF</a>
                  </div> --}}
              </div>
              <form>
                  <div class="col-sm-10">
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


          <table class="table text-center mt-3 " id="tab">
              <thead>
                  <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Kode</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @if ($data->isEmpty())
                      <tr>
                          <td colspan="5">
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
                              <td>
                                  <div class="d-flex gap-2 justify-content-center">
                                      @component('components.modal')
                                          @slot('target')
                                              {{ $item->id }}
                                          @endslot
                                          @slot('icon')
                                              <div style="border-radius: 5px" type="submit" class="btn btn-success mb-1 text-white">
                                                  <span>Stok</span>
                                                  <i class="fa-solid fa-plus"></i>
                                              </div>
                                          @endslot
                                          @slot('isi')
                                              <form action="/barang/tambah/{{ $item->id }}" method="POST">
                                                  @method('post')
                                                  @csrf
                                                  <div class="d-flex justify-content-center text-center">
                                                      <h6>Masukkan Jumlah Stok yang ingin ditambah</h6>
                                                  </div>
                                                  <div class="mb-3">
                                                      <input placeholder="Masukan Tambahan Stok" type="number" class="form-control border border-secondary border-opacity-50" id="exampleFormControlInput1" name="stok" required>
                                                  </div>
                                                  <div class="d-flex justify-content-end">
                                                      <button type="submit" class="btn btn-success btn-sm">
                                                          <span>Submit</span>
                                                          <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                                      </button>
                                                  </div>
                                              </form>
                                          @endslot
                                      @endcomponent
                                      <a href="barang/{{ $item->id }}/edit">
                                          <div style="border-radius: 5px" class="btn btn-warning text-white mb-1">
                                            <span>Edit</span>
                                            <i class="fa-solid fa-pen-to-square"></i>
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
