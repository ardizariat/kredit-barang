@extends('layouts.admin.master')
@section('title')
{{ $title }}
@endsection

@push('css')
<link href="{{ asset('admin/vendor/date-time-pickers/css/flatpicker-airbnb.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('admin-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-money-bill-wave"></i> {{ $title }}</h1>
      </div>
      <div class="col-md-6">
       <nav aria-label="breadcrumb">
         <ol class="bg-gray-200 breadcrumb float-right">
           <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
           <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
         </ol>
       </nav>
      </div>
    </div>

    <div class="card shadow my-3">
      <div class="card-body">
        <form target="_blank" class=" my-3" action="{{ route('admin.transaksi.kredit.export') }}" method="get">
          <div class="form-row">
            <div class="col-md-4">
            <label>Dari</label>
            <input type="text" value="{{ date('Y-m-d') }}" name="dari" class="max-date form-control">
            </div>
            <div class="col-md-4">
            <label>Sampai</label>
            <input type="text" value="{{ date('Y-m-d') }}" name="sampai" class="max-date form-control">
            </div>
            <div class="col-md-2">
            <label>Export Sebagai</label>
            <select name="tipe" class="tipe @error('tipe') is-invalid @enderror form-control">
            <option disabled selected>Pilih Format</option>
            <option class="pdf" value="pdf">PDF</option>
            <option class="excel" value="excel">EXCEL</option>
            </select>
              @error('tipe')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-2 mt-4 pt-2">
            <button type="submit" class="btn-save btn btn-block btn-dark">Export</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
@stop

@push('js') 
<script src="{{ asset('admin/vendor/date-time-pickers/js/flatpickr.js') }}"></script>
<script src="{{ asset('admin/vendor/date-time-pickers/js/date-time-picker-script.js') }}"></script>
<script>
  $(document).ready(function(){
    $('.tipe').change(function(){
      var me = $(this),
      pilihan = me.val();

      if(pilihan == "excel"){
        $('.btn-save').removeClass('btn-dark');
        $('.btn-save').removeClass('btn-danger');
        $('.btn-save').addClass('btn-success');
      }

      if(pilihan == "pdf"){
        $('.btn-save').removeClass('btn-dark');
        $('.btn-save').removeClass('btn-success');
        $('.btn-save').addClass('btn-danger');
      }

    });
  });
</script>
@endpush