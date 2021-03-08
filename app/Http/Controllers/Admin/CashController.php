<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\PembayaranCash;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use DataTables;
use Exception;

class CashController extends Controller
{
    public function index()
    {
        $title = 'Transaksi Tunai';     
        $total_transaksi = Transaksi::where('jenis_pembayaran','cash')->count();

        $pembayaran_cash = PembayaranCash::all();
        $total_pemasukan = $pembayaran_cash->sum('bayar');

        return view('admin.tunai.index', compact(
            'title',
            'total_transaksi',
            'total_pemasukan'
        ));
    }

    public function datatable()
    {
        $transaksi_tunai = Transaksi::where('jenis_pembayaran','cash')->get();
        return DataTables::of($transaksi_tunai)
            ->addColumn('detail', function($data){
                return view('admin.tunai._aksi', [
                    'data' => $data,
                    'cetak' => route('admin.transaksi.tunai.pelanggan.nota',$data->id),
                ]);
            })
            ->addColumn('status', function ($data) {
                return $data->status == 0 ? '<div class="badge badge-danger">Belum Dibayar</div>' : '<div class="badge badge-success">Sudah Dibayar</div>';
            })
            ->addColumn('pelanggan', function($data){
                return $data->pelanggan->nama;
            })
            ->addColumn('barang', function($data){
                return $data->barang->nama;
            })
            ->addColumn('tanggal_transaksi', function($data){
                return tanggal($data->tanggal_transaksi);
            })          
            ->addIndexColumn()
            ->rawColumns(['status','pelanggan','barang','tanggal_transaksi','detail'])
            ->make(true);
    }

    public function create()
    {
        $title = 'Tambah Transaksi Tunai';
        $daftar_pelanggan = Pelanggan::latest()->get();
        $daftar_barang = Barang::where('status', 0)->get();

        // Kode Transaksi
        $kode_unik = PembayaranCash::count();
        if ($kode_unik == null) {
            $kode_unik = 1;
        } else {
            $kode_unik++;
        }
        $no_pembayaran = 'CSH' . 0 . $kode_unik . date('my');

        return view('admin.tunai.create', compact(
            'title',
            'daftar_pelanggan',
            'daftar_barang',
            'no_pembayaran'
        ));
    }

    public function validationBayar()
    {
        return request()->validate([
            'bayar' => 'required|numeric',
            'tanggal' => 'required',
            'pelanggan_id' => 'required',
            'barang_id' => 'required',
        ]);
    }

    public function getBarang(Request $request)
    {
        $data = Barang::where('id', $request->id)->first();
        $id = $data->id;
        $harga = $data->harga_jual_cash;
        $ram = $data->ram;
        $memori = $data->memori;
        $merk = $data->merk;
        $gambar = $data->getGambarBarang();
        return response()->json([
            'data' => $data,
            'id' => $id,
            'harga' => $harga,
            'ram' => $ram,
            'memori' => $memori,
            'gambar' => $gambar,
            'merk' => $merk,
            ]);
    }

    public function store(Request $request)
    {
        $this->validationBayar();
        $pelanggan_id = $request->pelanggan_id;
        $barang_id = $request->barang_id;
        $bayar = $request->bayar;
        $tanggal = $request->tanggal;
        $keterangan = $request->keterangan;
        $no_pembayaran = $request->no_pembayaran;

        $barang = Barang::find($barang_id);
        $harga_barang = $barang->harga_jual_cash;
        $kekurangan = rupiah($harga_barang - $bayar);

        // ID Pelanggan Tunai
        $kode_unik_pelanggan = Transaksi::where('jenis_pembayaran','cash')->count();
        if ($kode_unik_pelanggan == null) {
            $kode_unik_pelanggan = 1;
        } else {
            $kode_unik_pelanggan++;
        }
        $transaksi_id = 'PCS' . 0 . $kode_unik_pelanggan . date('my');

        if($bayar < $harga_barang){
            return redirect()->route('admin.transaksi.tunai.create')->with('gagal','Nominal yang anda masukan kurang '.$kekurangan.' harap masukan sesuai dengan harga barang yang tertera didalam form');
        }

        $transaksi_cash = new Transaksi();
        $transaksi_cash->id = $transaksi_id;
        $transaksi_cash->admin = auth()->user()->id;
        $transaksi_cash->pelanggan_id = $pelanggan_id;
        $transaksi_cash->barang_id = $barang_id;
        $transaksi_cash->jenis_pembayaran = 'cash';
        $transaksi_cash->tanggal_transaksi = $tanggal;
        $transaksi_cash->qty = 1;
        $transaksi_cash->total_harga = $harga_barang;
        $transaksi_cash->dibayar = $harga_barang;
        $transaksi_cash->keterangan = $keterangan;
        $transaksi_cash->status = 1;
        $transaksi_cash->sisa = 0;

        try{
            $transaksi_cash->save();
        }catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }

        $pembayaran_cash = new PembayaranCash();
        $pembayaran_cash->admin = auth()->user()->id;
        $pembayaran_cash->transaksi_id = $transaksi_id;
        $pembayaran_cash->no_pembayaran = $no_pembayaran;
        $pembayaran_cash->tanggal_bayar = $tanggal;
        $pembayaran_cash->bayar = $harga_barang;
        $pembayaran_cash->keterangan = $keterangan;
        $pembayaran_cash->status = 1;

        $kembalian = rupiah($bayar - $harga_barang);
        
        try{
            $pembayaran_cash->save();
            $barang->update(['status' => 1]);
            return redirect()->route('admin.transaksi.tunai')->with('sukses-tunai','Transaksi berhasil ditambahkan. Kembalian anda '. $kembalian);
        }catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }

    }
}
