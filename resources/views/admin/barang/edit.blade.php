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

              <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" autocomplete="off" name="merk" value="{{ $barang->merk ? $barang->merk : old('merk') }}" class="form-control @error('merk') is-invalid @enderror" id="merk">
                @error('merk')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Kategori</label>                
                  <select autocomplete="off" name="kategori_id" value="{{ old('kategori_id') }}" class="select2 form-control @error('kategori') is-invalid @enderror">
                    <option disabled>Pilih Kategori</option>
                    @foreach ($data_kategori as $kategori)
                    <option {{ $barang->kategori_id == $kategori->id ? 'selected' : old('nama') }} value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>   
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
                  <select autocomplete="off" name="supplier_id" class="select2 form-control @error('supplier_id') is-invalid @enderror">
                    <option selected disabled>Pilih Supplier</option>
                    @foreach ($data_supplier as $supplier)
                    <option {{ $barang->supplier_id == $supplier->id ? 'selected' : old('nama') }}  value="{{ $supplier->id }}">{{ $supplier->nama }}</option>   
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

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="ram">RAM</label>                
                  <select autocomplete="off" name="ram" class="select2 form-control @error('ram') is-invalid @enderror" id="ram">
                    <option disabled>Pilih Kapasitas RAM</option>
                    <option {{ $barang->ram == 1 ? 'selected' : old('ram') }} value="1">1 GB</option>
                    <option {{ $barang->ram == 2 ? 'selected' : old('ram') }} value="2">2 GB</option>
                    <option {{ $barang->ram == 3 ? 'selected' : old('ram') }} value="3">3 GB</option>
                    <option {{ $barang->ram == 4 ? 'selected' : old('ram') }} value="4">4 GB</option>
                    <option {{ $barang->ram == 6 ? 'selected' : old('ram') }} value="6">6 GB</option>
                    <option {{ $barang->ram == 8 ? 'selected' : old('ram') }} value="8">8 GB</option>
                    <option {{ $barang->ram == 16 ? 'selected' : old('ram') }} value="16">16 GB</option>
                    <option {{ $barang->ram == 32 ? 'selected' : old('ram') }} value="32">32 GB</option>
                  </select>
                  @error('ram')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="memori">Memori</label>                
                  <select autocomplete="off" name="memori" value="{{ old('memori') }}" class="select2 form-control @error('memori') is-invalid @enderror" id="memori">
                    <option disabled>Pilih Kapasitas Memori</option>
                    <option {{ $barang->memori == 8 ? 'selected' : old('memori') }} value="8">8 GB</option>
                    <option {{ $barang->memori == 16 ? 'selected' : old('memori') }} value="16">16 GB</option>
                    <option {{ $barang->memori == 32 ? 'selected' : old('memori') }} value="32">32 GB</option>
                    <option {{ $barang->memori == 64 ? 'selected' : old('memori') }} value="64">64 GB</option>
                    <option {{ $barang->memori == 128 ? 'selected' : old('memori') }} value="128">128 GB</option>
                    <option {{ $barang->memori == 256 ? 'selected' : old('memori') }} value="256">256 GB</option>
                    <option {{ $barang->memori == 500 ? 'selected' : old('memori') }} value="500">500 GB</option>
                    <option {{ $barang->memori == 1000 ? 'selected' : old('memori') }} value="1000">1000 GB</option>
                    <option {{ $barang->memori == 2000 ? 'selected' : old('memori') }} value="2000">2000 GB</option>
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
                    <input type="text" autocomplete="off" name="harga_beli" value="{{ $barang->harga_beli ? $barang->harga_beli : old('harga_beli') }}" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" placeholder="Harga Beli">
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
                   <p>Harga Jual Cash</p>
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
                  <p>Harga Jual Kredit</p>
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
              
               <div class="form-group">
                   <label for="gambar-barang-edit">Gambar</label>
                   <input type="file"  name="gambar" class="input-fa file @error('gambar') is-invalid @enderror" data-preview-file-type="text" id="gambar-barang-edit" data-browse-on-zone-click="true">
                   @error('gambar')
                   <div class="invalid-feedback">
                     {{ $message }}
                   </div>
                   @enderror
                </div>
              
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" autocomplete="off" id="deskripsi-barang" class="@error('deskripsi') is-invalid @enderror form-control" cols="10" rows="15">{{ $barang->deskripsi ? $barang->deskripsi : old('deskripsi') }}</textarea>
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
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
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
                </select>
                @error('aplikasi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
      
              <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control">
              </div>
      
                 <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" cols="3" rows="3" class="form-control"></textarea>
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
  CKEDITOR.replace('deskripsi-barang',{
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
    $("#gambar-barang-edit").fileinput({'showUpload':true, 'previewFileType':'any'});
  });
</script>
@endpush