<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{{ $title }}</title>
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
      <td colspan="2">Pelanggan ID</td>
      <td colspan="1">:</td>
      <td colspan="1" class="uang">{{ $transaksi_id }}</td>
    </tr>
    <tr>
      <td colspan="2">Nama Pelanggan</td>
      <td colspan="1">:</td>
      <td colspan="1" class="uang">{{ $nama_pelanggan }}</td>
    </tr>
    <tr>
      <td colspan="2">Nama Barang</td>
      <td colspan="1">:</td>
      <td colspan="1" class="uang">{{ $nama_barang }}</td>
    </tr>
    <tr>
      <td colspan="2">Harga Barang</td>
      <td colspan="1">:</td>
      <td colspan="1" class="uang">{{ rupiah($harga_barang) }}</td>
    </tr>
    <tr>
      <td colspan="2">Sisa Cicilan</td>
      <td colspan="1">:</td>
      <td colspan="1" class="uang">{{ rupiah($sisa) }}</td>
    </tr>
    <tr>
      <td colspan="2">Status Cicilan</td>
      <td colspan="1">:</td>
      <td colspan="1" class="uang">{{ $status }}</td>
    </tr>
</table>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>No Pembayaran</th>
        <th>Tanggal</th>
        <th>Bayar</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pelanggan as $kredit)
      <tr>
        <td class="tengah">{{ $loop->iteration }}</td>
        <td>{{ $kredit->no_pembayaran }}</td>
        <td>{{ tanggal($kredit->tanggal_bayar) }}</td>
        <td class="uang">{{ rupiah($kredit->bayar) }}</td>
        <td class="uang">{!! $kredit->keterangan !!}</td>
      </tr>          
      @endforeach
      <tr>
        <td class="total"></td>
        <td class="total"></td>
        <td class="total">Total</td>
        <td class="uang total" colspan="2">{{ rupiah($total) }}</td>
        <td class="total"></td>
      </tr>
    </tbody>

  </table>
</body>
</html>