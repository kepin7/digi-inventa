<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Barang;

class KatalogController extends Controller
{
    public function index()
    {
        $barangs = Barang::orderBy('created_at', 'desc')->get();
        return view('guest.katalog.index', compact('barangs'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('guest.katalog.show', compact('barang'));
    }
}
