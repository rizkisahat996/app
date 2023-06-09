@extends('layout.main')
@section('content')
    <div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size:1rem" class="py-3 px-4 mb-4 mt-3 col-xxl-5 col-xl-6 col-lg-7 col-sm-8 d-flex">
      <div>
        <a href="/pengguna">
          <i class="ti ti-user"></i>
          <span>Manajemen Pengguna</span>
        </a>
      </div>
      <div>
        <i class="ti ti-chevron-right"></i>
      </div>
      <div>
        <i class="ti ti-user-plus"></i>
        <span>Tambah Pengguna</span>
      </div>
    </div>
      <form action="/pengguna" method="post" enctype="multipart/form-data" class="bg-white px-4 py-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px">
          @csrf
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Masukan nama pengguna">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Masukan email pengguna">
          </div>
          <div class="mb-3">
              <label for="inputPassword5" class="form-label">Password</label>
              <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="password" placeholder="Masukan password pengguna">
          </div>
          <div>
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" aria-label="Default select example" name="jabatan">
                <option selected>--Pilih Jabatan--</option>
                <option value="kasir">kasir</option>
              </select>
          </div>

          <div class="d-flex justify-content-end mt-3">
              <button type="submit" class="btn btn-primary">
                <i class="ti ti-send"></i>
                <span>Submit</span>
              </button>
          </div>
      </form>
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
@endpush
