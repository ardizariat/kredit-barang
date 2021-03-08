<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{{ $title }}</title>
  <style>
    table {
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

    tr:nth-child(even){background-color: #f2f2f2}

    h1{
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>{!! $title !!}</h1>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>ID Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Sudah Bayar</th>
        <th>Tanggal Beli</th>
        <th>Sisa Tagihan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($daftar_pelanggan as $pelanggan)
      <tr>
        <td class="tengah">{{ $loop->iteration }}</td>
        <td>{{ $pelanggan->id }}</td>
        <td>{{ $pelanggan->pelanggan->nama }}</td>
        <td>{{ $pelanggan->barang->nama }}</td>
        <td class="uang">{{ rupiah($pelanggan->barang->harga_jual_kredit) }}</td>
        <td>{{ rupiah($pelanggan->dibayar) }}</td>
        <td>{{ tanggal($pelanggan->tanggal_transaksi) }}</td>
        <td>{{ rupiah($pelanggan->sisa) }}</td>
      </tr>          
      @endforeach
      <tr>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total">Total Sudah Dibayar</td>
        <td class="uang total">{{ rupiah($total_transaksi) }}</td>
        <td class="total">Total Sisa Tagihan</td>
        <td class="uang total">{{ rupiah($total_sisa) }}</td>
      </tr>
    </tbody>

  </table>
</body>
</html>