<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PembayaranKredit;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function pelanggan()
    {
        return view('frontend.pelanggan');
    }

    public function cek(Request $request)
    {
        $request->validate([
            'kode' => 'required'
        ]);

        $kode = $request->kode;

        // Validasi
        $pelanggan = Transaksi::whereId($kode)->where('jenis_pembayaran','=','kredit')->first();
        
        // Keluarin data
        if($pelanggan){
            $daftar_kredit = PembayaranKredit::where('transaksi_id','=',$kode)->get();
            $nama_barang = $pelanggan->barang->nama;
            $nama_pelanggan = $pelanggan->pelanggan->nama;
            $kode_pelanggan = $pelanggan->id;
            $harga_barang = $pelanggan->barang->harga_jual_kredit;
            $status = $pelanggan->status;
            if($status == 0){
                $status = 'Belum Lunas';
            }else{
                $status = 'Sudah Lunas';
            }
            $sisa = $pelanggan->sisa;
            $total_bayar = $daftar_kredit->sum('bayar');
            return view('frontend.data', compact(
                'daftar_kredit',
                'status',
                'nama_barang',
                'harga_barang',
                'sisa',
                'total_bayar',
                'nama_pelanggan',
                'kode_pelanggan'
            ));
        }

        // Ga ketemu
        return redirect()->route('home')->with('gagal','Data pelanggan tidak ditemukan');
    }

    public function pdf(Transaksi $transaksi)
    {
        $transaksi_id = $transaksi->id;
        $pelanggan = PembayaranKredit::where('transaksi_id', $transaksi_id)->orderBy('tanggal_bayar','asc')->get();
        $total = $pelanggan->sum('bayar');
        $status = $transaksi->status;
        if($status == 0){
            $status = "Belum Lunas";
        }else{
            $status = "Sudah Lunas";
        }
        $sisa = $transaksi->sisa;
        $nama_barang = $transaksi->barang->nama;
        $harga_barang = $transaksi->barang->harga_jual_kredit;
        $nama_pelanggan = $transaksi->pelanggan->nama;
        $title = 'Laporan pembayaran kredit ';
        
        $pdf = PDF::loadView('admin.kredit.laporan.pdf.pelanggan', [
        'pelanggan' => $pelanggan,
        'total' => $total,
        'title' => $title,
        'status' => $status,
        'sisa' => $sisa,
        'nama_barang' => $nama_barang,
        'harga_barang' => $harga_barang,
        'nama_pelanggan' => $nama_pelanggan,
        'transaksi_id' => $transaksi_id,
        ])
        ->setPaper('a4', 'landscape');          
        return $pdf->stream('Laporan pembayaran kredit pelanggan.pdf');
    }
}
