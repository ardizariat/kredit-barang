@extends('layouts.admin.master')
@section('title')
    {{ $supplier->nama }}
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
               <li class="breadcrumb-item"><a href="{{ route('admin.supplier') }}">Supplier</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
             </ol>
           </nav>
          </div>
         </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4 border-bottom-dark">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
               <div class="mt-5">
                {{-- <img src="{{ $pelanggan->getFotoPelanggan() }}" class="img-fluid"> --}}
               </div>
               <div class="row justify-content-center">
                 <div class="mt-3 col-md-8">
                  <a href="{{ route('admin.supplier.edit',$supplier->id) }}" class="btn btn-block btn-outline-dark">
                    <i class="fas fa-edit"></i> Ubah
                  </a>
                 </div>
               </div>
              </div>
              <div class="col-md-8">
                <h3 class="text-center text-uppercase mb-3">{{ $supplier->nama }}</h3>
                <div class="table-resposive">
                  <table class="table table-hover text-gray-900">
                    <tr>
                      <td>No HP</td>
                      <td>:</td>
                      <td align="right">{{ $supplier->no_hp }}</td>
                    </tr>
                    <tr>
                      <td>Aplikasi</td>
                      <td>:</td>
                      <td align="right">{{ $supplier->aplikasi }}</td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td align="right">{{ $supplier->alamat }}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection

@push('js')
@endpush