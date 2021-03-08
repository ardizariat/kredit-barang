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
               <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
               <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('admin.transaksi.kredit') }}">Transaksi Kredit</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
             </ol>
           </nav>
          </div>
         </div>
         
        <!-- DataTales Example -->
        <div class="card border-left-primary animate__animated animate__fadeIn shadow mb-4">
          <div class="card-header py-3 bg-gray-200">
            <div class="row justify-content-center animate__animated animate__bounceInDown animate__delay-1s">
              <h3 class="text-gray-900">{{ $title }}</h3>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.transaksi.kredit.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="pelanggan"><b>Pelanggan</b></label>                
                <select autocomplete="off" name="pelanggan" class="pelanggan-id select2 form-control @error('pelanggan') is-invalid @enderror">
                  <option selected disabled>Pilih Pelanggan</option>
                  @foreach ($data_pelanggan as $pelanggan)
                  <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>   
                  @endforeach
                </select>
                @error('pelanggan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group change-pelanggan d-none">
                <label>No Identitas (NIK)</label>
                <input type="text" disabled class="nik form-control">
              </div>
              <div class="form-row change-pelanggan d-none">
                <div class="form-group col-md-6">
                  <label>No HP</label>
                  <input type="text" disabled class="no-hp form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>Jenis Kelamin</label>
                  <input type="text" disabled class="jk form-control">
                </div>
              </div>
                <div class="form-group change-pelanggan d-none">
                  <label>Alamat</label>
                  <textarea type="text" disabled class="alamat form-control"></textarea>
                </div>

              <div class="form-group">
                <label for="barang"><b>Barang Yang Dibeli</b></label>                
                <select name="barang" class="select2 barang-id form-control @error('barang') is-invalid @enderror" id="barang">
                  <option selected disabled>Pilih Barang</option>
                  @foreach ($data_barang as $barang)
                  <option value="{{ $barang->id }}">{{ $barang->nama }}</option>   
                  @endforeach
                </select>
                @error('barang')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div> 

              <img src="" class="gambar change-barang d-none justify-content-center img-fluid" style="width:100px; height:100px;">

              <div class="form-row change-barang d-none">
                <div class="form-group col-md-6">
                  <p><b>Harga Barang</b></p>
                    <label class="sr-only"></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="text" disabled class="form-control harga">
                    </div>
                  </div>
                <div class="form-group col-md-6 mt-2">
                  <label>Merk</label>
                  <input type="text" disabled class="merk form-control">
                </div>
              </div>
              <div class="form-row change-barang d-none">
                <div class="form-group col-md-6">
                  <label>Memori</label>
                  <input type="text" disabled class="memori form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>RAM</label>
                  <input type="text" disabled class="ram form-control">
                </div>
              </div>

              <div class="form-group d-none transaksi">
                <label>No Pembayaran</label>
                <input type="text" readonly name="no_pembayaran" value="{{ $no_pembayaran }}" class="no_pembayaran form-control">
              </div>

              <div class="form-row transaksi mt-4 d-none">
              <div class="form-group col-md-6">
                <p><b>Pembayaran Awal</b></p>
                  <label class="sr-only" for="harga_beli">Pembayaran Awal</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" autocomplete="off" name="bayar" value="{{ old('bayar') }}" class="form-control @error('bayar') is-invalid @enderror" id="bayar" >
                    @error('bayar')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <p><b>Tanggal</b></p>
                  <label class="sr-only" for="max-date2">Tanggal Pembelian</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                    </div>
                    <input type="text" autocomplete="off" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control @error('tanggal') is-invalid @enderror" id="max-date2" >
                    @error('tanggal')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
                  </div>
                </div>
              </div>
              
              <div class="form-group transaksi d-none">
                <label for="keterangan"><b>Keterangan</b></label>
                <textarea name="keterangan" autocomplete="off" id="keterangan" class="@error('keterangan') is-invalid @enderror form-control" cols="5" rows="5">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="row transaksi justify-content-center d-none">
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
<script src="{{ asset('admin/vendor/ckeditor/ckeditor.js')}}"></script>


<script>
  $(document).ready(function(){
    $('.select2').select2();
    CKEDITOR.replace( 'keterangan' ); 
  });
</script>

<script>
  $(document).ready(function(){
    $('form').on('change', '.pelanggan-id', function(){
      var me = $(this),
      id = me.val();
      $.ajax({
        type      : "GET",
        url       : "{!! route('admin.transaksi.kredit.create.pelanggan') !!}",
        data      : {'id':id},
        dataType  : "json",
        success   : function(data){
                    $('.pelanggan-id').val(data.id);
                    $('.no-hp').val(data.no_hp);
                    $('.alamat').val(data.alamat);
                    $('.jk').val(data.jk);
                    $('.nik').val(data.nik);
                    
        }
      });
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('.pelanggan-id').change(function(){
      $('.change-pelanggan').removeClass('d-none');
      $('.change-pelanggan').addClass('animate__animated animate__zoomInRight');  
    });
  });  
</script>

<script>
  $(document).ready(function(){
    $('form').on('change', '.barang-id', function(){
      var me = $(this),
      id = me.val();
      $.ajax({
        type      : "GET",
        url       : "{!! route('admin.transaksi.kredit.create.barang') !!}",
        data      : {'id':id},
        dataType  : "json",
        success   : function(data){
                    console.log(data.gambar)
                    $('.barang-id').val(data.id);
                    $('.harga').val(data.harga);
                    $('.ram').val(data.ram);
                    $('.memori').val(data.memori);
                    $('.merk').val(data.merk);
                    $('.gambar').attr('src',data.gambar);
        }
      });
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('.barang-id').change(function(){
      $('.change-barang').removeClass('d-none');
      $('.transaksi').removeClass('d-none');
      $('.change-barang').addClass('animate__animated animate__zoomInRight');  
      $('.transaksi').addClass('animate__animated animate__zoomInRight');  
    });
  });  
</script>
@endpush