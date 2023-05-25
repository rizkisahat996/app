
@extends('layout.main')
@section('content')
        <div class="mb-4">
          <div style="background-color: #273248; border-radius: 5px; box-shadow: 1em; color: white; font-size: 1.1rem" class="px-4 py-3 col-4 col-sm-4">
              <i class="ti ti-layout-dashboard"></i>
              <span>Dashboard</span>
          </div>
        </div>
    <div class="col-lg-4 text-white rounded">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm" style="background-color: #ffff !important" id="card">
            <img src="/assets/images/profile-pic.png" class="img-fluid" alt="...">
            <div class="card-body">
                @if ($harini->isEmpty())
                    <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">Belum Tersedia</p>
                    <a href="/harinih" class="text-center" style="text-decoration: none;">
                        <p>ITEM TERLARIS HARI INI</p>
                    </a>
                @else
                    @foreach ($harini as $item)
                        <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">
                            {{ $item->nama }}
                        </p>
                        <a href="/harinih" class="text-center" style="text-decoration: none;">
                            <p>ITEM TERLARIS HARI INI</p>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="text-white rounded">
            <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm" style="background-color: #ffff !important" id="card">
              <div class="card-body">
                <p class="card-title text-dark text-center fw-bold" id="tes">Transaksi Hari Ini</p>
                <a  class="text-center text-muted" style="text-decoration: none;">
                    <p>{{$transaksihari}}</p>
                </a>
              </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4  text-white rounded ">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm"
            style="background-color: #ffff !important" id="card">
            <img src="/assets/images/profile-pic.png" class="img-fluid" alt="...">
            <div class="card-body">
                @if ($bulan->isEmpty())
                    <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">Belum Tersedia</p>
                    <a href="/bulannih" class="text-center" style="text-decoration: none;">
                        <p>ITEM TERLARIS BULAN INI</p>
                    </a>
                @else
                    @foreach ($bulan as $item)
                        <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">
                            {{ $item->nama }}
                        </p>
                        <a href="/bulannih" class="text-center" style="text-decoration: none;">
                            <p>ITEM TERLARIS BULAN INI</p>
                        </a>
                    @endforeach
                @endif
            </div>
          </div>
          <div class="text-white rounded">
              <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm" style="background-color: #ffff !important" id="card">
                  <div class="card-body">
                      <p class="card-title text-dark text-center fw-bold" id="tes">Transaksi Bulan Ini</p>
                      <a href="" class="text-center text-muted" style="text-decoration: none;">
                          <p>{{$transaksibulan}}</p>
                      </a>
                  </div>
              </div>
          </div>
    </div>

    <div class="col-lg-4 text-white rounded ">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm" style="background-color: #ffff !important" id="card">
            <img src="/assets/images/profile-pic.png" class="img-fluid" alt="...">
            <div class="card-body">
                @if ($tahun->isEmpty())
                    <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">Belum Tersedia</p>
                    <a href="/tahunnih" class="text-center" style="text-decoration: none;">
                        <p>ITEM TERLARIS TAHUN INI</p>
                    </a>
                @else
                    @foreach ($tahun as $item)
                        <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">
                            {{ $item->nama }}
                        </p>
                        <a href="/tahunnih" class="text-center" style="text-decoration: none;">
                            <p>ITEM TERLARIS TAHUN INI</p>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="text-white rounded">
            <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm"
                style="background-color: #ffff !important" id="card">


                <div class="card-body">
                    <p class="card-title text-dark text-center fw-bold" id="tes">Transaksi Tahun Ini</p>
                    <a href="" class="text-center text-muted" style="text-decoration: none;">
                        <p>{{$transaksitahun}}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>







@endsection
