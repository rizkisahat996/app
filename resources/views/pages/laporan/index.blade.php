
@extends('layout.main')
@section('content')
<style>
    a{
        text-decoration: none;
        color: white;
        text-align: center;
    }
</style>
    <div class="d-flex gap-5">

        @component('components.modal')
            @slot('target')
                laporan
            @endslot
            @slot('icon')
                <div class="text-white  btn-success btn-md btn-primary fs-6 p-2">
                    Ekspor Laporan Transaksi
                </div>
            @endslot
            @slot('isi')
                <form action="/laporan" method="POST">
                    @method('post')
                    @csrf
                    <div class="mb-3">Export Laporan Transaksi</div>
                    <div class="d-flex gap-3">
                        <div class='input-group date' id='myDatepicker2'>
                            <input type="date" name="tgl_awal" id="tgl_beli" class="form-control">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <div class="align-text-center text-center mt-1">Hingga</div>
                        <div class='input-group date' id='myDatepicker2'>
                            <input type="date" name="tgl_akhir" id="tgl_beli" class="form-control">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-check-lg"></i>
                        </button>
                    </div>
                </form>
            @endslot
        @endcomponent
        
        <div class="text-white  btn-danger btn-md btn-primary fs-6 p-2">
            <a href="eksport" class="mt-1">Ekspor Barang PDF</a>
        </div>
        
    </div>
@endsection
