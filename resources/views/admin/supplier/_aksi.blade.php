@can('full-permission','delete')
<a href="{{ $hapus }}" class="btn-sm  btn-danger btn-border btn-hapus" data-toggle="tooltip" data-placement="top" title="Hapus {{ $nama }}" nama="{{ $nama }}"><i class="fa fa-trash"></i></a>
@endcan
<a href="{{ $show }}" class="btn-sm btn-show btn-info btn-border" data-toggle="tooltip" data-placement="top" title="Lihat detail {{ $nama }}"
data-id="{{ $id }}"
data-nama="{{ $nama }}"
data-no_hp="{{ $no_hp }}"
data-aplikasi="{{ $aplikasi }}"
data-alamat="{{ $alamat }}"><i class="fas fa-info-circle"></i></a>