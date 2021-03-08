@extends('layouts.admin.master')
@section('title')
    Tambah Data Pelanggan
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
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-users"></i> {{ $title }}</h1>
          </div>
          <div class="col-md-6">
           <nav aria-label="breadcrumb">
             <ol class="bg-gray-200 breadcrumb float-right">
               <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
               <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('admin.pelanggan') }}">Pelanggan</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
             </ol>
           </nav>
          </div>
         </div>

        <div class="card border-left-primary shadow mb-4">
          <div class="card-header py-3 bg-gray-200">
            <div class="row justify-content-center">
              <h3 class="text-gray-900">{{ $title }}</h3>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.pelanggan.store') }}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama">Nama</label>
                  <input type="text" autocomplete="off" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama">
                  @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="nik">Nomor Identitas (KTP/ SIM/ Kartu Pelajar)</label>
                  <input type="text" autocomplete="off" name="nik" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid @enderror" id="nik">
                  @error('nik')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
              </div>   
              
              <div class="form-row">  
                
                <div class="form-group col-md-6">
                  <label for="jk">Jenis Kelamin</label>
                  <select name="jk" class="form-control @error('jk') is-invalid @enderror">
                    <option disabled selected>Pilih jenis kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  @error('jk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>                              
               
                <div class="form-group col-md-6">
                  <label for="no_hp">No HP</label>
                  <input type="text" autocomplete="off" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp">
                  @error('no_hp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
              </div>  

              <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file"  name="foto" value="{{ old('foto') }}"  class="input-fa file @error('foto') is-invalid @enderror" data-preview-file-type="text" id="foto-pelanggan" data-browse-on-zone-click="true">
                @error('foto')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" autocomplete="off" class="@error('alamat') is-invalid @enderror form-control" cols="10" rows="10">{{ old('alamat') }}</textarea>
                @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
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
<script src="{{ asset('admin/vendor/file-input/js/fileinput.min.js')}}"></script>
<script src="{{ asset('admin/vendor/file-input/themes/fa/theme.js')}}"></script>

<script>
  $(".input-fa").fileinput({
      theme: "fa",
      uploadUrl: "/file-upload-batch/2"
  });
  </script>

<script>
  $(document).ready(function(){
    $("#foto-pelanggan").fileinput({'showUpload':true, 'previewFileType':'any'});
  });
</script>

@endpush