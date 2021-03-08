@extends('layouts.admin.master')
@section('title')
    Pelanggan
@endsection

@push('css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('admin-content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-users"></i> {{ $title }}</h1>
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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <a href="{{ route('admin.pelanggan.create') }}" class="btn btn-primary m-0 font-weight-bold " data-toggle="tooltip" data-placement="top" title="Tambah Pelanggan"><i class="fas fa-plus"></i> Tambah</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table text-gray-800 table-hover table-bordered" id="data-pelanggan" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>NO HP</th>
                    <th>Alamat</th>
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

        $('#data-pelanggan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('admin.pelanggan.datatable') !!}",
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
                    data: 'jk',
                    name: 'jk'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
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
      $('body').on('click','.hapus-pelanggan', function(event){
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
              }
            });
            $('#data-pelanggan').DataTable().ajax.reload();
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