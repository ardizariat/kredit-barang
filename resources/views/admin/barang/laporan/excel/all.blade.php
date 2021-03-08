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
        <th>Kategori</th>
        <th>Supplier</th>
        <th>Nama Barang</th>
        <th>Merk</th>
        <th>Memori</th>
        <th>RAM</th>
        <th>Harga Beli</th>
        <th>Harga Jual Cash</th>
        <th>Harga Jual Kredit</th>
        <th>Tanggal Pembelian</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td class="tengah">{{ $loop->iteration }}</td>
        <td>{{ $item->kategori->kategori }}</td>
        <td>{{ $item->suppliers->nama }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->merk }}</td>
        <td>{{ $item->memori }}</td>
        <td>{{ $item->ram }}</td>
        <td>{{ $item->harga_beli }}</td>
        <td>{{ $item->harga_jual_cash }}</td>
        <td>{{ $item->harga_jual_kredit }}</td>
        <td>{{ tanggal($item->tanggal_beli) }}</td>
        @if ($item->status == 0)
            <td>Tersedia</td>
            @else 
            <td>Terjual</td>
        @endif
      </tr>          
      @endforeach
    </tbody>

  </table>
</body>
</html>