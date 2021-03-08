@extends('layouts.admin.master')
@section('title')
    {{ $title }}
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Transaksi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($total_transaksi) }}</div>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pemasukan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rupiah($total_pemasukan) }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        @endrole
         {{-- End Show  --}}

        <!-- DataTables Example -->
        @role('super-admin|admin')
        <div class="row animate__animated animate__backInLeft my-3 mx-1">
          <a target="_blank" href="{{ route('admin.transaksi.tunai.pelanggan.export') }}" data-toggle="tooltip" data-placement="top" title="Ekspor Data" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-file-pdf"></i>
            </span>
            <span class="text">Ekspor Data</span>
          </a>
        </div>
        <div class="card shadow mb-4 animate__animated animate__jackInTheBox animate__delay-2s">
          <div class="card-header py-3">
            <a href="{{ route('admin.transaksi.tunai.create') }}" class="btn btn-primary m-0 font-weight-bold " data-toggle="tooltip" data-placement="top" title="Tambah Tranksaksi Tunai"><i class="fas fa-plus"></i> Tambah</a>
          </div>
          @endrole
          <div class="card-body">
            <div class="table-responsive">
              <table class="table text-gray-800 table-hover table-bordered" id="data-transaksi-tunai" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama</th>
                    <th>Barang</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                    <th>Detail</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->


      <div class="modal fade" id="btn-show-tunai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-capitalize" id="exampleModalLabel">Detail Transaksi Tunai</h5>
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
                          <td>ID Pelanggan</td>
                          <td>:</td>
                          <td align="right" class="id"></td>
                        </tr>
                        <tr>
                          <td>No Pembayaran</td>
                          <td>:</td>
                          <td align="right" class="no_pembayaran"></td>
                        </tr>
                        <tr>
                          <td>Nama Pelanggan</td>
                          <td>:</td>
                          <td align="right" class="pelanggan"></td>
                        </tr>
                        <tr>
                          <td>Nama Barang</td>
                          <td>:</td>
                          <td align="right" class="barang"></td>
                        </tr>
                        <tr>
                          <td>Harga Barang</td>
                          <td>:</td>
                          <td align="right" class="harga"></td>
                        </tr>
                        <tr>
                          <td>Tanggal Transaksi</td>
                          <td>:</td>
                          <td align="right" class="tanggal"></td>
                        </tr>
                        <tr>
                          <td>Qty</td>
                          <td>:</td>
                          <td align="right" class="qty"></td>
                        </tr>
                        <tr>
                          <td>Bayar</td>
                          <td>:</td>
                          <td align="right" class="bayar"></td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td>:</td>
                          <td align="right" class="status"></td>
                        </tr>
                        <tr>
                          <td>Keterangan</td>
                          <td>:</td>
                          <td align="right" class="keterangan"></td>
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
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $('#data-transaksi-tunai').DataTable({
      processing: true,
            serverSide: true,
            ajax: "{!! route('admin.transaksi.tunai.datatable') !!}",
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

<script>
  $(document).ready(function(){
    $('table').on('click','.btn-show', function(event){
      event.preventDefault();
      var me = $(this),
      id = me.data('id'),
      admin = me.data('admin'),
      pelanggan = me.data('pelanggan'),
      barang = me.data('barang'),
      harga = me.data('harga'),
      tanggal = me.data('tanggal'),
      qty = me.data('qty'),
      total = me.data('total'),
      bayar = me.data('bayar'),
      status = me.data('status'),
      no_pembayaran = me.data('no_pembayaran'),
      keterangan = me.data('keterangan');

      $('#btn-show-tunai').modal('show');
      $('.id').text(id);
      $('.admin').text(admin);
      $('.pelanggan').text(pelanggan);
      $('.barang').text(barang);
      $('.harga').text(harga);
      $('.tanggal').text(tanggal);
      $('.qty').text(qty);
      $('.total').text(total);
      $('.bayar').text(bayar);
      $('.status').text(status);
      $('.no_pembayaran').text(no_pembayaran);
      $('.keterangan').text(keterangan);
    });
  });
</script>

@endpush