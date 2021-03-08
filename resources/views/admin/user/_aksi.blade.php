<a href="{{ $aktifkan }}" data-user="{{ $nama }}" data-toggle="tooltip" data-placement="top" title="{{ $status == 0 ? 'Aktifkan Akun' : 'Non-Aktifkan Akun' }}" class="btn-sm text-decoration-none btn-status btn-{{ $status == 0 ? 'danger' : 'success' }}">
  {{ $status == 0 ? 'Tidak Aktif' : 'Aktif' }}
</a>