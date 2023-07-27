<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin(){
        $users = User::all();
        $barang = Barang::all();
        $today = date('Y-m-d');

        $aktif = Barang::where('tanggal_berakhir', '>=', date('Y-m-d'));
        $non = Barang::where('tanggal_berakhir', '<=', date('Y-m-d'));

        $new = Barang::where('created_at', 'LIKE', '%'.$today.'%')->get();

        return view('admin.dasboard', compact('users', 'barang', 'aktif', 'non', 'new'));
    }
}
