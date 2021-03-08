<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\{Barang, Pelanggan, PembayaranCash, PembayaranKredit, Status, Transaksi};
use Exception;
use Illuminate\Http\Request;
use PDF;
use App\Exports\PembayaranKreditExport;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Builder\Trait_;
use Svg\Tag\Rect;
use DataTables;

class KreditController extends Controller
{

    public function datatable()
    {
        $transaksi_kredit = Transaksi::where('jenis_pembayaran','kredit')->get();
        return DataTables::of($transaksi_kredit)
            ->addColumn('status', function ($data) {
                return $data->status == 0 ? '<div class="badge badge-danger">Belum Lunas</div>' : '<div class="badge badge-success">Sudah Lunas</div>';
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
            ->addColumn('sisa', function($data){
                return rupiah($data->sisa);
            })
            ->addColumn('detail', function($data){
                return '<a data-toggle="tooltip" data-placement="top" title="Detail transaksi" href="'.route('admin.pelanggan.kredit',$data->id).'" class="text-decoration-none btn-sm btn-info"><i class="fas fa-info"></i> Detail</a>';
            })            
            ->addIndexColumn()
            ->rawColumns(['status','pelanggan','barang','tanggal_transaksi','sisa','detail'])
            ->make(true);
    }

    public function validationTransaksi()
    {
        return request()->validate([
            'pelanggan' => 'required',
            'barang' => 'required',
            'bayar' => 'required|numeric',
            'tanggal' => 'required',
        ]);
    }

    public function validationBayar()
    {
        return request()->validate([
            'bayar' => 'required|numeric',
            'tanggal_bayar' => 'required',
        ]);
    }

    public function index()
    {
        $title = 'Transaksi Kredit';

        $pelanggan_kredit = Transaksi::where('jenis_pembayaran','kredit')->get();
        $total_pelanggan_kredit = $pelanggan_kredit->count();

        $transaksi_kredit = PembayaranKredit::all();
        $total_pemasukan_kredit = $transaksi_kredit->sum('bayar');

        $belum_lunas = Transaksi::where('jenis_pembayaran', 'kredit')->where('status',0)->count();
        $lunas = Transaksi::where('jenis_pembayaran', 'kredit')->where('status',1)->count();
        
        return view('admin.kredit.index', compact(
            'title',
            'belum_lunas',
            'lunas',
            'total_pelanggan_kredit',
            'total_pemasukan_kredit'
        ));
    }

    public function create()
    {
        $title = 'Tambah Transaksi Kredit';
        $data_pelanggan = Pelanggan::where('status',false)->latest()->get();
        $data_barang = Barang::where('status', false)->latest()->get();

        // Kode Transaksi
        $kode_unik = PembayaranKredit::count();
        if ($kode_unik == null) {
            $kode_unik = 1;
        } else {
            $kode_unik++;
        }
        $no_pembayaran = 'KRD' . 0 . $kode_unik . date('my');

        return view('admin.kredit.create', compact(
            'title',
            'data_pelanggan',
            'data_barang',
            'no_pembayaran',
        ));
    }

    public function getPelanggan(Request $request)
    {
        $data = Pelanggan::where('id', $request->id)->first();
        $no_hp = $data->no_hp;
        $id = $data->id;
        $alamat = $data->alamat;
        $jk = $data->jk;
        $nik = $data->nik;
        return response()->json([
            'data' => $data,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'jk' => $jk,
            'nik' => $nik,
            'id' => $id,
            ]);
    }

    public function getBarang(Request $request)
    {
        $data = Barang::where('id', $request->id)->first();
        $id = $data->id;
        $harga = $data->harga_jual_kredit;
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
        $this->validationTransaksi();
        // dd($request->all());
        
        $transaksi_kredit = new Transaksi;

        // ID Pelanggan Kredit
        $kode_unik_pelanggan = Transaksi::where('jenis_pembayaran','kredit')->count();
        if ($kode_unik_pelanggan == null) {
            $kode_unik_pelanggan = 1;
        } else {
            $kode_unik_pelanggan++;
        }
        $transaksi_id = 'PKR' . 0 . $kode_unik_pelanggan . date('my');

        $pelanggan_id = $request->pelanggan;
        $barang_id = $request->barang;        
        $bayar = $request->bayar;
        $tanggal = $request->tanggal;
        $keterangan = $request->keterangan;
        $kode_transaksi = $request->kode_transaksi;
        $qty = 1;

        // Harga barang
        $harga_barang = Barang::find($barang_id);
        $harga_barang = $harga_barang->harga_jual_kredit;
        $total_harga = $harga_barang * $qty;

        // Sisa
        $sisa = $harga_barang - $bayar;

        $transaksi_kredit->id = $transaksi_id;
        $transaksi_kredit->admin = Auth::id();
        $transaksi_kredit->pelanggan_id = $pelanggan_id;
        $transaksi_kredit->barang_id = $barang_id;
        $transaksi_kredit->jenis_pembayaran = 'kredit';
        $transaksi_kredit->tanggal_transaksi = $tanggal;
        $transaksi_kredit->qty = $qty;
        $transaksi_kredit->dibayar = $bayar;
        $transaksi_kredit->total_harga = $total_harga;
        $transaksi_kredit->sisa = $sisa;
        $transaksi_kredit->status = 0;
        $transaksi_kredit->keterangan = $keterangan;
        try {
            $transaksi_kredit->save();
        } catch (Exception $e) {
            return redirect()->route('admin.transaksi.kredit.create')->with('gagal', $e->getMessage());
        }

        // Insert Pembayaran Kredit 
        $pembayaran_kredit = new PembayaranKredit;
        $pembayaran_kredit->admin = Auth::id();
        $pembayaran_kredit->transaksi_id = $transaksi_id;
        $pembayaran_kredit->no_pembayaran = $request->no_pembayaran;
        $pembayaran_kredit->tanggal_bayar = $tanggal;
        $pembayaran_kredit->bayar = $bayar;
        $pembayaran_kredit->sisa = $sisa;
        $pembayaran_kredit->keterangan = $keterangan;
        $pembayaran_kredit->status = 0;
        try {
            $pembayaran_kredit->save();

            // Update status barang
            $barang = Barang::find($barang_id);
            $barang->update(['status' => 1]);

            // Update status pelanggan
            $pelanggan = Pelanggan::find($pelanggan_id);
            $pelanggan->update(['status' => 1]);

            return redirect()->route('admin.pelanggan.kredit', $transaksi_id)->with('sukses', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('admin.transaksi.kredit.create')->with('gagal', $e->getMessage());
        }        
    }

    public function show(Transaksi $transaksi)
    {   
        $transaksi_id = $transaksi->id;
        $nama_pelanggan = $transaksi->pelanggan->nama;
        $slug_pelanggan = $transaksi->pelanggan->slug;
        $nama_barang = $transaksi->barang->nama;
        $harga_barang = $transaksi->barang->harga_jual_kredit;
        $slug_barang = $transaksi->barang->slug;

        $pembayaran_kredit = PembayaranKredit::with('user','transaksi')->where('transaksi_id', $transaksi_id)->orderBy('tanggal_bayar','asc')->get();
        $total_bayar = $pembayaran_kredit->sum('bayar');
        $sisa = 0;
        foreach ($pembayaran_kredit as $pelanggan) {
            $sisa = $pelanggan->sisa;
        }
        $status = $transaksi->status;
        if($status == 0){
            $status = 'Belum Lunas';
        }else{
            $status = 'Sudah Lunas';
        }

        // Kode transaksi
        $kode_unik = PembayaranKredit::count();
        if ($kode_unik == null) {
            $kode_unik = 1;
        } else {
            $kode_unik++;
        }
        $no_pembayaran = 'KRD' . 0 . $kode_unik . date('my');

        // Cek user
        if(auth()->user()->hasRole('super-admin')){            
            return view('admin.kredit.show', compact(
                'transaksi_id',
                'nama_pelanggan',
                'slug_pelanggan',
                'nama_barang',
                'harga_barang',
                'slug_barang',
                'pembayaran_kredit',
                'total_bayar',
                'sisa',
                'status',
                'no_pembayaran'
            ));
        }elseif(auth()->user()->id != $data_pelanggan->pelanggan->user_id){
            return abort(403,'Anda tidak mempunyai akses dihalaman ini.');
        }
        return view('admin.kredit.show', compact(
                'transaksi_id',
                'nama_pelanggan',
                'slug_pelanggan',
                'nama_barang',
                'harga_barang',
                'slug_barang',
                'pembayaran_kredit',
                'total_bayar',
                'sisa',
                'status',
                'no_pembayaran'
        ));
    }

    public function bayar(Request $request)
    {   
        $this->validationBayar();
        $transaksi_id = $request->transaksi_id;
        $no_pembayaran = $request->no_pembayaran;
        $tanggal_bayar = $request->tanggal_bayar;
        $bayar = $request->bayar;
        
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
           
            return redirect()->back()->with('sukses', 'Pembayaran cicilan berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function deleteTransaksi($id)
    {
        $pelanggan_kredit = Transaksi::find($id);
        try {
            $pelanggan_kredit->delete();
            return redirect()->back()->with('sukses', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function laporan(Request $request)
    {
        if ($request->awal && $request->akhir) {
            $request->validate([
                'awal' => 'required',
                'akhir' => 'required'
            ]);
            $awal = $request->awal;
            $akhir = $request->akhir;
            $laporan_kredit = PembayaranKredit::whereDate('tanggal_bayar', '>=', $awal)->whereDate('tanggal_bayar', '<=', $akhir)
                ->get();
            $title = 'Laporan Transaksi Kredit';
            $judul = 'Laporan Transaksi Kredit ' . tanggal($awal) . ' sampai ' . tanggal($akhir);
            $link = route('admin.transaksi.kredit.laporan.export.pdf');
            try {
                return view('admin.kredit.laporan', compact(
                    'title',
                    'laporan_kredit',
                    'judul',
                    'link'
                ));
            } catch (Exception $e) {
                return redirect()->back()->with('gagal', $e->getMessage());
            }
        }
        $laporan_kredit = PembayaranKredit::all();
        $link = route('admin.transaksi.kredit.laporan.export.pdf');
        $judul = 'Laporan Pembayaran Transaksi Kredit';
        $title = 'Laporan Transaksi Kredit';
        return view('admin.kredit.laporan', compact(
            'title',
            'laporan_kredit',
            'judul',
            'link'
        ));
    }

    public function filterLaporan()
    {
        $title = 'Export Laporan';
        $judul = 'Export Laporan';
        return view('admin.kredit.export_laporan_custom', compact(
            'title',
            'judul'
        ));
    }
}
