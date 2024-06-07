<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\CategoriesFoods;

class CategoriesFoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesFoods = CategoriesFoods::all();
        return view('foodscategories.index', compact('categoriesFoods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foodscategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('foodscategories', 'public');
        }

        $categoriesFood = CategoriesFoods::create([
            'name' => $validatedData['name'],
            'image' => $imagePath,
        ]);

        return redirect()->route('foodscategories.index')->with('success', 'Category Food created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil data kategori berdasarkan ID
        $category = CategoriesFoods::findOrFail($id);

        // Menampilkan view show.blade.php sambil melewatkan data kategori
        return view('foodscategories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoriesFoods::findOrFail($id);
        return view('foodscategories.edit', compact('category'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);
    
        $categoriesFood = CategoriesFoods::findOrFail($id);
    
        $imagePath = $categoriesFood->image;
        if ($request->hasFile('image')) {
            // if ($categoriesFood->image) {
            //     Storage::delete('public/' . $categoriesFood->image);
            // }
            // $imagePath = $request->file('image')->store('foodscategories', 'public');
        }
    
        $categoriesFood->update([
            'name' => $validatedData['name'],
            'image' => $imagePath,
        ]);
    
        return redirect()->route('foodscategories.index')->with('success', 'Category Food updated successfully.');
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
        $category = CategoriesFoods::findOrFail($id);

        // Menghapus kategori
        $category->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('foodscategories.index')->with('success', 'Kategori berhasil dihapus');
    }
}
