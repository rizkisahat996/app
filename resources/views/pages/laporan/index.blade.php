
@extends('layout.main')
@section('content')
<style>
    a{
        text-decoration: none;
        color: white;
        text-align: center;
    }
</style>
<div class="col-lg-4 text-white rounded">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm" style="background-color: #ffff !important" id="card">
            <img src="/assets/images/profile-pic.png" class="img-fluid" alt="...">
            <div class="card-body">
            </div>
        </div>
        <div class="text-white rounded">
            <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm" style="background-color: #ffff !important" id="card">
              <div class="card-body">
                <p class="card-title text-dark text-center fw-bold" id="tes">Transaksi Hari Ini</p>
                <a  class="text-center text-muted" style="text-decoration: none;">
                    <p></p>
                </a>
              </div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-5">

        @component('components.modal')
            @slot('target')
                laporan
            @endslot
            @slot('icon')
                <button type="button" class="btn btn-primary m-1 fs-3">Ekspor Laporan Transaksi</button>
            @endslot
            @slot('isi')
                <form action="/laporan" method="POST">
                    @method('post')
                    @csrf
                    <h3 class="py-4" style="text-align: center">Export Laporan Transaksi</h3>
                    <div class="d-flex gap-3">
                        <div class='input-group date' id='myDatepicker2'>
                          <div>
                            <label class="form-label block">Dari</label>
                            <input type="date" name="tgl_awal" id="tgl_beli" class="form-control">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                        <div class='input-group date' id='myDatepicker2'>
                          <div>
                            <label for="" class="form-label">Sampai</label>
                            <input type="date" name="tgl_akhir" id="tgl_beli" class="form-control">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-send"></i>
                            <span>Submit</span>
                        </button>
                    </div>
                </form>
            @endslot
        @endcomponent

        {{-- <div class="text-white btn-danger btn-md btn-primary fs-3 p-2">
            <a href="eksport" class="btn btn-secondary">Ekspor Barang PDF</a>
        </div> --}}

    </div>
@endsection
