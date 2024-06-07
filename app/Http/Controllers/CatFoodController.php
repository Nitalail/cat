<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatFood;

class CateFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catFoods = CatFood::all();
        return view('cat-food.index', compact('catFoods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cat-food.create');
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
            'image' => 'required|image|max:2048', // Limit the image file size to 2MB
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $catFood = CatFood::create($request->all());

        return redirect()->route('catFoods.index')
                        ->with('success', 'Cat Food created successfully.');
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
        $catFood = CatFood::findOrFail($id);
        return view('cat-food.edit', compact('catFood'));
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
            'image' => 'nullable|image|max:2048', // Limit the image file size to 2MB
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $catFood = CatFood::findOrFail($id);
        $catFood->update($request->all());

        return redirect()->route('catFoods.index')
                        ->with('success', 'Cat Food updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catFood = CatFood::findOrFail($id);
        $catFood->delete();

        return redirect()->route('catFoods.index')
                        ->with('success', 'Cat Food deleted successfully.');
    }
}
