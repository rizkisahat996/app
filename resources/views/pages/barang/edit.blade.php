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
            <label for="exampleInputEmail1" class="form-label">Kategori Barang</label>
            <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $barang->nama_kategori }}">
        </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Beli</label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                  <span class="input-group-text">Rp.</span>
                  <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargabeli" id="hargabeli" value="{{ old('hargabeli',$barang->hargabeli) }}">
              </div>
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Untung</label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                  <span class="input-group-text">Rp.</span>
                  <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="untung" id="untung" value="{{ old('untung',$barang->untung) }}">
              </div>
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Jual <span>(termasuk ppn)</span></label>
              <div class="input-group mb-3" id="exampleInputEmail1">
                  <span class="input-group-text">Rp.</span>
                  <input readonly="" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargajual" id="hargajual" value="{{ old('hargajual',$barang->hargajual) }}">
              </div>
              <input class="form-check-input" type="checkbox" id="ppn" checked>
              <label class="form-check-label" for="ppn">
                Termasuk PPN
              </label>
          </div>
          <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Berat</label>
              <input type="number" class="form-control border border-secondary border-opacity-50" id="exampleFormControlInput1" name="berat" value="{{ old('berat',$barang->berat) }}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Keterangan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="keterangan" value="{{ old('keterangan',$barang->keterangan) }}">
          </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">
                <span>Submit</span>
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
              </button>
            </div>
      </form>
    </div>

    <script type="text/javascript">
      const hargabeliInput = document.getElementById('hargabeli');
      const untungInput = document.getElementById('untung');
      const hargajualInput = document.getElementById('hargajual');
    const ppnSelect = document.getElementById('ppn');
    
      hargabeliInput.addEventListener('input', hitungHargaJual);
      untungInput.addEventListener('input', hitungHargaJual);
      ppnSelect.addEventListener('input', hitungHargaJual);
    
      function hitungHargaJual() {
        const hargabeli = parseFloat(hargabeliInput.value);
        const untung = parseFloat(untungInput.value);
    
        const hargaaa = hargabeli + untung;
        const hargappn =  ppnSelect.checked ? hargabeli * 0.11 : 0;
        const hargaa = hargaaa + hargappn;
        const hargaJual = Math.ceil(hargaa / 100) * 100;
        hargajualInput.value = hargaJual;
      }
    </script>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
@endsection
