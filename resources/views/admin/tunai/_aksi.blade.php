<a href="" class="btn-sm text-decoration-none btn-show btn-info" 
data-id="{{ $data->id }}"
data-pelanggan="{{ $data->pelanggan->nama }}"
data-barang="{{ $data->barang->nama }}"
data-harga="{{ rupiah($data->barang->harga_jual_cash) }}"
data-qty="{{ $data->qty }}"
data-tanggal="{{ tanggal($data->pembayaranCash->tanggal_bayar) }}"
data-no_pembayaran="{{ $data->pembayaranCash->no_pembayaran }}"
data-bayar="{{ rupiah($data->pembayaranCash->bayar) }}"
data-status="{{ $data->pembayaranCash->status }}"
data-keterangan="{!! $data->pembayaranCash->keterangan !!}"
>
  <i class="fas fa-info"></i> Detail
</a>

<a target="_blank" class="btn-sm btn-primary ml-2 text-decoration-none" href="{{ $cetak }}">
<i class="fas fa-print"></i> Cetak
</a>