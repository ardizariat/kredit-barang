@extends('layouts.admin.master')
@section('title')
    {{ $title }}
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
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary m-0 font-weight-bold " data-toggle="tooltip" data-placement="top" title="Tambah User"><i class="fas fa-plus"></i> Tambah</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table text-gray-800 table-hover table-bordered" id="data-user" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ print_r($user->getRoleNames()[0],1) }}</td>
                      </tr>
                  @endforeach
                </tbody>
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
  <!-- Page level custom scripts -->
  <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('#data-user').DataTable();
    });
  </script>

  {{-- <script>
    $(document).ready(function(){
      $('#data-user').DataTable({
        responsive : true,
        processing : true,
        serverSide : true,
        ajax       : "{{ route('admin.user.datatable') }}",
        columns    : [
          {data : 'DT_RowIndex', name : 'id'},
          {data : 'name', name : 'name'},
          {data : 'username', name : 'username'},
          {data : 'email', name : 'email'},
          {data : 'aksi', name : 'status'},
          {data : 'role', name : 'role'},
        ]
      });
    });
  </script> --}}

  <script>
    $(document).ready(function(){
      $('body').on('click','.btn-status', function(event){
        event.preventDefault();
        var me = $(this),
        url = me.attr('href'),
        user = me.data('user');
        swal({
          title: "Apakah kamu yakin",
          text: "Mengubah status "+user+" ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
            window.location.href=url;
          }
          });
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

          swal({
          title: "Apakah kamu?",
          text: "Menghapus pelanggan "+nama+" ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url : url,
              type : "POST",
              data : {
                '_method' : 'DELETE',
                '_token' : csrf_token
              }
            });
            $('#data-pelanggan').DataTable().ajax.reload();
            swal({
            title: "Berhasil",
            text: "Data berhasil dihapus",
            icon: "success",
            button: "OK",
            });
          }
          });

      });
    });
  </script>

 
@endpush