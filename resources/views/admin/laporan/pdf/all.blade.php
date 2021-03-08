<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Laporan Pengeluaran</title>
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
      @foreach ($data_cash as $cash)
      <tr>
        <td>{{ $cash->user->name }}</td>
        <td>{{ $cash->transaksi_id }}</td>
        <td>{{ $cash->no_pembayaran }}</td>
        <td>{{ $cash->transaksi->pelanggan->nama }}</td>
        <td>{{ $cash->transaksi->barang->nama }}</td>
        <td>{{ rupiah($cash->transaksi->barang->harga_jual_cash) }}</td>
        <td>{{ tanggal($cash->tanggal_bayar) }}</td>
        {{-- <td class="tengah">{{ number_format($aset->qty) }}</td> --}}
        <td class="uang">{{ rupiah($cash->bayar) }}</td>
      </tr>          
      @endforeach
      @foreach ($data_kredit as $kredit)
      <tr>
        <td>{{ $kredit->user->name }}</td>
        <td>{{ $kredit->transaksi_id }}</td>
        <td>{{ $kredit->no_pembayaran }}</td>
        <td>{{ $kredit->transaksi->pelanggan->nama }}</td>
        <td>{{ $kredit->transaksi->barang->nama }}</td>
        <td>{{ rupiah($kredit->transaksi->barang->harga_jual_cash) }}</td>
        <td>{{ tanggal($kredit->tanggal_bayar) }}</td>
        <td class="uang">{{ rupiah($kredit->bayar) }}</td>
      </tr>          
      @endforeach
      <tr>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total">Total</td>
        <td class="uang total" colspan="2">{{ rupiah($total) }}</td>
      </tr>
    </tbody>

  </table>
</body>
</html>