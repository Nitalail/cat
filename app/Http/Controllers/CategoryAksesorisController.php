<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesorisCategory;

class CategoryAksesorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AksesorisCategory::all();
        return view('aksesoriscategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aksesoriscategory.create');
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
            'name' => 'required|max:255',
        ]);

        $category = AksesorisCategory::create($request->all());

        return redirect()->route('aksesoriscategory.index')
                        ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = AksesorisCategory::findOrFail($id);
        return view('aksesoriscategory.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = AksesorisCategory::findOrFail($id);
        return view('aksesoriscategory.edit', compact('category'));
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
            'name' => 'required',
        ]);

        $category = AksesorisCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('aksesoriscategory.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mengambil data kategori berdasarkan ID
        $category = AksesorisCategory::findOrFail($id);

        // Menghapus kategori
        $category->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('aksesoriscategory.index')->with('success', 'Kategori berhasil dihapus');
    }
}
