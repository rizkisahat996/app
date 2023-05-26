@extends('layout.main')
@section('content')
    <div class="mx-auto">
      <div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size:1rem" class="py-3 px-4 mb-4 mt-3 col-sm-7 col-xl-4 col-lg-5 d-flex">
          <div>
            <a href="/barang">
              <i class="ti ti-building-warehouse"></i>
              <span>Gudang</span>
            </a>
          </div>
          <div>
            <i class="ti ti-chevron-right"></i>
          </div>
          <div>
            <i class="ti ti-shopping-cart-plus"></i>
            <span>Tambah Barang</span>
          </div>
        </div>
        <form action="/barang" method="post" enctype="multipart/form-data" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px" class="bg-white px-4 py-4">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode barang</label>
                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" placeholder="Masukan kode barang">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" placeholder="Masukan nama barang">
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan Barang</label>
                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="satuan" placeholder="Masukan satuan baranga">
            </div>
            <div class="mb-3">
              <label for="id_kategori" class="form-label">Kategori Barang</label>
                <select class="form-select" aria-label="Default select example" name="id_kategori">
                    <option selected>==Pilih Kategori==</option>
                    @foreach ($kategori as $item)

                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Minimum Stok</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="minimstok" placeholder="Masukkan minimum stok pemberitahuan">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Beli</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargabeli">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Eceran</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargaeceran">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Grosir</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargagrosir">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Retail</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input required type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargaretail">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stok</label>
                <input required type="number" class="form-control border border-secondary border-opacity-50" id="exampleFormControlInput1" name="stok" placeholder="Masukan stok yang akan di setor">
              </div>
              <div class="mb-3">
                <label for="formFileSm" class="form-label">Masukkan Gambar</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="gambar">
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                  <i class="ti ti-send"></i>
                  <span>Submit</span>
                </button>
              </div>
        </form>
    </div>
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
@endpush
