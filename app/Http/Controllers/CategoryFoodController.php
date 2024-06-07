<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CateFood;

class CategoryFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
        public function index()
        {
            // Mengambil semua kategori makanan dari database
            $catFoods = CateFood::all();
    
            // Mengirim data kategori makanan ke tampilan
            return view('category_foods.index', compact('catFoods'));
        }
        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category_foods.create');
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
            'name' => 'required|string|max:255',
        ]);
    
        CateFood::create([
            'name' => $request->name,
        ]);
    
        return redirect()->route('catFoods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catFood = CateFood::findOrFail($id);
        return view('category_foods.edit', compact('catFood'));
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
            'name' => 'required|string|max:255',
        ]);
    
        $catFood = CateFood::findOrFail($id);
        $catFood->update([
            'name' => $request->name,
        ]);
    
        return redirect()->route('catFoods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catFood = CateFood::findOrFail($id);
    $catFood->delete();

    return redirect()->route('catFoods.index');
    }
}
