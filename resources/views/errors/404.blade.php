@extends('layouts.admin.master')
@section('title')
    Error
@endsection

@push('css')

@endpush

@section('admin-content')
  <div class="container-fluid mt-5 pt-5">
    <div class="text-center">
      <div class="error mx-auto" data-text="404">404</div>
      <p class="lead text-gray-800 mb-5">Halaman Tidak Ada</p>
      <p class="text-gray-500 mb-0">Halaman ini tidak ada...</p>
      <a href="" class="kembali">&larr; Kembali</a>
    </div>    
  </div>
@endsection

@push('js')
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('.kembali').click(function(event){
        event.preventDefault();
        window.history.back();
      });
    });
  </script>
@endpush
