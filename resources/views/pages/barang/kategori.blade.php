@extends('layout.main')
@section('content')
    <div>
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
            <i class="ti ti-category-2"></i>
            <span>Tambah Kategori</span>
          </div>
        </div>
        <form style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px" action="/kategori" class="bg-white px-4 py-4" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Kategori</label>
                <input type="text" style="background-color: white" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" placeholder="Masukan Kode Kategori" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                <input type="text" style="background-color: white" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kategori" placeholder="Masukan Nama Kategori" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
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
