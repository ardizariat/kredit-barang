@extends('layouts.admin.master')
@section('title')
    {{ $pelanggan->nama }}
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
        <!-- DataTables Example -->
        <div class="card shadow mb-4 border-bottom-dark">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
               <div class="mt-5">
                <img src="{{ $pelanggan->getFotoPelanggan() }}" class="img-fluid">
               </div>
               <div class="row justify-content-center">
                 @can('full-permission','edit')
                 <div class="mt-3 col-md-8">
                  <a href="{{ route('admin.pelanggan.edit',$pelanggan->id) }}" class="btn btn-block btn-outline-dark">
                    <i class="fas fa-edit"></i> Ubah
                  </a>
                 </div>
                 @endcan
               </div>
              </div>
              <div class="col-md-8">
                <h3 class="text-center text-uppercase mb-3">{{ $pelanggan->nama }}</h3>
                <div class="table-resposive">
                  <table class="table table-hover text-gray-900">
                    <tr>
                      <td>NIK</td>
                      <td>:</td>
                      <td align="right">{{ $pelanggan->nik }}</td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td align="right">{{ $pelanggan->jk }}</td>
                    </tr>
                    <tr>
                      <td>No HP</td>
                      <td>:</td>
                      <td align="right">{{ $pelanggan->no_hp }}</td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td align="right">{{ $pelanggan->alamat }}</td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td>:</td>
                      <td align="right">
                        @if ($pelanggan->user_id)
                        {{ $pelanggan->user->username }}
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td align="right">
                        @if ($pelanggan->user_id)
                        {{ $pelanggan->user->email }}
                        @endif
                      </td>
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