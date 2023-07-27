<?php

namespace App\Http\Controllers;
use App\Models\Barang;

use Illuminate\Http\Request;

class CekController extends Controller
{
    public function index(){

        return view('cekData.search');
    }

    public function search(Request $request){
        $q = $request->input('src');
        $datas = Barang::where('barang_id', $q)->first();

        if ($datas) {
            return view('cekData.hasil', compact('datas'));
        } else {
            return view('cekData.search')->with('error', 'Data tidak ditemukan');
        }
    }
}
