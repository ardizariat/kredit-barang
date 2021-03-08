@if ($barang->status == 0)
@can('full-permission','delete')
<a href="{{ $hapus }}" class="btn-sm  btn-danger btn-border btn-hapus" data-toggle="tooltip" data-placement="top" title="Hapus {{ $barang->nama }}" barang="{{ $barang->nama }}"><i class="fa fa-trash"></i></a>
@endcan
<a href="{{ $edit }}" class="btn-sm  btn-success btn-border" data-toggle="tooltip" data-placement="top" title="Edit {{ $barang->nama }}"><i class="fa fa-edit"></i></a>
@endif
<a href="{{ $detail }}" class="text-decoration-none btn-sm btn-circle btn-info" data-toggle="tooltip" data-placement="top" title="Detail {{ $barang->nama }}"><i class="text-black fa fa-eye"></i></a>