<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatFood;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'hii';
        $catFoods = CatFood::all();
        return view('catfoods.index', compact('catFoods'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
         // Mempersiapkan data yang diperlukan untuk view
    $categories = CatFood::all();

    // Menampilkan view create.blade.php dengan data kategori
    return view('catfoods.create', compact('categories'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048', // Opsional, maksimal 2MB
        ]);

        // Simpan data makanan kucing baru
        $catFood = new CatFood();
        $catFood->name = $validatedData['name'];
        $catFood->description = $validatedData['description'];
        $catFood->price = $validatedData['price'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $catFood->image = $imageName;
        }

        $catFood->save();

        // Redirect ke halaman yang sesuai (misalnya daftar makanan kucing)
        return redirect()->route('food.index')->with('success', 'Makanan kucing baru berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Ambil data cat food berdasarkan id
        $catFood = CatFood::findOrFail($id);

        // Tampilkan view edit dengan data cat food
        return view('food.edit', compact('catFood'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catFood = CatFood::find($id);

        return view('catfoods.edit', compact('catFood'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'image|max:2048',
        ]);
    
        $catFood = CatFood::findOrFail($id);
    
        $catFood->name = $request->input('name');
        $catFood->description = $request->input('description');
        $catFood->price = $request->input('price');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/cat-foods', $imageName);
            $catFood->image = 'cat-foods/' . $imageName;
        }
    
        $catFood->save();
    
        return redirect()->route('catFoods.index')->with('success', 'Cat food updated successfully.');
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

    // Hapus file gambar yang terkait jika ada
    if ($catFood->image) {
        $imagePath = storage_path('app/public/' . $catFood->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Hapus data makanan kucing dari database
    $catFood->delete();

    return redirect()->route('food.index')->with('success', 'Cat food deleted successfully.');
    }
}
