<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('product')->get();
        return view('pages.home', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'required'
        ], [
            'nama.required' => 'Nama produk tidak boleh kosong.',
            'harga.required' => 'Harga produk tidak boleh kosong.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok produk tidak boleh kosong.',
            'stok.integer' => 'Stok harus berupa angka.',
        ]);

        $created = Product::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return $created
            ? redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!')
            : redirect()->back()->with('error', 'Gagal menambahkan produk.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $produk = Product::find($id);

        return $produk
            ? view('pages.produk.show', compact('produk'))
            : redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $produk = Product::find($id);

        return $produk
            ? view('pages.produk.edit', compact('produk'))
            : redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'required'
        ], [
            'nama.required' => 'Nama produk tidak boleh kosong.',
            'harga.required' => 'Harga produk tidak boleh kosong.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok produk tidak boleh kosong.',
            'stok.integer' => 'Stok harus berupa angka.',
        ]);

        $produk = Product::find($id);

        if (!$produk) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }

        $updated = $produk->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return $updated
            ? redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!')
            : redirect()->back()->with('error', 'Gagal memperbarui produk.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Product::find($id);

        if (!$produk) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }

        $deleted = $produk->delete();

        return $deleted
            ? redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!')
            : redirect()->route('produk.index')->with('error', 'Gagal menghapus produk.');
    }
}
