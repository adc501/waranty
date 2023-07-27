<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::paginate(10);

        return view('admin.users.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
            'gender' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'pro_img' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->no_hp = $request->no_hp;
        $user->alamat= $request->alamat;

        if ($request->has('pro_img')) {
            $fileName = time().'.'.$request->pro_img->extension();
            $request->pro_img->move(public_path('pro_img'), $fileName);
            $user->pro_img= $fileName;
        }

        $user->save();

        return redirect('/users')->with('succsess', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = User::find($id);

        return view('admin.users.update', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->no_hp = $request->no_hp;
        $user->alamat= $request->alamat;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);

        }

        if ($request->has('pro_img')) {
            $path = 'pro_img/';

            File::delete($path. $user->pro_img);

            $NewimageName = time().'.'.$request->pro_img->extension();

            $request->pro_img->move(public_path('pro_img'), $NewimageName);

            $user->pro_img = $NewimageName;
        }
        $user->save();

        return redirect('/users')->with('succsess', 'Data Berhasil di Update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $path = 'pro_img/';

        File::delete($path. $user->pro_img);

        $user->delete();

        return redirect('/users')->with('succsess', 'Data Berhasil di Hapus');
    }
}
