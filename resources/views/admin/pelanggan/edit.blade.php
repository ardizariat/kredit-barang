@extends('layouts.admin.master')
@section('title')
{{ $title }}
@endsection

@push('css')
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
               <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
               <li class="breadcrumb-item"><a href="{{ route('admin.pelanggan') }}">Pelanggan</a></li>
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
            <form enctype="multipart/form-data" action="{{ route('admin.pelanggan.update',$pelanggan->id) }}" method="POST">
              @csrf
              @method('patch')
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama">Nama</label>
                  <input type="text" autocomplete="off" name="nama" value="{{ $pelanggan->nama }}" class="form-control @error('nama') is-invalid @enderror" id="nama">
                  @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="nik">Nomor Identitas (KTP/ SIM/ Kartu Pelajar)</label>
                  <input type="text" autocomplete="off" name="nik" value="{{ $pelanggan->nik }}" class="form-control @error('nik') is-invalid @enderror" id="nik">
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
                    <option disabled>Pilih jenis kelamin</option>
                    <option {{ $pelanggan->jk == 'Laki-laki' ? 'selected' : '' }}value="Laki-laki">Laki-laki</option>
                    <option {{ $pelanggan->jk == 'Perempuan' ? 'selected' : '' }}value="Perempuan">Perempuan</option>
                  </select>
                  @error('jk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>                              
               
                <div class="form-group col-md-6">
                  <label for="no_hp">No HP</label>
                  <input type="text" autocomplete="off" name="no_hp" value="{{ $pelanggan->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp">
                  @error('no_hp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
              </div>  

              <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror">
                @error('foto')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" autocomplete="off" class="@error('alamat') is-invalid @enderror form-control" cols="10" rows="10">{{ $pelanggan->alamat }}</textarea>
                @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
              </div>

              <div class="row justify-content-center">
                <button data-toggle="tooltip" data-placement="top" title="Update" type="submit" class="btn btn-success"><i class="fas fa-download"></i> Update</button>
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