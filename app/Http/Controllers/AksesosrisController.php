<?php

namespace App\Http\Controllers;

use App\Models\AksesorisCategory;
use App\Models\Aksesosris;
use Illuminate\Http\Request;

class AksesosrisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'hai';
        $aksesosris = Aksesosris::all();
        return view('aksesosris.index', compact('aksesosris'));
    }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
    public function create()
    {
        $aksesoriscategories = AksesorisCategory::all();
        return view('aksesosris.create', compact('aksesoriscategories'));
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
            'image' => 'required|image|max:2048',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0|max:5',
            'aksesoris_category_id' => 'required|exists:aksesoris_categories,id',
        ]);

        $aksesoris = Aksesosris::create($request->all());

        return redirect()->route('aksesoris.index')
                        ->with('success', 'Accessory created successfully.');
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
        $aksesoris = $category->aksesoris; // Ambil daftar aksesori yang terkait dengan kategori
        return view('aksesoriscategory.show', compact('category', 'accessories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aksesosris = Aksesosris::findOrFail($id);
        $aksesoriscategories = AksesorisCategory::all();
        return view('aksesosris.edit', compact('aksesosris', 'aksesoriscategories'));
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
            'name' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0|max:5',
            'aksesoris_category_id' => 'required|exists:aksesoris_categories,id',
        ]);
    
        $aksesosris = Aksesosris::findOrFail($id);
        $aksesosris->update($request->all());
    
        return redirect()->route('aksesosris.index')
                         ->with('success', 'Accessory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aksesosris = Aksesosris::findOrFail($id);
        $aksesosris->delete();

        return redirect()->route('aksesosris.index')
                        ->with('success', 'Accessory deleted successfully.');
    }
}
