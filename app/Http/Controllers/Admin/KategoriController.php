<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Kategori';
        return view('admin.kategori.index', compact(
            'title',
        ));
    }

    public function datatable()
    {
        $kategori = Kategori::latest()->get();
        return DataTables::of($kategori)
        ->addColumn('aksi', function($data){
            return view('admin.kategori._aksi',[
                'delete' => route('admin.kategori.delete', $data->id),
                'data' => $data
            ]);
        })
        ->addColumn('status', function ($data) {
            return $data->status == 0 ? '<div class="badge badge-danger">Tidak Aktif</div>' : '<div class="badge badge-success">Aktif</div>';
        })
        ->addIndexColumn()
            ->rawColumns(['aksi','status'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $kategori = new Kategori;
        $request->validate([
            'kategori' => 'required|unique:kategori',
            'status' => 'required'
        ]);
        $nama = $request->kategori;
        $kategori->kategori = $nama;
        $kategori->status = $request->status;
        try {
            $kategori->save();
            return redirect()->back()->with('sukses', 'Kategori ' . $nama . ' berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function delete(Kategori $kategori)
    {
        try {
            $kategori->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
