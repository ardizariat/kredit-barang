@extends('layouts.admin.master')
@section('title')
    Tambah Data Barang
@endsection

@push('css')
<link href="{{ asset('admin/vendor/select2/css/select2.min.css')}}" rel="stylesheet"/>
<link href="{{ asset('admin/vendor/date-time-pickers/css/flatpicker-airbnb.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('admin/vendor/file-input/css/fileinput.min.css')}}">
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
        <div class="card border-left-primary shadow mb-4">
          <div class="card-header py-3 bg-gray-200">
            <div class="row justify-content-center">
              <h3 class="text-gray-900">{{ $title }}</h3>
            </div>
          </div>
          <div class="card-body">
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
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="kategori">Kategori</label>                
                  <select autocomplete="off" name="kategori" class="kategori form-control @error('kategori') is-invalid @enderror" id="kategori">
                    <option selected disabled>Pilih Kategori</option>
                    @foreach ($data_kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>   
                    @endforeach
                  </select>
                  @error('kategori')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="merk">Merk</label>
                  <input type="text" autocomplete="off" name="merk" value="{{ old('merk') }}" class="form-control @error('merk') is-invalid @enderror" id="merk">
                  @error('merk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
              </div>  

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="ram">RAM</label>                
                  <select autocomplete="off" name="ram" class="ram form-control @error('ram') is-invalid @enderror" id="ram">
                    <option selected disabled>Pilih Kapasitas RAM</option>
                    <option value="2">2 GB</option>
                    <option value="3">3 GB</option>
                    <option value="4">4 GB</option>
                    <option value="6">6 GB</option>
                    <option value="8">8 GB</option>
                    <option value="16">16 GB</option>
                  </select>
                  @error('ram')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="memori">Memori</label>                
                  <select autocomplete="off" name="memori" class="memori form-control @error('memori') is-invalid @enderror" id="memori">
                    <option selected disabled>Pilih Kapasitas Memori</option>
                    <option value="16">16 GB</option>
                    <option value="32">32 GB</option>
                    <option value="64">64 GB</option>
                    <option value="128">128 GB</option>
                    <option value="256">256 GB</option>
                    <option value="500">500 GB</option>
                    <option value="1000">1000 GB</option>
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
                            
       <div class="form-group-row">
         <div class="col-md-6">
            <label for="gambar">Gambar</label>
            <input type="file"  name="gambar" value="{{ old('gambar') }}"  class="input-fa file @error('gambar') is-invalid @enderror" data-preview-file-type="text" id="gambar" data-browse-on-zone-click="true">
            @error('gambar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
       </div>
       
        <div class="form-group mt-5">
          <p>Deskripsi</p>
        <textarea name="deskripsi" value="{{ old('deskripsi') }}" id="deskripsi" cols="30" rows="10"></textarea>
        </div>

              <div class="row justify-content-center">
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
<script src="{{ asset('admin/vendor/file-input/js/fileinput.min.js')}}"></script>
<script src="{{ asset('admin/vendor/file-input/themes/fa/theme.js')}}"></script>

<script>
  CKEDITOR.replace('deskripsi',{
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
    $('.kategori').select2();
    $('.ram').select2();
    $('.memori').select2();
    $("#gambar").fileinput({'showUpload':true, 'previewFileType':'any'});
  });
</script>

@endpush