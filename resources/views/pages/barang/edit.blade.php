@extends('layout.main')
@section('content')
  <div class="mx-auto ">
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
            <span>Edit Barang</span>
          </div>
        </div>
      <form style="border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" class="bg-white py-4 px-4" action="/barang/{{ $barang->id }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="{{ old('nama',$barang->nama) }}">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Beli</label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                  <span class="input-group-text">Rp.</span>
                  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargabeli" value="{{ old('hargabeli',Str::limit($barang->hargabeli, 3, "")) }}">
                  <span class="input-group-text">.000</span>
              </div>
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Eceran</label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                  <span class="input-group-text">Rp.</span>
                  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargaeceran" value="{{ old('hargaeceran',Str::limit($barang->hargaeceran, 3, "")) }}">
                  <span class="input-group-text">.000</span>
              </div>
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Grosir</label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                  <span class="input-group-text">Rp.</span>
                  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargagrosir" value="{{ old('hargagrosir',Str::limit($barang->hargagrosir, 3, "")) }}">
                  <span class="input-group-text">.000</span>
              </div>
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Retail</label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                  <span class="input-group-text">Rp.</span>
                  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargaretail" value="{{ old('hargaretail',Str::limit($barang->hargaretail, 3, "")) }}">
                  <span class="input-group-text">.000</span>
              </div>
          </div>
          <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Stok</label>
              <input type="number" class="form-control border border-secondary border-opacity-50" id="exampleFormControlInput1" name="stok" value="{{ old('stok',$barang->stok) }}">
            </div>
            <div class="mb-3">
              <label for="formFileSm" class="form-label">Masukkan Gambar</label>
              <input class="form-control form-control-sm" id="formFileSm" type="file" name="gambar">
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">
                <span>Submit</span>
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
              </button>
            </div>
      </form>
    </div>
@endsection
