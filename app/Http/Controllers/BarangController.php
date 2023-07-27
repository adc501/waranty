<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class BarangController extends Controller
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
        $datas = Barang::paginate(10);
        return view('admin.barang.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'name' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('image'), $fileName);

        $barang = new Barang;
 
        $barang->barang_id = $request->barang_id;
        $barang->name = $request->name;
        $barang->deskripsi = $request->deskripsi;
        $barang->tanggal_mulai = $request->tanggal_mulai;
        $barang->tanggal_berakhir = $request->tanggal_berakhir;
        $barang->image = $fileName;

        $barang->save();

        return redirect('/barang')->with('succsess', 'Data Berhasil di Tambah');
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
        $datas = Barang::find($id);

        return view('admin.barang.update', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->barang_id = $request->barang_id;
        $barang->name = $request->name;
        $barang->deskripsi = $request->deskripsi;
        $barang->tanggal_mulai = $request->tanggal_mulai;
        $barang->tanggal_berakhir = $request->tanggal_berakhir;


        if ($request->has('image')) {
            $path = 'image/';

            File::delete($path. $barang->image);

            $NewimageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('image'), $NewimageName);

            $barang->image = $NewimageName;
        }
        $barang->save();

        return redirect('/barang')->with('succsess', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        
        $path = 'image/';

        File::delete($path. $barang->image);

        $barang->delete();

        return redirect('/barang')->with('succsess', 'Data Berhasil di Hapus');
    }
}
