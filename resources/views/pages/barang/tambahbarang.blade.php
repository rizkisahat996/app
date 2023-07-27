@extends('layout.main')
@section('content')
    <div class="mx-auto">
      <!-- Tampilkan pesan kesalahan jika ada -->
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
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
              <label for="id_kategori" class="form-label">Jenis Stok</label>
                <select class="form-select" aria-label="Default select example" name="jenis">
                    <option selected>==Pilih Jenis==</option>
                    <option value="Sak">Sak</option>
                    <option value="Pcs">Pcs</option>
                    <option value="Pail">Pail</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Berat Total</label>
                <input required type="number" class="form-control border border-secondary border-opacity-50" id="exampleFormControlInput1" name="berat" placeholder="Masukan volume yang akan di setor">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jumlah Stok</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                  <input readonly="" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="stok" id="berat">
                </div>
              </div>
            <div class="mb-3">
              <label for="id_kategori" class="form-label">Satuan Barang</label>
                <select class="form-select" aria-label="Default select example" name="satuan">
                    <option selected>==Pilih Satuan==</option>
                    <option value="Kg">Kg</option>
                    <option value="M^²">M^²</option>
                    <option value="Unit">Unit</option>
                    <option value="Psc">Psc</option>
                  </select>
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
            <div hidden class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Minimum Stok</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <input value="10" required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="minimstok" placeholder="Masukkan minimum stok pemberitahuan">
                </div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Beli</label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                <span class="input-group-text">Rp.</span>
                <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargabeli" id="hargabeli">
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Untung</label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                <span class="input-group-text">Rp.</span>
                <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="untung" id="untung">
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Jual Per Satuan <span>(termasuk ppn)</span></label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                <span class="input-group-text">Rp.</span>
                <input readonly="" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargajual" id="hargajual">
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Keterangan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="keterangan" placeholder="Masukan keterangan barang">
          </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                  <i class="ti ti-send"></i>
                  <span>Submit</span>
                </button>
              </div>
        </form>
    </div>
    <script type="text/javascript">
      const stokInput = document.getElementById('exampleFormControlInput1');
      const beratInput = document.getElementById('berat');
    
      stokInput.addEventListener('input', function() {
        const stokValue = parseFloat(stokInput.value);
        const beratTotal = stokValue / 25;
    
        beratInput.value = beratTotal;
      });
      </script>
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    
@endpush
