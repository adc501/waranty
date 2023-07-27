<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(User $user){

        $datas = Auth::user();
        return view('admin.profile', compact('datas'));
    }

    public function update(Request $request, string $id){
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->no_hp = $request->no_hp;
        $user->alamat= $request->alamat;

        if ($request->has('pro_img')) {
            $path = 'pro_img/';

            File::delete($path. $user->pro_img);

            $NewimageName = time().'.'.$request->pro_img->extension();

            $request->pro_img->move(public_path('pro_img'), $NewimageName);

            $user->pro_img = $NewimageName;
        }
        $user->save();

        return redirect('/profile')->with('succsess', 'Data Berhasil di Update');

    }
}
