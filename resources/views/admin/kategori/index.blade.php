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
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-list-ol"></i> {{ $title }}</h1>
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
            <button type="button" data-toggle="modal" data-target="#tambah-kategori"class="float-right btn btn-primary m-0 font-weight-bold " data-toggle="tooltip" data-placement="top" title="Tambah Kategori"><i class="fas fa-plus"></i> Tambah
            </button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table text-gray-800 table-hover table-bordered" id="data-kategori" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->




      
      
{{-- Modal Tambah Kategori --}}
<div class="modal fade" id="tambah-kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.kategori.store') }}" method="post">
        @csrf

          <div class="form-group">
           <p>Kategori</p>
             <div class="input-group mb-2">
               <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fas fa-list-ol"></i></div>
               </div>
               <input type="text" autocomplete="off" name="kategori" value="{{ old('kategori') }}" class="kategori form-control @error('kategori') is-invalid @enderror">
               @error('kategori')
                 <div class="invalid-feedback">
                   {{ $message }}
                 </div>
             @enderror
             </div>
           </div>

           <div class="form-group mt-4">
             <p>Status</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">ON</label>
              </div>
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
              <label class="form-check-label" for="inlineRadio2">OFF</label>
              </div>
           </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button data-toggle="tooltip" data-placement="top" title="Simpan" type="submit" class="btn btn-primary"><i class="fas fa-download"></i> SIMPAN</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
      <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $(document).ready(function () {

      $('#data-kategori').DataTable({
        processing : true,
        serverSide : true,
        ajax : "{{ route('admin.kategori.datatable') }}",
        columns : [
          {
              data: 'DT_RowIndex',
              name: 'id'
          },
          {
              data: 'kategori',
              name: 'kategori'
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
    $('table').on('click', '.btn-hapus', function(e){
        e.preventDefault();
        var me = $(this),
        url = me.attr('href'),
        nama = me.data('nama'),
        csrf_token = $('meta[name=csrf-token]').attr('content');

        Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Menghapus kategori "+nama,
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