@extends('layouts.admin.master')
@section('title')
    {{ $barang->nama }}
@endsection

@push('css')
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
        <div class="card shadow mb-4 border-bottom-dark animate__animated animate__zoomIn">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 animate__animated animate__zoomInRight animate__delay-1s">
               <div class="mt-5">
                <img src="{{ $barang->getGambarBarang() }}" class="img-fluid">
               </div>
               @role('super-admin')
                @if($barang->status == 0)
                  <div class="row justify-content-center">
                    <div class="mt-3 col-md-8">
                    <a href="{{ route('admin.barang.edit',$barang->id) }}" class="btn btn-block btn-outline-dark">
                      <i class="fas fa-edit"></i> Ubah
                    </a>
                    </div>
                  </div>
                @endif
              @endrole
              </div>
              <div class="col-md-8 animate__animated animate__zoomInRight animate__delay-1s">
                <h3 class="text-center text-uppercase mb-3">{{ $barang->nama }}</h3>
                <div class="table-resposive">
                  <table class="table table-hover text-gray-900">
                   @if ($barang->supplier)
                   <tr>
                    <td>Supplier</td>
                    <td>:</td>
                    <td align="right"><a href="{{ route('admin.supplier.show',$barang->supplier_id) }}">{{ $barang->suppliers->nama }}</a></td>
                  </tr>
                   @endif
                    <tr>
                      <td>Merk</td>
                      <td>:</td>
                      <td align="right">{{ $barang->merk }}</td>
                    </tr>
                    <tr>
                      <td>Kategori</td>
                      <td>:</td>
                      <td align="right">{{ $barang->kategori->kategori }}</td>
                    </tr>
                    @if ($size)
                    <tr>
                      <td>RAM - Memori</td>
                      <td>:</td>
                      <td align="right">{{ $size }}</td>
                    </tr>
                    <tr>
                    @endif
                      <td>Tanggal Pembelian</td>
                      <td>:</td>
                      <td align="right">{{ tanggal($barang->tanggal_beli) }}</td>
                    </tr>
                    <tr>
                      <td>Harga Beli</td>
                      <td>:</td>
                      <td align="right">{{ rupiah($barang->harga_beli) }}</td>
                    </tr>
                    <tr>
                      <td>Harga Jual Cash</td>
                      <td>:</td>
                      <td align="right">{{ rupiah($barang->harga_jual_cash) }}</td>
                    </tr>
                    <tr>
                      <td>Harga Jual Kredit</td>
                      <td>:</td>
                      <td align="right">{{ rupiah($barang->harga_jual_kredit) }}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            {{-- End row --}}
            <div class="row animate__animated animate__zoomInRight animate__delay-1s">
              <div class="row my-2 mx-3">
                <h4 class="text-gray-900 mt-4 ml-3">Deskripsi </h4>
                <div class="col-md-12">
                  {!! $barang->deskripsi !!}
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