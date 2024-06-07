<?php

use App\Http\Controllers\AccesosrisController;
use App\Http\Controllers\AksesosrisController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CateFoodController;
use App\Http\Controllers\CategoriesFoodsController;
use App\Http\Controllers\CategoryAksesorisController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryFoodController;
use App\Models\AksesorisCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::resource('categories', CategoryController::class);
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
// Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::resource('cats', CatController::class);
Route::get('/cats', [CatController::class, 'index'])->name('cats.index');
Route::get('/cats/{id}', [CatController::class, 'show'])->name('cats.show');
Route::get('/cats/create', [CatController::class, 'create'])->name('cats.create');
Route::get('/cats/{cat}/edit', [CatController::class, 'edit'])->name('cats.edit');
Route::put('/cats/{id}', [CatController::class, 'update'])->name('cats.update');




Route::resource('food', FoodController::class);
Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
Route::post('/food', [FoodController::class, 'store'])->name('food.store');
Route::get('/food/{id}/edit', [FoodController::class, 'show'])->name('food.edit');
Route::put('/food/{id}', [FoodController::class, 'update'])->name('food.update');
Route::delete('/food/{food}', [FoodController::class, 'destroy'])->name('food.destroy');
// Route::get('/category-foods/create', 'CategoryFoodController@create')->name('category-foods.create');
// Route::post('/catfoods', 'CatFoodsController@store')->name('catfoods.store');






// Route::resource('catFoods', CateFoodController::class);
// Route::put('catFoods/{id}/update', [CateFoodController::class, 'update'])->name('catFoods.update');

// Route::get('cat-foods', 'CatFoodController@index')->name('catFoods.index');
// Route::get('cat-foods/create', 'CatFoodController@create')->name('catFoods.create');
// Route::post('cat-foods', 'CatFoodController@store')->name('catFoods.store');
// Route::get('cat-foods/{catFood}/edit', 'CatFoodController@edit')->name('catFoods.edit');
// Route::put('cat-foods/{catFood}', 'CatFoodController@update')->name('catFoods.update');
// Route::delete('cat-foods/{catFood}', 'CatFoodController@destroy')->name('catFoods.destroy');




// Route::resource('/categoriesfoods',CategoryFoodController::class);


//route aksesoris
Route::resource('/aksesoris', AksesosrisController::class);
Route::get('/aksesoris/create', [AksesosrisController::class, 'create'])->name('aksesoris.create');
Route::get('/aksesoris/{id}/edit', [AksesosrisController::class, 'edit'])->name('aksesoris.edit');
Route::put('/aksesoris/{id}', [AksesosrisController::class, 'update'])->name('aksesoris.update');

//route kategori aksesoris
Route::resource('/aksesoriscategory', CategoryAksesorisController::class);
Route::get('/aksesoriscategory/{id}', [CategoryAksesorisController::class, 'show'])->name('aksesoriscategory.show');
Route::get('/aksesoriscategory/create', [CategoryAksesorisController::class, 'create'])->name('aksesoriscategory.create');
Route::get('/aksesoriscategory/{id}/edit', [CategoryAksesorisController::class, 'edit'])->name('aksesoriscategory.edit');
Route::post('/aksesoriscategories', [CategoryAksesorisController::class, 'store'])->name('categories.store');
Route::put('/aksesoriscategory/{id}', [CategoryAksesorisController::class, 'update'])->name('aksesoriscategory.update');
Route::delete('/aksesoriscategory/{id}', [CategoryAksesorisController::class, 'destroy'])->name('aksesoriscategory.destroy');



//route kategori food
Route::resource('/foodscategories', CategoriesFoodsController::class);
Route::get('/foodscategories/create', [CategoriesFoodsController::class, 'create'])->name('foodscategories.create');
Route::post('/foodscategories', [CategoriesFoodsController::class, 'store'])->name('foodscategories.store');
Route::put('/foodscategories/{id}', [CategoriesFoodsController::class, 'update'])->name('foodscategories.update');
Route::get('/foodscategories/{id}', [CategoriesFoodsController::class, 'show'])->name('foodscategories.show');
Route::get('/foodscategories/{foodscategories}', 'CategoriesFoodsController@show')->name('foodscategories.show');


