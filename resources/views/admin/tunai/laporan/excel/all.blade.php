<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Laporan Penjualan Tunai</title>
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
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Admin</th>
        <th>Pelanggan ID</th>
        <th>No Pembayaran</th>
        <th>Nama Pelanggan</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Tanggal</th>
        <th>Bayar</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td class="tengah">{{ $loop->iteration }}</td>
        <td>{{ $item->user->name }}</td>
        <td>{{ $item->transaksi_id }}</td>
        <td>{{ $item->no_pembayaran }}</td>
        <td>{{ $item->transaksi->pelanggan->nama }}</td>
        <td>{{ $item->transaksi->barang->nama }}</td>
        <td>{{ $item->transaksi->barang->harga_jual_cash }}</td>
        <td>{{ tanggal($item->tanggal_bayar) }}</td>
        <td>{{ $item->bayar }}</td>
      </tr>          
      @endforeach
    </tbody>

  </table>
</body>
</html>