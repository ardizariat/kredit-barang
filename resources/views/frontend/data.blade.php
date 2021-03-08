@extends('layouts.admin.master')
@section('title')
    Data Pelanggan Kredit
@endsection

@push('css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/vendor/date-time-pickers/css/flatpicker-airbnb.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('admin-content')
<div class="container-fluid">

  <a href="{{ route('pelanggan') }}" data-toggle="tooltip" data-placement="top" title="Kembali" class="btn btn-primary btn-icon-split mt-3">
    <span class="icon text-white-50">
      <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
  </a>
  
  <div class="my-2">
    <h1><i class="fas fa-user"></i> {{ $nama_pelanggan }}</h1>
    <h1>{{ $kode_pelanggan }}</h1>
  </div>

  <div class="row animate__animated animate__backInLeft mt-5">

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ Str::limit($nama_barang,20,'.') }}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rupiah($harga_barang) }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Yang sudah dibayarkan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rupiah($total_bayar) }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sisa</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ rupiah($sisa) }}</div>
                </div>
                <div class="col">
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Status</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $status }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row my-3 mx-1">
    <a target="_blank" href="{{ route('cetak.riwayat.kredit', $kode_pelanggan) }}" data-toggle="tooltip" data-placement="top" title="PDF" class="btn btn-danger btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-file-pdf"></i>
      </span>
      <span class="text">Unduh Riwayat Transaksi</span>
    </a>
  </div>

  <div class="card shadow mb-4 animate__animated animate__jackInTheBox animate__delay-1s">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table text-gray-800 table-hover table-bordered" id="pelanggan-kredit" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Pembayaran</th>
              <th>Bayar</th>
              <th>Sisa</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($daftar_kredit as $kredit)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ tanggal($kredit->tanggal_bayar) }}</td>
                <td>{{ rupiah($kredit->bayar) }}</td>
                <td>{{ rupiah($kredit->sisa) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@stop 

@push('js')
  <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endpush