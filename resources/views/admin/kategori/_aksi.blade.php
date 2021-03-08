@can('full-permission','delete')
<a data-nama="{{ $data->kategori }}" href="{{ route('admin.kategori.delete', $data->id) }}" class="btn-sm btn-hapus btn-danger">
  <i class="fas fa-trash"></i>
</a>
@endcan