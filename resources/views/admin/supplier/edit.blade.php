@extends('layouts.admin.master')
@section('title')
    Edit Data {{ $barang->nama }}
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
        <div class="card border-left-success shadow mb-4">
          <div class="card-header py-3 bg-gray-200">
            <div class="row justify-content-center">
              <h3 class="text-gray-900">{{ $title }}</h3>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.barang.update',$barang->id) }}" enctype="multipart/form-data" method="POST">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" autocomplete="off" name="nama" value="{{ $barang->nama ? $barang->nama : old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama">
                @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>   
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="kategori">Kategori</label>                
                  <select autocomplete="off" name="kategori" value="{{ old('kategori') }}" class="kategori form-control @error('kategori') is-invalid @enderror" id="kategori">
                    <option disabled>Pilih Kategori</option>
                    @foreach ($data_kategori as $kategori)
                    <option {{ $barang->kategori == $kategori->id ? 'selected' : old('nama') }} value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>   
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
                  <input type="text" autocomplete="off" name="merk" value="{{ $barang->merk ? $barang->merk : old('merk') }}" class="form-control @error('merk') is-invalid @enderror" id="merk">
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
                    <option disabled>Pilih Kapasitas RAM</option>
                    <option {{ $barang->ram == 2 ? 'selected' : old('ram') }} value="2">2 GB</option>
                    <option {{ $barang->ram == 3 ? 'selected' : old('ram') }} value="3">3 GB</option>
                    <option {{ $barang->ram == 4 ? 'selected' : old('ram') }} value="4">4 GB</option>
                    <option {{ $barang->ram == 6 ? 'selected' : old('ram') }} value="6">6 GB</option>
                    <option {{ $barang->ram == 8 ? 'selected' : old('ram') }} value="8">8 GB</option>
                    <option {{ $barang->ram == 16 ? 'selected' : old('ram') }} value="16">16 GB</option>
                  </select>
                  @error('ram')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="memori">Memori</label>                
                  <select autocomplete="off" name="memori" value="{{ old('memori') }}" class="memori form-control @error('memori') is-invalid @enderror" id="memori">
                    <option disabled>Pilih Kapasitas Memori</option>
                    <option {{ $barang->memori == 16 ? 'selected' : old('memori') }} value="16">16 GB</option>
                    <option {{ $barang->memori == 32 ? 'selected' : old('memori') }} value="32">32 GB</option>
                    <option {{ $barang->memori == 64 ? 'selected' : old('memori') }} value="64">64 GB</option>
                    <option {{ $barang->memori == 128 ? 'selected' : old('memori') }} value="128">128 GB</option>
                    <option {{ $barang->memori == 256 ? 'selected' : old('memori') }} value="256">256 GB</option>
                    <option {{ $barang->memori == 500 ? 'selected' : old('memori') }} value="500">500 GB</option>
                    <option {{ $barang->memori == 1000 ? 'selected' : old('memori') }} value="1000">1000 GB</option>
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
                  <label class="sr-only" for="harga_beli">Harga Beli</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" autocomplete="off" name="harga_beli" value="{{ $barang->harga_beli ? $barang->harga_beli : old('harga_beli') }}" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" placeholder="Harga Beli">
                    @error('harga_beli')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label class="sr-only" for="max-date">Tanggal Pembelian</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                    </div>
                    <input type="text" autocomplete="off" name="tanggal_beli" value="{{ $barang->tanggal_beli ? $barang->tanggal_beli : old('tanggal_beli') }}" class="form-control @error('tanggal_beli') is-invalid @enderror" id="max-date" placeholder="Tanggal Pembelian">
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
                   <label class="sr-only" for="harga_jual_cash">Harga Jual Cash</label>
                   <div class="input-group mb-2">
                     <div class="input-group-prepend">
                       <div class="input-group-text">Rp</div>
                     </div>
                     <input type="text" autocomplete="off" name="harga_jual_cash" value="{{ $barang->harga_jual_cash ? $barang->harga_jual_cash : old('harga_jual_cash') }}" class="form-control @error('harga_jual_cash') is-invalid @enderror" id="harga_jual_cash" placeholder="Harga Jual Cash">
                     @error('harga_jual_cash')
                     <div class="invalid-feedback">
                       {{ $message }}
                     </div>
                     @enderror
                   </div>
                 </div>
                 <div class="form-group col-md-6">
                  <label class="sr-only" for="harga_jual_kredit">Harga Jual Kredit</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" autocomplete="off" name="harga_jual_kredit" value="{{ $barang->harga_jual_kredit ? $barang->harga_jual_kredit : old('harga_jual_kredit') }}" class="form-control @error('harga_jual_kredit') is-invalid @enderror"  id="harga_jual_kredit" placeholder="Harga Jual Kredit">
                    @error('harga_jual_kredit')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
               </div>
              
              <div class="form-row">                
                <div class="form-group col-md-6">
                  <label for="gambar">Gambar</label>
                  <input type="file" name="gambar" value="{{ old('gambar') }}"  class="form-control-file @error('gambar') is-invalid @enderror" id="gambar">
                  @error('gambar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>  
              
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" autocomplete="off" id="deskripsi" class="@error('deskripsi') is-invalid @enderror form-control" cols="10" rows="15">{{ $barang->deskripsi ? $barang->deskripsi : old('deskripsi') }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="row justify-content-center">
                <button data-toggle="tooltip" data-placement="top" title="Simpan" type="submit" class="btn btn-success"><i class="fas fa-download"></i> UPDATE</button>
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
    $('.kategori').select2();
    $('.ram').select2();
    $('.memori').select2();
    CKEDITOR.replace( 'deskripsi' ); 
  });
</script>
@endpush