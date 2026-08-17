<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Barang;

class KatalogController extends Controller
{
    public function index()
    {
        $barangs = Barang::orderBy('created_at', 'desc')->get();
        return view('guru.katalog.index', compact('barangs'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('guru.katalog.show', compact('barang'));
    }
}
