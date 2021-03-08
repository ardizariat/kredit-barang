@extends('layouts.admin.master')
@section('title')
    {{ $nama_pelanggan }}
@endsection

@push('css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/vendor/date-time-pickers/css/flatpicker-airbnb.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('admin-content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-users"></i> {{ $nama_pelanggan }}</h1>
      <h1 class="h3 mb-2 text-gray-800">{{ $transaksi_id }}</h1>
    </div>
    <div class="col-md-6">
      <nav aria-label="breadcrumb">
        <ol class="bg-gray-200 breadcrumb float-right">
          @role('super-admin|admin')
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          @endrole
          <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.kredit') }}">Transaksi Kredit</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $nama_pelanggan }}</li>
        </ol>
      </nav>
     </div>
   </div>

  <div class="row animate__animated animate__backInLeft">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      @role('super-admin|admin')
     <a class="text-decoration-none" href="{{ route('admin.barang.show',$slug_barang) }}">
     @endrole
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
     </a>
    </div>
  
    <!-- Earnings (Monthly) Card Example -->
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
  
    <!-- Earnings (Monthly) Card Example -->
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
  
    <!-- Pending Requests Card Example -->
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
{{-- End Show  --}}

{{-- Export data --}}
<div class="row my-3 mx-1">
  <a target="_blank" href="{{ route('admin.transaksi.kredit.pelanggan.export', $transaksi_id) }}" data-toggle="tooltip" data-placement="top" title="PDF" class="btn btn-danger btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-file-pdf"></i>
    </span>
    <span class="text">Ekspor Data</span>
  </a>
</div>

{{-- Table --}}
<div class="card shadow mb-4 animate__animated animate__jackInTheBox animate__delay-1s">
  @role('super-admin|admin')
    @if ($status == "Belum Lunas")
      <div class="card-header py-3">
        <button type="button" data-toggle="modal" data-target="#bayar-cicilan" class="float-left btn btn-primary m-0 font-weight-bold" data-toggle="tooltip" data-placement="top" title="Bayar Cicilan {{ $nama_pelanggan }}"><i class="fas fa-plus"></i> Bayar
        </button>
      </div>
    @endif
  @endrole
  <div class="card-body">
    <div class="table-responsive">
      <table class="table text-gray-800 table-hover table-bordered" id="pelanggan-kredit" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Pembayaran</th>
            <th>Bayar</th>
            <th>Sisa</th>
            <th>Detail</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pembayaran_kredit as $pelanggan)
              <tr>          
                <td>{{ $loop->iteration }}</td>
                <td>{{ tanggal($pelanggan->tanggal_bayar) }}</td>
                <td>{{ rupiah($pelanggan->bayar) }}</td>
                <td>{{ rupiah($pelanggan->sisa) }}</td>
                <td>
                  <a data-toggle="tooltip" data-placement="top" title="Detail pembayaran" href="" class="btn-sm btn-detail btn-info text-decoration-none text-white"
                  data-transaksi_id="{{ $transaksi_id }}"
                  data-id="{{ $pelanggan->id }}"
                  data-pelanggan="{{ $nama_pelanggan }}"
                  data-admin="{{ $pelanggan->user->name }}"
                  data-barang="{{ $nama_barang }}"
                  data-harga="{{ $harga_barang }}"
                  data-tanggal="{{ tanggal($pelanggan->tanggal_bayar) }}"
                  data-no_pembayaran="{{ $pelanggan->no_pembayaran }}"
                  data-bayar="{{ rupiah($pelanggan->bayar) }}"
                  data-sisa="{{ rupiah($pelanggan->sisa) }}"
                  >
                    <i class="fas fa-info"></i> Detail
                  </a>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

