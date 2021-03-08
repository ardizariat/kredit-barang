<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta charset="utf-8">
  <style>
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: center;
}

table td {
  padding: 5px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
  </style>
  <title>{{ $title }}</title>
</head>
<body>
  <header class="clearfix">
    <div id="logo">
      <img src="logo.png">
    </div>
    <h1>Kwitansi Pembayaran</h1>
    <div id="company" class="clearfix">
      <div>Company Name</div>
      <div>455 Foggy Heights,<br /> AZ 85004, US</div>
      <div>(602) 519-0450</div>
      <div><a href="mailto:company@example.com">company@example.com</a></div>
    </div>
    @foreach ($transaksi as $pelanggan)            
    <div id="project">
      <div><span>ID PELANGGAN</span> {{ $pelanggan->transaksi_id }}</div>
      <div><span>NAMA</span> {{ $pelanggan->transaksi->pelanggan->nama }}</div>
      <div><span>ALAMAT</span> {{ $pelanggan->transaksi->pelanggan->alamat }}</div>
      <div><span>NO HP</span> {{ $pelanggan->transaksi->pelanggan->no_hp }}</div>
      <div><span>TANGGAL</span> {{ tanggal(date('Y-m-d')) }}</div>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th>NAMA BARANG</th>
          <th>HARGA BARANG</th>
          <th>TANGGAL</th>
          <th>BAYAR</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="service">{{ $pelanggan->transaksi->barang->nama }}</td>
          <td class="desc">{{ rupiah($pelanggan->transaksi->barang->harga_jual_cash) }}</td>
          <td class="desc">{{ tanggal($pelanggan->tanggal_bayar) }}</td>
          <td class="qty">{{ rupiah($pelanggan->bayar) }}</td>
        </tr>
        <tr>
          <td colspan="3">SUBTOTAL</td>
          <td class="total">{{rupiah($pelanggan->bayar)}}</td>
        </tr>
        <tr>
          <td colspan="3" class="grand total">GRAND TOTAL</td>
          <td class="grand total">{{rupiah($pelanggan->bayar)}}</td>
        </tr>
      </tbody>
    </table>
    <div id="notices">
      <div>KETERANGAN:</div>
      <div class="notice">{!! $pelanggan->keterangan !!}.</div>
    </div>
    @endforeach

  </main>
  <footer>
    Terima kasih atas kepercayaan anda membeli barang di toko kami.
  </footer>
</body>
</html>