<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Barang, Pelanggan, PembayaranKredit,Transaksi};
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BayarCicilanController extends Controller
{

    public function validateBayar()
    {
        return request()->validate([
            'transaksi_id' => 'required',
            'tanggal_bayar' => 'required',
            'bayar' => 'required|numeric',
        ]);
    }

    public function index()
    {   $title = "Bayar Cicilan";
        $data_pelanggan = Transaksi::where('status',0)->get();

        // Kode Transaksi
        $kode_unik = PembayaranKredit::count();
        if ($kode_unik == null) {
            $kode_unik = 1;
        } else {
            $kode_unik++;
        }
        $no_pembayaran = 'KRD' . 0 . $kode_unik . date('my');

        return view('admin.kredit.bayar', compact(
            'title',
            'data_pelanggan',
            'no_pembayaran'
        ));
    }

    public function pelanggan(Request $request)
    {
        $data = Transaksi::where('id', $request->id)->first();
        $id = $data->id;
        $pelanggan = $data->pelanggan->nama;
        $barang = $data->barang->nama;
        $harga_barang = rupiah($data->barang->harga_jual_kredit);
        $tanggal_beli = tanggal($data->tanggal_transaksi);
        $sisa = rupiah($data->sisa);
        $status = $data->status;
        if($status == 0){
            $status = "Belum Lunas";
        }else{
            $status = "Sudah Lunas";
        }
        return response()->json([
            'data' => $data,
            'id' => $id,
            'pelanggan' => $pelanggan,
            'barang' => $barang,
            'sisa' => $sisa,
            'status' => $status,
            'tanggal_beli' => $tanggal_beli,
            'harga_barang' => $harga_barang,
            ]);
    }

    public function store(Request $request)
    {   
        $this->validateBayar();
        $transaksi_id = $request->transaksi_id;
        $no_pembayaran = $request->no_pembayaran;
        $tanggal_bayar = $request->tanggal_bayar;
        $bayar = $request->bayar;
        $keterangan = $request->keterangan;
        
        // Sisa
        $sisa_lama = 0;
        $pembayaran_kredit = PembayaranKredit::where('transaksi_id',$transaksi_id)->get();
        foreach($pembayaran_kredit as $kredit){
            $sisa_lama = $kredit->sisa;
        }
        $sisa_baru = $sisa_lama - $bayar;
        $total_yang_sudah_dibayar = $pembayaran_kredit->sum('bayar') + $bayar;

        if($bayar > $sisa_lama){
            return redirect()->back()->with('gagal','Nominal yang anda masukan melebihi tagihan yang ada');
        }

        $cicilan = new PembayaranKredit;
        $cicilan->admin = auth()->user()->id;
        $cicilan->transaksi_id = $transaksi_id;
        $cicilan->no_pembayaran = $no_pembayaran;
        $cicilan->tanggal_bayar = $tanggal_bayar;
        $cicilan->bayar = $bayar;
        $cicilan->sisa = $sisa_baru;
        $cicilan->keterangan = $keterangan;
        if($sisa_baru == 0){
            $cicilan->status = 1;
        }else{
            $cicilan->status = 0;
        }
        try{
            $cicilan->save();

            // update status transaksi kredit
            $transaksi_kredit = Transaksi::find($transaksi_id);
            if($sisa_baru == 0){
                $transaksi_kredit->update([
                    'status' => 1,
                    'sisa' => $sisa_baru,
                    'dibayar' => $total_yang_sudah_dibayar,
                ]);

                // update status pelanggan
                $pelanggan_yang_beli = $transaksi_kredit->pelanggan->id;
                $pelanggan = Pelanggan::find($pelanggan_yang_beli);
                $pelanggan->update([
                    'status' => 0
                ]);
            }else{
                $transaksi_kredit->update([
                    'status' => 0,
                    'sisa' => $sisa_baru,
                    'dibayar' => $total_yang_sudah_dibayar,
                ]);
            }
            
            return redirect()->route('admin.pelanggan.kredit', $transaksi_id)->with('sukses', 'Pembayaran cicilan berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }

    }
}