{{-- Modal Bayar Cicilan --}}
<div class="modal fade" id="bayar-cicilan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="exampleModalLabel">Pembayaran Cicilan {{ $nama_pelanggan }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.bayar.kredit') }}" method="post">
        @csrf

        <input type="hidden" name="transaksi_id" value="{{ $transaksi_id }}">

        <div class="form-group">
          <label>Kode Transaksi</label>
          <input type="text" readonly value="{{ $no_pembayaran }}" name="no_pembayaran" class="form-control">
        </div>

          <div class="form-group">
           <p>Bayar</p>
             <label class="sr-only" for="harga_beli">Bayar</label>
             <div class="input-group mb-2">
               <div class="input-group-prepend">
                 <div class="input-group-text">Rp</div>
               </div>
               <input type="text" autocomplete="off" name="bayar" value="{{ old('bayar') }}" class="bayar form-control @error('bayar') is-invalid @enderror">
               @error('bayar')
                 <div class="invalid-feedback">
                   {{ $message }}
                 </div>
             @enderror
             </div>
           </div>

           <div class="form-group">
            <p>Sisa</p>
              <label class="sr-only" for="harga_beli">Sisa</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" readonly autocomplete="off" id="rp" sisa="{{ $sisa }}" class="rupiah sisa form-control">
                @error('sisa')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
            </div>

           <div class="form-group">
             <p>Tanggal Pembayaran</p>
             <label class="sr-only" for="max-date2">Tanggal Pembayaran</label>
             <div class="input-group mb-2">
               <div class="input-group-prepend">
                 <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
               </div>
               <input type="date" autocomplete="off" name="tanggal_bayar" value="{{ date('Y-m-d') }}" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="max-date2" >
               @error('tanggal_bayar')
               <div class="invalid-feedback">
                 {{ $message }}
               </div>
           @enderror
             </div>
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

{{-- Modal Detail --}}
<div class="modal fade" id="btn-detail-transaksi-kredit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="exampleModalLabel"><i class="fas fa-info"></i> Detail Pembayaran</h5>
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
                    <td align="right" class="transaksi_id"></td>
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
                    <td>Admin</td>
                    <td>:</td>
                    <td align="right" class="admin"></td>
                  </tr>
                  <tr>
                    <td>Tanggal Bayar</td>
                    <td>:</td>
                    <td align="right" class="tanggal"></td>
                  </tr> 
                  <tr>
                    <td>Bayar</td>
                    <td>:</td>
                    <td align="right" class="bayar"></td>
                  </tr> 
                  <tr>
                    <td>Sisa</td>
                    <td>:</td>
                    <td align="right" class="sisa"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn text-decoration-none btn-primary btn-print" target="_blank" href=""><i class="fas fa-print"></i> Print</a>
      </div>
    </div>
  </div>
</div>
@stop 

@push('js')
          <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
  
  <script src="{{ asset('admin/vendor/date-time-pickers/js/flatpickr.js') }}"></script>
  <script src="{{ asset('admin/vendor/date-time-pickers/js/date-time-picker-script.js') }}"></script>

  <script src="{{ asset('admin/vendor/jquery-mask/jquery.mask.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $('#pelanggan-kredit').DataTable();
    });
  </script>
  <script>
    $(document).ready(function(){
      $('.rupiah').mask('0.000.000',{reverse:true});

        $(".bayar").keyup(function(){ 
        var bayar = parseInt($(".bayar").val());
        var sisa = parseInt($(".sisa").attr('sisa'));
        var total = sisa - bayar;
      
        $(".sisa").val(total); 
      });
        
    });   
  </script>
  <script type="text/javascript">
    var rupiah = document.getElementById('rp');
    rupiah.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split   		= number_string.split(','),
      sisa     		= split[0].length % 3,
      rupiah     		= split[0].substr(0, sisa),
      ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
  <script>
    $(document).ready(function(){
      $('table').on('click','.btn-detail', function(event){
        event.preventDefault();
        var me = $(this),
        id = me.data('id'),
        transaksi_id = me.data('transaksi_id'),
        pelanggan = me.data('pelanggan'),
        barang = me.data('barang'),
        harga = me.data('harga'),
        admin = me.data('admin'),
        tanggal = me.data('tanggal'),
        no_pembayaran = me.data('no_pembayaran'),
        bayar = me.data('bayar'),
        sisa = me.data('sisa');
        $('#btn-detail-transaksi-kredit').modal('show');
        $('.transaksi_id').text(transaksi_id);
        $('.id').text(id);
        $('.pelanggan').text(pelanggan);
        $('.barang').text(barang);
        $('.harga').text(harga);
        $('.admin').text(admin);
        $('.tanggal').text(tanggal);
        $('.no_pembayaran').text(no_pembayaran);
        $('.bayar').text(bayar);
        $('.sisa').text(sisa);
        $('.btn-print').attr("href", "/admin/transaksi-kredit/nota/"+id+"");
      });
    });
  </script>
@endpush