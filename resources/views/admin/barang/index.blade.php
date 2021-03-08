@extends('layouts.admin.master')
@section('title')
    Barang
@endsection

@push('css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('admin-content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-mobile-alt"></i> {{ $title }}</h1>
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
         
         <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="font-weight-bold text-success text-uppercase mb-1">Total Barang</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($total_barang) }}</div>
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
                    <div class="font-weight-bold text-info text-uppercase mb-1">Modal</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ rupiah($modal) }}</div>
                      </div>
                      <div class="col">
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="font-weight-bold text-danger text-uppercase mb-1">Tersedia</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($tersedia) }}</div>
                      </div>
                      <div class="col">
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
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
                    <div class="font-weight-bold text-success text-uppercase mb-1">Terjual</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($terjual) }}</div>
                      </div>
                      <div class="col">
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      {{-- End Show  --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <a href="{{ route('admin.barang.create') }}" class="btn btn-primary m-0 font-weight-bold" data-toggle="tooltip" data-placement="top" title="Tambah Barang">
              <i class="fas fa-plus"></i> Tambah
            </a>
            <a target="_blank" href="{{ route('admin.barang.pdf') }}" data-toggle="tooltip" data-placement="top" title="Pdf" class="btn btn-danger ml-2 float-right btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
              </span>
              <span class="text">Ekspor</span>
            </a>
            <a target="_blank" href="{{ route('admin.barang.excel') }}" data-toggle="tooltip" data-placement="top" title="Excel" class="btn btn-success float-right btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-file-excel"></i>
              </span>
              <span class="text">Ekspor</span>
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table text-gray-800 table-hover table-bordered" id="data-barang" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual Kredit</th>
                    <th>Harga Jual Cash</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->



@endsection

@push('js')
      <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $(document).ready(function () {

        $('#data-barang').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('admin.barang.datatable') !!}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'harga_beli',
                    name: 'harga_beli'
                },
                {
                    data: 'harga_jual_kredit',
                    name: 'harga_jual_kredit'
                },
                {
                    data: 'harga_jual_cash',
                    name: 'harga_jual_cash'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                },
            ]
        });

    }); 
  </script>
  <script>
    $(document).ready(function(){
      $('body').on('click','.btn-hapus', function(event){
        event.preventDefault();
        var me = $(this),
        url = me.attr('href'),
        nama = me.attr('barang'),
        csrf_token = $('meta[name=csrf-token]').attr('content');

        Swal.fire({
          title: 'Apakah kamu yakin?',
          text: "Menghapus barang "+nama,
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
              }
            });
            window.location.reload();
            Swal.fire(
            'Berhasil',
            'Data berhasil dihapus.',
            'success'
            )
          }
          })

      });
    });
  </script>

 
@endpush