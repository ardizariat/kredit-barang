@extends('layouts.admin.master')
@section('title')
    Tambah Transaksi
@endsection

@push('css')
<link href="{{ asset('admin/vendor/select2/css/select2.min.css')}}" rel="stylesheet"/>
<link href="{{ asset('admin/vendor/date-time-pickers/css/flatpicker-airbnb.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('admin-content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-money-bill-wave"></i> {{ $title }}</h1>
          </div>
          <div class="col-md-6">
           <nav aria-label="breadcrumb">
             <ol class="bg-gray-200 breadcrumb float-right">
               <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
               <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.kredit') }}">Transaksi Kredit</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
             </ol>
           </nav>
          </div>
         </div>
         
        <!-- DataTales Example -->
        <div class="card border-left-primary shadow mb-4">
          <div class="card-header py-3 bg-gray-200">
            <div class="row justify-content-center">
              <h1 class="text-gray-900 animate__animated animate__bounceInDown">{{ $title }}</h1>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.bayar.cicilan') }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="pelanggan">Pelanggan</label>                
                  <select autocomplete="off" name="transaksi_id" class="kategori pelanggan-kredit form-control form-control-lg @error('pelanggan') is-invalid @enderror">
                    <option selected disabled>Masukan Kode Pelanggan</option>
                    @foreach ($data_pelanggan as $pelanggan)
                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->id }}</option>   
                    @endforeach
                  </select>
                  @error('pelanggan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="form-group d-none">
                  <label>No Pembayaran</label>
                  <input type="text" name="no_pembayaran" value="{{ $no_pembayaran }}" class="form-control" readonly>
                </div>

                <div class="form-row d-none mt-4">
                  <div class="form-group col-md-6">
                    <label>Nama Pelanggan</label>
                    <input type="text" disabled class="pelanggan form-control">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Barang Yang Dibeli</label>
                    <input type="text" disabled class="barang form-control">
                  </div>
                </div>

                <div class="form-row d-none mt-4">
                  <div class="form-group col-md-6">
                    <label>Harga Barang</label>
                    <input type="text" disabled class="harga_barang form-control">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Tanggal Pembelian Awal</label>
                    <input type="text" disabled class="tanggal_beli form-control">
                  </div>
                </div>

                <div class="form-row d-none mt-4">
                  <div class="form-group col-md-6">
                    <label>Sisa</label>
                    <input type="text" disabled value="" class="sisa form-control">
                  </div>
                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <input type="text" disabled class="status form-control">
                    </div>
                </div>

                <div class="form-row d-none mt-4">
                <div class="form-group col-md-6">
                  <p>Bayar</p>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="text" autocomplete="off" name="bayar" value="{{ old('bayar') }}" class="form-control bayar @error('bayar') is-invalid @enderror">
                      @error('bayar')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <p>Tanggal</p>
                    <label class="sr-only" for="max-date2">Tanggal Pembelian</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                      </div>
                      <input type="text" autocomplete="off" name="tanggal_bayar" value="{{ date('Y-m-d') }}" class="form-control @error('tanggal') is-invalid @enderror" id="max-date2" >
                      @error('tanggal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                    </div>
                  </div>
                </div>
              
                <div class="form-group d-none">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" autocomplete="off" id="keterangan" class="@error('keterangan') is-invalid @enderror form-control" cols="5" rows="5">{{ old('keterangan') }}</textarea>
                  @error('keterangan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="row justify-content-center btn-simpan d-none">
                  <button data-toggle="tooltip" data-placement="top" title="Simpan" type="submit" class="btn btn-primary"><i class="fas fa-download"></i> SIMPAN</button>
                </div>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection

@push('js') 
<script src="{{ asset('admin/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('admin/vendor/date-time-pickers/js/flatpickr.js') }}"></script>
<script src="{{ asset('admin/vendor/date-time-pickers/js/date-time-picker-script.js') }}"></script>


<script>
  $(document).ready(function(){
    $('.kategori').select2();
  });
</script>

<script>
  $(document).ready(function(){
    $('.pelanggan-kredit').change(function(){
      $('.form-row').removeClass('d-none');
      $('.form-group').removeClass('d-none');
      $('.btn-simpan').removeClass('d-none');
      $('.form-row').addClass('animate__animated animate__zoomInRight');
      $('.form-group').addClass('animate__animated animate__slideInRight');   
    });
  });  
</script>

<script>
  $(document).ready(function(){
    $('form').on('change','.pelanggan-kredit', function(){
      var me = $(this),
      id = me.val();
      $.ajax({
        type      : "GET",
        url       : "{!! route('admin.pelanggan.get') !!}",
        data      : {'id':id},
        dataType  : "json",
        success   : function(data){
                    $('.pelanggan-kredit').val(data.id);
                    $('.sisa').val(data.sisa);
                    $('.pelanggan').val(data.pelanggan);
                    $('.barang').val(data.barang);
                    $('.status').val(data.status);
                    $('.tanggal_beli').val(data.tanggal_beli);
                    $('.harga_barang').val(data.harga_barang);
        },
        error      : function(msg){
                    console.log(msg);
        }
      });
    });
  });
</script>

@endpush