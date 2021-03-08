@extends('layouts.admin.master')

@section('title')
    {{ $user->name }}
@endsection

@push('css')
    
@endpush

@section('admin-content')
              <!-- Begin Page Content -->
              <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 ml-2"><i class="fas fa-user"></i> {{ $user->name}}</h1>
                </div>
            
                <div class="row">
      
                <div class="col-lg-4 col-md-4">
                <div class="card shadow mb-4">
                <div class="card-body">
                <div class="my-2 pb-3 d-flex justify-content-center">
                <img src="{{ $user->getFotoProfile() }}" style="height: 10rem; width:auto;" class="img-fluid rounded">
                </div>
                <table class="table table-hover">
                <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $user->name }}</td>
                </tr>
                <tr>
                <td>Username</td>
                <td>:</td>
                <td>{{ $user->username }}</td>
                </tr>
                <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $user->email }}</td>
                </tr>
                <tr>
                <tr>
                <td>No HP</td>
                <td>:</td>
                <td>{{ $user->profile->no_hp }}</td>
                </tr>
                <tr>
                <td>Website</td>
                <td>:</td>
                <td><a href="{{ $user->profile->website }}" target="_blank" rel="noopener noreferrer">{{ $user->profile->website }}</a></td>
                </tr>
                <tr>
                <td>Instagram</td>
                <td>:</td>
                <td><a href="{{ $user->profile->ig }}" target="_blank" rel="noopener noreferrer">{{ $user->profile->ig }}</a></td>
                </tr>
                <tr>
                <td>Facebook</td>
                <td>:</td>
                <td><a href="{{ $user->profile->fb }}" target="_blank" rel="noopener noreferrer">{{ $user->profile->fb }}</a></td>
                </tr>
                <tr>
                <td>Github</td>
                <td>:</td>
                <td><a href="{{ $user->profile->github }}" target="_blank" rel="noopener noreferrer">{{ $user->profile->github }}</a></td>
                </tr>
                </table>
                </div>
                <div class="card-footer">
                <a href="{{ route('edit.profile',$user->username) }}" class="btn btn-outline-success btn-block">Edit Profile</a>
                </div>
                </div>
                </div>
                <div class="col-lg-8">
      
                <div class="card shadow mb-4">
                <div class="card-body">
                {!! $user->profile->bio !!}
                </div>
                </div>
      
                </div>
      
                </div>
      
                </div>
                <!-- /.container-fluid -->
@endsection

@push('js')
    
@endpush