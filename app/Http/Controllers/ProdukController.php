<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan Model Produk di-use
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Tampilkan semua produk.
     * Ini untuk halaman index.blade.php
     */
    public function index()
    {
        $produks = Produk::latest()->get(); // Ambil semua produk, urutkan terbaru
        return view('produk.index', compact('produks'));
    }

    /**
     * Tampilkan form tambah data.
     * Ini untuk halaman create.blade.php
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Simpan data baru dari form create.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        // Buat produk baru
        Produk::create($request->all());

        // Redirect kembali ke index DENGAN PESAN SUKSES
        return redirect()->route('produk.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Tampilkan form untuk edit data.
     * Ini untuk halaman edit.blade.php
     */
    public function edit(Produk $produk) // Otomatis mencari produk berdasarkan ID
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update data di database dari form edit.
     */
    public function update(Request $request, Produk $produk)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        // Update produk yang ada
        $produk->update($request->all());

        // Redirect kembali ke index DENGAN PESAN SUKSES
        return redirect()->route('produk.index')
                         ->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Hapus data dari database.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        // Redirect kembali ke index DENGAN PESAN SUKSES
        return redirect()->route('produk.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}