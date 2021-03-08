<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index()
    {
        $title = 'Supplier';
        return view('admin.supplier.index', compact('title'));
    }

    public function datatable()
    {
        $suppliers = Supplier::query();
        return DataTables::of($suppliers)
            ->addColumn('aksi', function ($data) {

                return view('admin.supplier._aksi', [
                    'nama' => $data->nama,
                    'id' => $data->id,
                    'no_hp' => $data->no_hp,
                    'aplikasi' => $data->aplikasi,
                    'alamat' => $data->alamat,
                    'hapus' => route('admin.supplier.delete', $data->id),
                    'edit' => route('admin.supplier.edit', $data->id),
                    'show' => route('admin.supplier.show', $data->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function show(Supplier $supplier)

    {
        $title = $supplier->nama;
        return view('admin.supplier.show', compact('supplier', 'title'));
    }

    public function store(Request $request)
    {
        $supplier = new Supplier;
        $supplier->nama = $request->nama;
        $supplier->aplikasi = $request->aplikasi;
        $supplier->no_hp = $request->no_hp;
        $supplier->alamat = $request->alamat;
        try {
            $supplier->save();
            return redirect()->back()->with('sukses', 'Supplier ' . $request->nama . ' berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}