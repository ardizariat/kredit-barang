<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        return view('profile.index', compact(
            'user'
        ));
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('profile.edit', compact(
            'user'
        ));
    }

    public function update(Request $request, User $user)
    {
        $user_id = $user->id;
        $profile = $user->profile->id;
        $profile = Profile::find($profile);
        $request->validate([
            'username' => 'unique:users,username,' . $user_id,
            'email' => 'unique:users,email,' . $user_id,
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email
            ]);
            if ($request->file('foto')) {
                $request->validate([
                    'foto' => 'mimes:jpg,jpeg,png|max:3000|file|image'
                ]);
                $foto = $request->file('foto');
                $filename = $request->username . '_' . time() . '.' . $foto->getClientOriginalExtension();
                $oldFile = auth()->user()->foto;
                if ($oldFile) {
                    $deleteOldFile = Storage::delete('/images/user/' . $oldFile);
                }
                $upload = $foto->storeAs('/images/user/', $filename);
                $user->update(['foto' => $filename]);
            }
            $profile->update([
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'ig' => $request->ig,
                'fb' => $request->fb,
                'github' => $request->github,
                'website' => $request->website,
            ]);
            return redirect()->route('user.profile')->with('sukses-update-profile', 'Update profile ' . $request->username . ' berhasil');
        } catch (Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function editPassword()
    {
        return view('profile.update_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password' => 'required|confirmed|min:4',
        ]);
        $password_lama = auth()->user()->password;
        $input_password_lama = $request->password_lama;
        $input_password_baru = $request->password;
        
        if(Hash::check($input_password_lama, $password_lama)){
            auth()->user()->update([
                'password' => bcrypt($input_password_baru)
            ]);
            return redirect()->route('user.profile')->with('sukses-update-profile','Update password berhasil');
        }else{
            return back()->withErrors(['password_lama' => 'Password lama yang kamu masukkan salah']);
        }

    }
}
