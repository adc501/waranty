<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Barang extends Model
{
    protected $tabel = 'barang';
    protected $fillable = ['barang_id', 'name', 'image', 'deskripsi', 'tanggal_mulai', 'tanggal_berakhir'];
    use HasFactory;
}
