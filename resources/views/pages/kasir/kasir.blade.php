@extends('layout.main')
@section('content')
    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>
    <div class="col-lg-10 mx-auto">
      <div style="background-color: #b8a266; border-radius: 5px; box-shadow: 1em; color: white" class="py-4 px-4 mb-3 mt-2 col-lg-4">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>Menu Kasir</span>
      </div>
      <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px" class="bg-white py-5 px-5">
          <div class="d-flex justify-content-start align-items-center me-5 gap-2">
              <a href="/kasir">
                  <div style="border-radius: 5px" class="btn-md btn-primary fs-6 p-2">
                    <span>Tambah Penjualan</span>
                    <i class="fa-solid fa-plus"></i>
                  </div>
              </a>
          </div>
          <form>
              <div class="d-flex gap-3 justify-content-end align-items-end pb-5">
                <div class="d-flex col-3">
                      <select class="form-select" aria-label="Default select example" name="jenispembayaran">
                          <option value="" selected>Pilih Jenis Pembayaran</option>
                          <option value="tunai">Tunai</option>
                          <option value="non-tunai">Non-Tunai</option>
                          <option value="belum-dibayar">Belum Dibayar</option>
                      </select>
                  </div>
                  <div class="">
                      <div class="d-flex gap-3">
                          <div class="col-sm-4 ">
                            <label for="">Dari</label>
                              <div class='input-group date' id='myDatepicker2'>
                                  <input type="date" name="tgl_awal" id="tgl_beli" class="form-control">
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>
                          <div class="col-sm-4 ">
                            <label for="">sampai</label>
                              <div class='input-group date' id='myDatepicker2'>
                                  <input type="date" name="tgl_akhir" id="tgl_beli" class="form-control">
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                              <button type="submit" class="btn btn-success">
                                <span>Cari</span>
                                <i class="fa-solid fa-magnifying-glass"></i>
                              </button>
                            </div>
                        </div>
                  </div>
              </div>
          </form>

          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Faktur</th>
                      <th scope="col">Nama Pembeli</th>
                      <th scope="col">Tanggal Pembeli</th>
                      <th scope="col">Total</th>
                      <th scope="col">Metode Pembayaran</th>
                      <th scope="col" class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @if ($hasil->isEmpty())
                      <tr>
                          <td colspan="5">
                              <div class="d-flex text-muted justify-content-center text-center">
                                  Transaksi Belum Ada
                              </div>
                          </td>
                      </tr>
                  @else
                      @foreach ($hasil as $item)
                          <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->nama }}</td>
                              <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                              <td>@currency($item->total)</td>
                              <td class="text-start ms-5 ps-5">{{ $item->jenispembayaran }}</td>
                              <td class="d-flex justify-content-center gap-3"> <a target="_blank"
                                      href="/preview/{{ $item->id }}">
                                      <div class="btn btn-primary btn-sm text-white mb-1">
                                          <span>Print</span>
                                          <i class="fa-solid fa-print"></i>
                                      </div>
                                  </a>
                                  <a target="" href="/kasir/edit/{{ $item->id }}">
                                      <div class="btn btn-warning btn-sm text-white mb-1">
                                        <span>Edit</span>
                                          <i class="fa-solid fa-pen-to-square"></i>
                                      </div>
                                  </a>
                                  <a target="" href="/kasir/delete/{{ $item->id }}">
                                      <div class="btn btn-danger btn-sm text-white mb-1">
                                          <span>Delete</span>
                                          <i class="fa-solid fa-trash"></i>
                                      </div>
                                  </a>
                              </td>
                          </tr>
                      @endforeach
                  @endif
              </tbody>
          </table>

      </div>
    </div>


@endsection
