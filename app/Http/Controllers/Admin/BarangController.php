<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BarangExport;
use App\Http\Controllers\Controller;
use App\Models\{Barang,Kategori,Supplier,TransaksiKredit};
use Exception;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    public function validateBarang()
    {
        return request()->validate([
            'nama' => 'required|min:3',
            'merk' => 'required',
            'kategori_id' => 'required',
            'ram' => 'numeric',
            'tanggal_beli' => 'required',
            'deskripsi' => 'required',
            'memori' => 'numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual_cash' => 'required|numeric',
            'harga_jual_kredit' => 'required|numeric',
        ]);
    }

    public function index()
    {
        $title = 'Barang';
        $data_barang = Barang::latest()->get();
        $total_barang = Barang::count();
        $modal = $data_barang->sum('harga_beli');
        $terjual = Barang::where('status','=',1)->count();
        $tersedia = Barang::where('status','=',0)->count();
        return view('admin.barang.index', compact(
            'title',
            'data_barang',
            'total_barang',
            'modal',
            'terjual',
            'tersedia'
        ));
    }

    public function create()
    {
        $data_kategori = Kategori::all();
        $data_supplier = Supplier::all();
        $title = 'Tambah Data Barang';
        return view('admin.barang.create', compact(
            'data_kategori',
            'data_supplier',
            'title'
        ));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validateBarang();
        $barang = new Barang();
        if ($request->file('gambar')) {
            $request->validate([
                'gambar' => 'mimes:jpg,jpeg,png|file|image|max:4096'
            ]);
            $gambar = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('/images/barang/', $filename);
            $barang->gambar = $filename;
        }

        $harga_beli = $request->harga_beli;
        $harga_cash = $request->harga_jual_cash;
        $harga_kredit = $request->harga_jual_kredit;

        $barang->nama = $request->nama;
        $slug = Str::slug($request->nama);
        if (Barang::where('slug', $slug)->exists()) {
            $barang->slug = Str::slug($request->nama) . '-' . rand(1, 100000);
        } else {
            $barang->slug = $slug;
        }
        $barang->kategori_id = $request->kategori_id;
        $barang->supplier_id = $request->supplier_id;
        $barang->merk = $request->merk;
        $barang->tanggal_beli = $request->tanggal_beli;
        $barang->ram = $request->ram;
        $barang->memori = $request->memori;
        $barang->deskripsi = $request->deskripsi;
        $barang->status = 0;
        $barang->harga_beli = $harga_beli;
        $barang->harga_jual_cash = $harga_cash;
        $barang->harga_jual_kredit = $harga_kredit;
        $barang->laba_cash = $harga_cash - $harga_beli;
        $barang->laba_kredit = $harga_kredit - $harga_beli;
        try {
            $barang->save();
            return redirect()->route('admin.barang')->with('sukses', 'Data barang ' . $request->nama . ' berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function datatable()
    {
        $barang = Barang::latest()->get();
        return DataTables::of($barang)
            ->addColumn('aksi', function ($data) {
                return view('admin.barang._aksi', [
                    'barang' => $data,
                    'hapus' => route('admin.barang.delete', $data->id),
                    'detail' => route('admin.barang.show', $data->slug),
                    'edit' => route('admin.barang.edit', $data->id)
                ]);
            })
            ->addColumn('harga_beli', function ($data) {
                return rupiah($data->harga_beli);
            })
            ->addColumn('harga_jual_cash', function ($data) {
                return rupiah($data->harga_jual_cash);
            })
            ->addColumn('harga_jual_kredit', function ($data) {
                return rupiah($data->harga_jual_kredit);
            })
            ->addColumn('kategori', function ($data) {
                return $data->kategori->kategori;
            })
            ->addColumn('status', function ($data) {
                return $data->status == 0 ? '<div class="badge badge-success">Ready</div>' : '<div class="badge badge-primary">Terjual</div>';
            })
            ->addIndexColumn()
            ->rawColumns(['status','aksi', 'harga_beli', 'harga_jual_cash', 'harga_jual_kredit','kategori'])
            ->make(true);
    }

    public function edit(Barang $barang)
    {
        $nama = $barang->nama;
        $data_kategori = Kategori::all();
        $data_supplier = Supplier::all();

        $title = 'Edit data ' . $nama;
        return view('admin.barang.edit', compact('barang', 'title', 'data_kategori', 'data_supplier'));
    }

    public function update(Request $request, Barang $barang)
    {
        $this->validateBarang();

        if ($request->file('gambar')) {
            $oldFile = $barang->gambar;
            $gambar = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $deleteOldFile = Storage::delete('/images/barang/' . $oldFile);
            $upload = $gambar->storeAs('/images/barang/', $filename);
            $barang->update(['gambar' => $filename]);
        }
        $kredit = $request->harga_jual_kredit;
        $cash = $request->harga_jual_cash;
        $harga_beli = $request->harga_beli;
        $barangs = $request->nama;
        try {
            $barang->update([
                'nama' => $barangs,
                'merk' => $request->merk,
                'supplier_id' => $request->supplier_id,
                'kategori_id' => $request->kategori_id,
                'ram' => $request->ram,
                'memori' => $request->memori,
                'tanggal_beli' => $request->tanggal_beli,
                'deskripsi' => $request->deskripsi,
                'harga_beli' => $harga_beli,
                'harga_jual_kredit' => $kredit,
                'harga_jual_cash' => $cash,
                'laba_kredit' => $kredit - $harga_beli,
                'laba_cash' => $cash - $harga_beli,
                'status' => 0,
            ]);
            return redirect()->route('admin.barang')->with('sukses', 'Data barang ' . $barangs . ' berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function show(Barang $barang)
    {
        $title = 'Detail';
        $size = $barang->ram . ' GB ' . '-' . ' ' . $barang->memori . ' GB';
        return view('admin.barang.show', compact('barang', 'title', 'size'));
    }

    public function delete(Barang $barang)
    {
        try {
            $gambar = $barang->gambar;
            Storage::delete('images/barang/' . $gambar);
            $barang->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function exportPdf()
    {   
        $now = tanggal(date('Y-m-d'));
        $title = 'Laporan Data Barang '.$now;
        $data = Barang::latest()->get();
        $modal = $data->sum('harga_beli');
        $terjual = Barang::where('status','=',1)->count();
        $ready = Barang::where('status','=',0)->count();
        $total = Barang::count();
        $pdf = PDF::loadView('admin.barang.laporan.pdf.all', [
            'data' => $data,
            'title' => $title,
            'modal' => $modal,
            'terjual' => $terjual,
            'ready' => $ready,
            'total' => $total,
        ])
        ->setPaper('a4', 'landscape');          
        return $pdf->stream('Barang.pdf');
    }

    public function exportExcel()
    {
        $data = Barang::all();
        return Excel::download(new BarangExport($data), 'Barang.xlsx');
    }
}