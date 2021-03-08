@extends('layouts.admin.master')
@section('title')
{{ $title }}
@endsection

@push('css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/vendor/select2/css/select2.min.css')}}" rel="stylesheet"/>
@endpush

@section('admin-content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-truck"></i> {{ $title }}</h1>
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
            <button type="button" data-toggle="modal" data-target="#tambah-supplier"class="float-left btn btn-primary m-0 font-weight-bold " data-toggle="tooltip" data-placement="top" title="Tambah Supplier"><i class="fas fa-plus"></i> Tambah Supplier
            </button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table text-gray-800 table-hover table-bordered" id="data-supplier" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Toko</th>
                    <th>Aplikasi</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->




      {{-- Modal Tambah Supplier --}}
      <div class="modal fade" id="tambah-supplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-capitalize" id="exampleModalLabel">Tambah Supplier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.supplier.store') }}" method="post">
              @csrf

              <div class="form-group">
                <label>Nama Toko</label>
                <input type="text" autocomplete="off" name="nama" value="{{ old('nama') }}" class="form-control">
              </div>
            
              <div class="form-group">
                <p>Aplikasi</p>
                <select autocomplete="off" name="aplikasi" class="form-control @error('aplikasi') is-invalid @enderror">
                  <option selected disabled>Pilih Beli Darimana</option>
                  <option value="Bukalapak">Bukalapak</option>
                  <option value="Tokopedia">Tokopedia</option>
                  <option value="Shopee">Shopee</option>
                  <option value="Lazada">Lazada</option>
                  <option value="Offline">Offline</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                @error('aplikasi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label>No HP</label>
                <input type="text" autocomplete="off" name="no_hp" value="{{ old('no_hp') }}" class="form-control">
              </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" autocomplete="off" cols="3" rows="3" class="form-control"></textarea>
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

      <div class="modal fade" id="btn-show-supplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-capitalize" id="exampleModalLabel">Detail Supplier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">             
              <div class="row">
                <div class="col-md-12">
                  <h3 class="text-center text-uppercase mb-3 judul"></h3>
                  <div class="table-resposive">
                    <table class="table table-hover text-gray-900">
                      <tbody>
                        <tr>
                          <td>Nama Toko</td>
                          <td>:</td>
                          <td align="right" class="nama"></td>
                        </tr>
                        <tr>
                          <td>No HP</td>
                          <td>:</td>
                          <td align="right" class="no-hp"></td>
                        </tr>
                        <tr>
                          <td>Aplikasi</td>
                          <td>:</td>
                          <td align="right" class="aplikasi"></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>:</td>
                          <td align="right" class="alamat"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>


@endsection

@push('js')
      <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('admin/vendor/select2/js/select2.min.js')}}"></script>

  <script>
    $(document).ready(function(){
      $('.kategori').select2();
    });
  </script>
  <script>
    $(document).ready(function () {

        $('#data-supplier').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('admin.supplier.datatable') !!}",
            columns: [{
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'aplikasi',
                    name: 'aplikasi'
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
        nama = me.attr('nama'),
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
            $('#data-supplier').DataTable().ajax.reload();
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

  <script>
    $(document).ready(function(){
      $('table').on('click','.btn-show', function(event){
        event.preventDefault();
        var me = $(this),
        id = me.data('id'),
        nama = me.data('nama'),
        no_hp = me.data('no_hp'),
        aplikasi = me.data('aplikasi'),
        alamat = me.data('alamat');
        $('#btn-show-supplier').modal('show');
        $('.nama').text(nama);
        $('.no-hp').text(no_hp);
        $('.alamat').text(alamat);
        $('.aplikasi').text(aplikasi);
      });
    });
  </script>

 
@endpush