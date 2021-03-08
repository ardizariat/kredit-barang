<?php

use App\Models\Barang;
use App\Models\PembayaranCash;
use App\Models\PembayaranKredit;
use App\Models\Supplier;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function tanggal($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function rupiah($angka)
{
  $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
}

function pemasukanHariIni()
{

  $timezone = Carbon::now(new DateTimeZone('Asia/Jakarta'));
  $hari_ini = Carbon::today();
  $sekarang = Carbon::now();

  // Kredit
  $kredit = PembayaranKredit::whereBetween('tanggal_bayar',[$hari_ini,$sekarang])
    ->get();
  $total_kredit = $kredit->sum('bayar');

  // Tunai
  $tunai = PembayaranCash::whereBetween('tanggal_bayar',[$hari_ini,$sekarang])
    ->get();
  $total_tunai = $tunai->sum('bayar');

  $total = $total_kredit + $total_tunai;
  return $total;
}

function pemasukanMingguIni()
{

  $timezone = Carbon::now(new DateTimeZone('Asia/Jakarta'));
  $hari_ini = Carbon::now();
  $seminggu_lalu = Carbon::today()->subWeek();
  
  // Kredit
  $kredit = PembayaranKredit::whereBetween('tanggal_bayar',[$seminggu_lalu,$hari_ini])
    ->get();
  $total_kredit = $kredit->sum('bayar');

  // Tunai
  $tunai = PembayaranCash::whereBetween('tanggal_bayar',[$seminggu_lalu,$hari_ini])
    ->get();
  $total_tunai = $tunai->sum('bayar');

  $total = $total_kredit + $total_tunai;

  return $total;
}

function transaksiMingguIni()
{
  $sekarang = Carbon::now();
  $seminggu_lalu = Carbon::today()->subWeek();
  
    // Kredit
    $transaksi_kredit = PembayaranKredit::whereBetween('tanggal_bayar',[$seminggu_lalu,$sekarang])
    ->count();

    // Cash
  $transaksi_cash = PembayaranCash::whereBetween('tanggal_bayar',[$seminggu_lalu,$sekarang])
  ->count();
  
  $total_transaksi = $transaksi_cash + $transaksi_kredit;
  
  return $total_transaksi;
}
function transaksiHariIni()
{
  $hari_ini = Carbon::today();
  $sekarang = Carbon::now();

  // Kredit
  $transaksi_kredit = PembayaranKredit::whereBetween('tanggal_bayar',[$hari_ini,$sekarang])
    ->count();

    // Cash
  $transaksi_cash = PembayaranCash::whereBetween('tanggal_bayar',[$hari_ini,$sekarang])
  ->count();
  
  $total_transaksi = $transaksi_cash + $transaksi_kredit;

  return $total_transaksi;
}

function totalPemasukanBulanIni()
{
  $data = DB::table('penjualan')
  ->select([
    DB::raw('sum(pemasukan) as jumlah'),
    DB::raw('EXTRACT(MONTH from tanggal_transaksi) as bulan')
  ])
  ->groupBy('bulan')
  ->get()
  ->toArray();
  foreach($data as $item){
    $jumlah = $item->jumlah;
  }
  return rupiah($jumlah);
}

function belumLunas()
{
  $belum_lunas = Transaksi::where('jenis_pembayaran','kredit')
  ->where('status',0)
  ->count();
  return $belum_lunas;
}

function pemasukanBulanIni()
{
  $awal_bulan = Carbon::now()->startOfMonth();
  $akhir_bulan = Carbon::now()->endOfMonth();

  $data = PembayaranKredit::whereBetween('tanggal_bayar',[$awal_bulan, $akhir_bulan])->get();
  $bayar = $data->sum('bayar');
  return $bayar;
}

function transaksiBulanIni()
{
  $awal_bulan = Carbon::now()->startOfMonth();
  $akhir_bulan = Carbon::now()->endOfMonth();

  $data = PembayaranKredit::whereBetween('tanggal_bayar', [$awal_bulan, $akhir_bulan])->count();
  return $data;
}

