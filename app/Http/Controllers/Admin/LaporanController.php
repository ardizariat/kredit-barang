<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{PembayaranCash,PembayaranKredit,Transaksi};
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\{PembayaranCashExport,PembayaranKreditExport, SemuaTransaksiExport};

class LaporanController extends Controller
{
    public function transaksiCash()
    {   
        $title = 'Laporan Penjualan Tunai';
        return view('admin.tunai.laporan', compact(
            'title'
        ));
    }

    public function transaksiCashExport(Request $request)
    {
        $request->validate([
            'tipe' => 'required'
        ]);
        $dari = $request->dari;
        $sampai = $request->sampai;
        $tipe = $request->tipe;

        $title = 'Laporan transaksi tunai periode '. tanggal($dari) . ' sampai ' . tanggal($sampai);
        $data = PembayaranCash::whereBetween('tanggal_bayar',[$dari, $sampai])
        ->orderBy('tanggal_bayar','asc')
        ->get();
        $total = $data->sum('bayar');

        if($tipe == 'pdf'){
            $pdf = PDF::loadView('admin.tunai.laporan.pdf.all', [
                'data' => $data,
                'title' => $title,
                'total' => $total,
            ])
            ->setPaper('a4', 'landscape');          
            return $pdf->stream('Laporan penjualan tunai.pdf');
        }

        if($tipe == 'excel'){
            return Excel::download(new PembayaranCashExport($data), 'Laporan penjualan tunai.xlsx');
        }
    }

    public function transaksiKredit()
    {   
        $title = 'Laporan Penjualan Kredit';
        return view('admin.kredit.laporan', compact(
            'title'
        ));
    }

    public function transaksiKreditExport(Request $request)
    {
        $request->validate([
            'tipe' => 'required'
        ]);
        $dari = $request->dari;
        $sampai = $request->sampai;
        $tipe = $request->tipe;

        $title = 'Laporan transaksi kredit periode '. tanggal($dari) . ' sampai ' . tanggal($sampai);
        $data = PembayaranKredit::whereBetween('tanggal_bayar',[$dari, $sampai])
        ->orderBy('tanggal_bayar','asc')
        ->get();
        $total = $data->sum('bayar');

        if($tipe == 'pdf'){
            $pdf = PDF::loadView('admin.kredit.laporan.pdf.all', [
                'data' => $data,
                'title' => $title,
                'total' => $total,
            ])
            ->setPaper('a4', 'landscape');          
            return $pdf->stream('Laporan penjualan kredit.pdf');
        }

        if($tipe == 'excel'){
            return Excel::download(new PembayaranKreditExport($data), 'Laporan penjualan kredit.xlsx');
        }
    }

    public function transaksi()
    {   
        $title = 'Laporan Semua Transaksi';
        return view('admin.laporan.index', compact(
            'title'
        ));
    }

    public function transaksiExport(Request $request)
    {
        $request->validate([
            'tipe' => 'required'
        ]);
        $dari = $request->dari;
        $sampai = $request->sampai;
        $tipe = $request->tipe;

        $title = 'Laporan transaksi periode '. tanggal($dari) . ' sampai ' . tanggal($sampai);
        $data_cash = PembayaranCash::whereBetween('tanggal_bayar',[$dari, $sampai])
        ->orderBy('tanggal_bayar','asc')
        ->get();
        $total_cash = $data_cash->sum('bayar');

        $data_kredit = PembayaranKredit::whereBetween('tanggal_bayar',[$dari, $sampai])
        ->orderBy('tanggal_bayar','asc')
        ->get();
        $total_kredit = $data_kredit->sum('bayar');

        $total = $total_kredit + $total_cash;


        if($tipe == 'pdf'){
            $pdf = PDF::loadView('admin.laporan.pdf.all', [
                'data_cash' => $data_cash,
                'data_kredit' => $data_kredit,
                'title' => $title,
                'total' => $total,
            ])
            ->setPaper('a4', 'landscape');          
            return $pdf->stream('Laporan semua penjualan.pdf');
        }

        
        if($tipe == 'excel'){
            $data = [$data_cash, $data_kredit];
            return Excel::download(new SemuaTransaksiExport($data), 'Laporan penjualan.xlsx');
        }
    }

    public function transaksiKreditPelangganExport(Transaksi $transaksi)
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
        $title = 'Laporan pembayaran kredit '.$nama_pelanggan;
        
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

    public function transaksiKreditNotaExport($id)
    {
        $nota = PembayaranKredit::find($id);
        $status = $nota->status;
        if($status == 0){
            $status = "Belum Lunas";
        }else{
            $status = "Sudah Lunas";
        }
        $sisa = $nota->sisa;
        $nama_barang = $nota->transaksi->barang->nama;
        $harga_barang = $nota->transaksi->barang->harga_jual_kredit;
        $nama_pelanggan = $nota->transaksi->pelanggan->nama;
        $title = 'Nota pembayaran '.$nama_pelanggan;
        
        $pdf = PDF::loadView('admin.kredit.laporan.pdf.nota', [
        'nota' => $nota,
        'title' => $title,
        'status' => $status,
        'sisa' => $sisa,
        'nama_barang' => $nama_barang,
        'harga_barang' => $harga_barang,
        'nama_pelanggan' => $nama_pelanggan,
        ])
        ->setPaper('a4', 'landscape');          
        return $pdf->stream('Nota pembayaran kredit.pdf');
        
    }

    public function transaksiKreditPdf()
    {
        $title = 'Laporan pelanggan kredit';
        $daftar_pelanggan = Transaksi::where('jenis_pembayaran','kredit')->get();
        $total_transaksi = $daftar_pelanggan->sum('dibayar');
        $total_sisa = $daftar_pelanggan->sum('sisa');

        $pdf = PDF::loadView('admin.kredit.laporan.pdf.transaksi', [
            'title' => $title,
            'total_transaksi' => $total_transaksi,
            'total_sisa' => $total_sisa,
            'daftar_pelanggan' => $daftar_pelanggan,
        ])
        ->setPaper('a4', 'landscape');          
        return $pdf->stream('Laporan pelanggan kredit.pdf');
    }

    public function transaksiTunaiPelangganExport()
    {
        $title = 'Laporan transaksi tunai';
        $daftar_pelanggan = Transaksi::where('jenis_pembayaran','cash')->get();
        $total = $daftar_pelanggan->sum('dibayar');

        $pdf = PDF::loadView('admin.tunai.laporan.pdf.transaksi', [
            'title' => $title,
            'total' => $total,
            'daftar_pelanggan' => $daftar_pelanggan,
        ])
        ->setPaper('a4', 'landscape');          
        return $pdf->stream('Laporan transaksi tunai.pdf');
    }

    public function transaksiTunaiPelangganNota($id)
    {
        $title = 'Nota pembayaran';
        $transaksi = PembayaranCash::where('transaksi_id',$id)->get();
        $pdf = PDF::loadView('admin.tunai.laporan.pdf.nota', [
            'title' => $title,
            'transaksi' => $transaksi,
        ])
        ->setPaper('a4', 'landscape');          
        return $pdf->stream('Laporan transaksi tunai.pdf');
    }

}
