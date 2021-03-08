@if ($data->status == false)
@can('full-permission','delete')
<a href="{{ $url_delete }}" data-toggle="tooltip" data-placement="top" title="Hapus {{ $data->nama }}" class="btn-sm btn-danger btn-border hapus-pelanggan" pelanggan="{{ $data->nama }}"><i class="fa fa-trash"></i></a>
@endcan
@endif
<a href="{{ $url_show }}" data-toggle="tooltip" data-placement="top" title="Lihat detail {{ $data->nama }}" class="btn-sm btn-circle btn-info btn-round"><i class="text-black fa fa-eye"></i></a>
<a href="{{ $url_edit }}" data-toggle="tooltip" data-placement="top" title="Edit {{ $data->nama }}" class="btn-sm btn-success btn-border"><i class="fa fa-edit"></i></a>