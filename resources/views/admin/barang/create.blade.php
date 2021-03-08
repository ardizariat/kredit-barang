@extends('layouts.admin.master')
@section('title')
    Tambah Data Barang
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/vendor/file-input/css/fileinput.min.css')}}">
<link href="{{ asset('admin/vendor/select2/css/select2.min.css')}}" rel="stylesheet"/>
<link href="{{ asset('admin/vendor/date-time-pickers/css/flatpicker-airbnb.css')}}" rel="stylesheet" type="text/css" />

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
               <li class="breadcrumb-item"><a href="{{ route('admin.barang') }}">Barang</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
             </ol>
           </nav>
          </div>
         </div>

        <!-- DataTales Example -->
        <div class="card border-left-primary shadow mb-4 animate__animated animate__zoomIn">
          <div class="card-header py-3 bg-gradient-primary">
            <div class="row justify-content-center">
              <h3 class="text-white">{{ $title }}</h3>
            </div>
          </div>
          <div class="card-body animate__animated animate__zoomInLeft animate__delay-1s">
            <form action="{{ route('admin.barang.store') }}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" autocomplete="off" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama">
                @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div> 
              <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" autocomplete="off" name="merk" value="{{ old('merk') }}" class="form-control @error('merk') is-invalid @enderror" id="merk">
                @error('merk')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>   
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Kategori</label>                
                  <select name="kategori_id" class="kategori select2 form-control @error('kategori_id') is-invalid @enderror">
                    <option selected disabled>Pilih Kategori</option>
                    @foreach ($data_kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>   
                    @endforeach
                  </select>
                  @error('kategori_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="form-group col-md-4">
                  <label>Supplier</label>                
                  <select name="supplier_id" class="select2 form-control @error('supplier_id') is-invalid @enderror">
                    <option selected disabled>Pilih Supplier</option>
                    @foreach ($data_supplier as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>   
                    @endforeach
                  </select>
                  @error('supplier_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-2 mt-3 pt-3">
                  <button type="button" data-toggle="modal" data-target="#add-supplier"class="float-left btn btn-primary m-0 font-weight-bold " data-toggle="tooltip" data-placement="top" title="Tambah Supplier"><i class="fas fa-plus"></i> Add Supplier
                  </button>
                </div>
              </div>  

              <div class="form-row gadget d-none">
                <div class="form-group col-md-6">
                  <label>RAM</label>                
                  <select name="ram" class="form-control @error('ram') is-invalid @enderror">
                    <option selected disabled>Pilih Kapasitas RAM</option>
                    <option value="1">1 GB</option>
                    <option value="2">2 GB</option>
                    <option value="3">3 GB</option>
                    <option value="4">4 GB</option>
                    <option value="6">6 GB</option>
                    <option value="8">8 GB</option>
                    <option value="16">16 GB</option>
                    <option value="32">32 GB</option>
                  </select>
                  @error('ram')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Memori</label>                
                  <select name="memori" class="form-control @error('memori') is-invalid @enderror">
                    <option selected disabled>Pilih Kapasitas Memori</option>
                    <option value="8">8 GB</option>
                    <option value="16">16 GB</option>
                    <option value="32">32 GB</option>
                    <option value="64">64 GB</option>
                    <option value="128">128 GB</option>
                    <option value="256">256 GB</option>
                    <option value="500">500 GB</option>
                    <option value="1000">1000 GB</option>
                    <option value="2000">2000 GB</option>
                  </select>
                  @error('memori')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
              </div>  

              <div class="form-row mt-4">
               <div class="form-group col-md-6">
                 <p>Harga Beli</p>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" autocomplete="off" name="harga_beli" value="{{ old('harga_beli') }}" class="form-control @error('harga_beli') is-invalid @enderror">
                    @error('harga_beli')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <p>Tanggal Pembelian</p>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                    </div>
                    <input type="text" autocomplete="off" name="tanggal_beli" value="{{ date('Y-m-d') }}" class="max-date form-control @error('tanggal_beli') is-invalid @enderror">
                    @error('tanggal_beli')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
                  </div>
                </div>
              </div>

              <div class="form-row mt-4">
                <div class="form-group col-md-6">
                  <p>Harga Jual Cash</p>
                   <div class="input-group mb-2">
                     <div class="input-group-prepend">
                       <div class="input-group-text">Rp</div>
                     </div>
                     <input type="text" autocomplete="off" name="harga_jual_cash" value="{{ old('harga_jual_cash') }}" class="form-control @error('harga_jual_cash') is-invalid @enderror">
                     @error('harga_jual_cash')
                     <div class="invalid-feedback">
                       {{ $message }}
                     </div>
                     @enderror
                   </div>
                 </div>
                 <div class="form-group col-md-6">
                  <p>Harga Jual Kredit</p>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" autocomplete="off" name="harga_jual_kredit" value="{{ old('harga_jual_kredit') }}" class="rupiah form-control @error('harga_jual_kredit') is-invalid @enderror">
                    @error('harga_jual_kredit')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
               </div>
                            
              <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input type="file"  name="gambar" value="{{ old('gambar') }}"  class="input-fa file @error('gambar') is-invalid @enderror" data-preview-file-type="text" id="gambar" data-browse-on-zone-click="true">
                  @error('gambar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              
              <div class="form-group mt-5">
                <p>Deskripsi</p>
                <textarea name="deskripsi" value="{{ old('deskripsi') }}" id="deskripsi_barang" cols="30" rows="10"></textarea>
              </div>

              <div class="row justify-content-center">
                <button data-toggle="tooltip" data-placement="top" title="Simpan" type="submit" class="btn btn-primary"><i class="fas fa-download"></i> SIMPAN</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      


      <div class="modal fade" id="add-supplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input autocomplete="off" type="text" name="nama" value="{{ old('nama') }}" class="form-control">
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
                <input autocomplete="off" type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control">
              </div>
      
                 <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea autocomplete="off" name="alamat" cols="3" rows="3" class="form-control"></textarea>
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
<script src="{{ asset('admin/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('admin/vendor/date-time-pickers/js/flatpickr.js') }}"></script>
<script src="{{ asset('admin/vendor/date-time-pickers/js/date-time-picker-script.js') }}"></script>
<script src="{{ asset('admin/vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('admin/vendor/file-input/js/fileinput.min.js')}}"></script>
<script src="{{ asset('admin/vendor/file-input/themes/fa/theme.js')}}"></script>

<script>
  CKEDITOR.replace('deskripsi_barang',{
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  });
</script>

<script>
  $(".input-fa").fileinput({
      theme: "fa",
      uploadUrl: "/file-upload-batch/2"
  });
  </script>

<script>
  $(document).ready(function(){
    $('.select2').select2();
    $("#gambar").fileinput({'showUpload':true, 'previewFileType':'any'});
  });
</script>

<script>
  $(document).ready(function(){
    $('form').on('change','.kategori', function(){
      var me = $(this),
      gadget = me.val();
      console.log(gadget);
      if(gadget == 1|2|3){
      $('.gadget').removeClass('d-none');
      }
      if(gadget > 3){
        $('.gadget').addClass('d-none');
      }
    });
  });
</script>

@endpush