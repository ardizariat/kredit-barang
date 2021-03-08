<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {   
        $title = 'Users';
        $users = User::with('roles')->get();
        return view('admin.user.index', compact(
            'title',
            'users'
        ));
    }

    public function datatable()
    {
        $users = User::query();
        return DataTables::of($users)
        ->addColumn('aksi', function($data){
            return view('admin.user._aksi',[
                'aktifkan' => route('admin.user.aktifkan', $data->id),
                'status' => $data->status,
                'nama' => $data->name,
            ]);
        })
        ->addColumn('role', function(){
            $users = User::with('roles')->get();
            // $user = Auth::user();
            $user = null;
            foreach($users as $user){
                $user = $user->getRoleNames();
            }
            // return $user;
            return $user;
        })
        ->addColumn('status', function($data){
            if($data->status == true){
                return '<div class="badge badge-success">Aktif</div>';
            }else{
                return '<div class="badge badge-danger">Tidak Aktif</div>';
            }
        })
        ->rawColumns(['status','role'])
        ->addIndexColumn()
        ->make(true);
    }

    public function aktifkan(Request $request, $id)
    {   
        $user = User::findOrFail($id);
        $nama = $user->name;
        if($user->status == 0){
            $user->update(['status'=>1]);
            return back()->with('sukses','Update status user '. $nama .' berhasil'); 
        }
        if($user->status == 1){
            $user->update(['status'=>0]);
            return back()->with('sukses','Update status user '. $nama .' berhasil'); 
        }
       
    }
}
