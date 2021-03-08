<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Pelanggan,Profile};
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class PelangganController extends Controller
{
    public function validatePelanggan()
    {
        return request()->validate([
            'nama' => 'required',
            // 'nik' => 'numeric',
            // 'no_hp' => 'numeric',
        ]);
    }

    public function index()
    {
        $title = 'Pelanggan';
        $total = Pelanggan::count();
        return view('admin.pelanggan.index', compact(
            'title',
            'total'
        ));
    }
    public function datatable()
    {
        $data_pelanggan = Pelanggan::query();
        return DataTables::of($data_pelanggan)
            ->addColumn('aksi', function ($data) {
                return view('admin.pelanggan._aksi', [
                    'data' => $data,
                    'url_delete' => route('admin.pelanggan.delete', $data->id),
                    'url_show' => route('admin.pelanggan.show', $data->id),
                    'url_edit' => route('admin.pelanggan.edit', $data->id)
                ]);
            })
            ->addColumn('status', function($data){
                if($data->status == 0){
                    return '<div class="badge badge-success">bisa</div>';
                }
                return '<div class="badge badge-danger">tidak bisa</div>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi','status'])
            ->toJson();
    }

    public function create()
    {
        $title = 'Form Tambah Pelanggan';
        return view('admin.pelanggan.create', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validatePelanggan();
        $nama = $request->nama;
        $nik = $request->nik;
        $no_hp = $request->no_hp;
        $jk = $request->jk;
        $alamat = $request->alamat;

        $pelanggan = new Pelanggan;
     
        if ($request->file('foto')) {
            $request->validate([
                'foto' => 'mimes:jpg,jpeg,png|file|image|max:4096'
            ]);
            $foto = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $upload = $foto->storeAs('/images/pelanggan/', $filename);
            $pelanggan->foto = $filename;
        }

        $pelanggan->nama = $nama;
        if(Pelanggan::where('slug', Str::slug($nama))->exists()){
        $pelanggan->slug = Str::slug($nama). '-' . $nik;
        }else{
        $pelanggan->slug = Str::slug($nama);
        }
        $pelanggan->nik = $nik;
        $pelanggan->no_hp = $no_hp;
        $pelanggan->alamat = $alamat;
        $pelanggan->jk = $jk;
        $pelanggan->status = 0;

        try {
            $pelanggan->save();
            return redirect()->route('admin.pelanggan')->with('sukses', 'Data pelanggan ' . $request->nama . ' berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function edit(Pelanggan $pelanggan)
    {
        $nama = $pelanggan->nama;
        $title = 'Edit Data ' . $nama;

        return view('admin.pelanggan.edit', compact('title', 'pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {   
        $request->validate([
            'nama' => 'required|min:3',
            // 'email' => 'required|email|unique:users'.$id,
            'nik' => 'required|unique:pelanggan,nik,'.$pelanggan->id,
            'no_hp' => 'numeric',
            'jk' => 'required',
        ]);
        if ($request->file('foto')) {
            $request->validate([
                'foto' => 'mimes:jpg,jpeg,png|file|image|max:4096'
            ]);
            $oldFile = $pelanggan->foto;
            $foto = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $deleteOldFile = Storage::delete('/images/pelanggan/' . $oldFile);
            $upload = $foto->storeAs('/images/pelanggan/', $filename);
            $pelanggan->update(['foto' => $filename]);
        }
        try {
            $pelanggan->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'no_hp' => $request->no_hp,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'status' => $pelanggan->status
            ]);
            return redirect()->route('admin.pelanggan')->with('sukses', 'Data pelanggan ' . $request->nama . ' berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function show(Pelanggan $pelanggan)
    {
        $title = $pelanggan->nama;
        return view('admin.pelanggan.show', compact('pelanggan', 'title'));
    }

    public function delete(Pelanggan $pelanggan)
    {
        try {
            $foto = $pelanggan->foto;
            Storage::delete('images/pelanggan/' . $foto);
            $pelanggan->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}