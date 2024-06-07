<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Category;
use App\Models\AksesorisCategory;
use App\Models\CategoriesFoods;
use Illuminate\Http\Request;



class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id = null)
    {
        $cats = Cat::with('category')->get();
        return view('cat.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();


        return view('cat.create', compact('categories'));
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
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0|max:5',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $cat = new Cat();
        $cat->name = $validatedData['name'];
        $cat->description = $validatedData['description'];
        $cat->price = $validatedData['price'];
        $cat->rating = $validatedData['rating'];
        $cat->category_id = $validatedData['category_id'];
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/cats', $image_name);
            $cat->image = $image_name;
        }
    
        $cat->save();
    
        return redirect()->route('cats.index')->with('success', 'Cat created successfully.');
    }

    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Cat::findOrFail($id);
        return view('cat.show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Cat::findOrFail($id);
        $categories = Category::all();
        return view('cat.edit', compact('cat', 'categories'));
    
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
        $cat = Cat::findOrFail($id);
        

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:1|max:5',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);
    
        $cat->name = $validatedData['name'];
        $cat->description = $validatedData['description'];
        $cat->price = $validatedData['price'];
        $cat->rating = $validatedData['rating'];
        $cat->category_id = $validatedData['category_id'];
    
        if ($request->hasFile('image')) {
            // Delete old image if exists
            // if ($cat->image) {
            //     Storage::delete('public/cats/' . $cat->image);
            // }
    
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/cats', $image_name);
            $cat->image = $image_name;
        }
    

        $cat->update($validatedData);

        return redirect()->route('cats.index')->with('success', 'Cat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Cat::findOrFail($id);

        // Delete the associated image from storage
        // if ($cat->image) {
        //     Storage::delete('public/cats/' . $cat->image);
        // }

        $cat->delete();

        return redirect()->route('cats.index')->with('success', 'Cat deleted successfully.');
    }
}
