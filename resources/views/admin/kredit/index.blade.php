@extends('layouts.admin.master')
@section('title')
    Transaksi Kredit
@endsection

@push('css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
  :root {
  --animate-delay: 2s;
}

/* All delay classes will take half the time to start */
:root {
  --animate-delay: 0.5s;
}
</style>
@endpush

@section('admin-content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
        
        @role('super-admin|admin')
          <div class="row">
            <div class="col-md-6">
              <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-money-bill-wave"></i> {{ $title }}</h1>
            </div>
            <div class="col-md-6">
            <nav aria-label="breadcrumb">
              <ol class="bg-gray-200 breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
              </ol>
            </nav>
            </div>
          </div>
          
          <div class="row animate__animated animate__backInRight">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pelanggan Kredit</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($total_pelanggan_kredit) }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Yang sudah masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rupiah($total_pemasukan_kredit) }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sudah Lunas</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $lunas }}</div>
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
          
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Belum Lunas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belum_lunas }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- End Show  --}}
          
          <div class="row my-3 mx-1 animate__animated animate__backInLeft">
            <a target="_blank" href="{{ route('admin.transaksi.kredit.pdf') }}" data-toggle="tooltip" data-placement="top" title="Ekspor Data" class="btn btn-danger btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
              </span>
              <span class="text">Ekspor Data</span>
            </a>
          </div>
        @endrole
        <div class="card shadow mb-4 animate__animated animate__jackInTheBox animate__delay-2s">
        @role('super-admin|admin')
          <div class="card-header py-3">
            <a href="{{ route('admin.transaksi.kredit.create') }}" class="btn btn-primary m-0 font-weight-bold " data-toggle="tooltip" data-placement="top" title="Tambah Pelanggan Kredit"><i class="fas fa-plus"></i> Tambah</a>
          </div>          
        @endrole
          <div class="card-body">
            <div class="table-responsive">
              <table class="table text-gray-800 table-hover table-bordered" id="data-transaksi-kredit" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama</th>
                    <th>Barang</th>
                    <th>Tanggal Pembelian</th>
                    <th>Sisa</th>
                    <th>Status</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection

@push('js')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $('#data-transaksi-kredit').DataTable({
      processing: true,
            serverSide: true,
            ajax: "{!! route('admin.transaksi.kredit.datatable') !!}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'pelanggan',
                    name: 'pelanggan'
                },
                {
                    data: 'barang',
                    name: 'barang'
                },
                {
                    data: 'tanggal_transaksi',
                    name: 'tanggal_transaksi'
                },
                {
                    data: 'sisa',
                    name: 'sisa'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'detail',
                    name: 'detail'
                },
            ]
    });
  });
</script>

  {{-- Hapus Transaksi --}}
  <script>
    $(document).ready(function(){
      $('body').on('click','.btn-hapus', function(event){
        event.preventDefault();
        var me = $(this),
        url = me.attr('href'),
        nama = me.attr('pelanggan'),
        csrf_token = $('meta[name=csrf-token]').attr('content');

        Swal.fire({
          title: 'Apakah kamu yakin?',
          text: "Menghapus pelanggan "+nama+" ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!'
          }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url : url,
              type : "POST",
              data : {
                '_method' : 'DELETE',
                '_token' : csrf_token
              },
              success : function(){
                window.location.reload();
              } 
            });
            
          }
          })

      });
    });
  </script>

@endpush