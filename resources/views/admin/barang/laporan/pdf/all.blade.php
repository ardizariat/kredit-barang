<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Laporan Pengeluaran</title>
  <style>
    .table {
    border-collapse: collapse;
    width: 100%;
    }

    th{
    background-color:  #d6d3d3;
    color: black;
    }

    th {
    text-align: center;
    padding: 8px;
    font-size: 20px;
    }
    td {
    text-align: left;
    padding: 8px;
    }

    .tengah{
    text-align: center;
    }

    .uang{
    text-align: right;
    color: black;
    }
    .total {
      font-weight: bold;
      font-size: 20px;
      border-bottom: 1px solid black;
    }

    .text-success{
      color: rgb(24, 214, 24);
      font-weight: bold;
    }

    .text-danger{
      color: rgb(224, 40, 55);
      font-weight: bold;
    }

    ul{
      margin: 0;
      padding: 0;
    }

    li {
      list-style-type: none;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    h1{
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>{!! $title !!}</h1>
  <table>
      <tr>
        <td colspan="2">Modal</td>
        <td colspan="1">:</td>
        <td colspan="1" class="uang">{{ rupiah($modal) }}</td>
      </tr>
      <tr>
        <td colspan="2">Barang Terjual</td>
        <td colspan="1">:</td>
        <td colspan="1" class="uang">{{ $terjual }}</td>
      </tr>
      <tr>
        <td colspan="2">Barang Tersedia</td>
        <td colspan="1">:</td>
        <td colspan="1" class="uang">{{ $ready }}</td>
      </tr>
      <tr>
        <td colspan="2">Total Barang</td>
        <td colspan="1">:</td>
        <td colspan="1" class="uang">{{ $total }}</td>
      </tr>
  </table>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Supplier</th>
        <th>Nama Barang</th>
        <th>Merk</th>
        <th>Memori/ RAM</th>
        <th>Harga Beli</th>
        <th>Harga Jual Cash</th>
        <th>Harga Jual Kredit</th>
        <th>Tanggal Pembelian</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $barang)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $barang->kategori->kategori }}</td>
        <td>{{ $barang->suppliers->nama }}</td>
        <td>{{ $barang->nama }}</td>
        <td>{{ $barang->merk }}</td>
        <td>{{ $barang->memori }}/ {{ $barang->ram }}</td>
        <td>{{ rupiah($barang->harga_beli) }}</td>
        <td>{{ rupiah($barang->harga_jual_cash) }}</td>
        <td>{{ rupiah($barang->harga_jual_kredit) }}</td>
        <td>{{ tanggal($barang->tanggal_beli) }}</td>
        @if($barang->status == 0)
        <td class="text-success">Tersedia</td>
        @else 
        <td class="text-danger">Terjual</td>
        @endif
      </tr>          
      @endforeach
      {{-- <tr>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total">Total</td>
        <td class="uang total" colspan="2">{{ rupiah($total) }}</td>
      </tr> --}}
    </tbody>

  </table>
</body>
</html>