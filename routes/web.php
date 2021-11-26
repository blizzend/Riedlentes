<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkateboardController;
use App\Http\Controllers\SkateboardCategoryController;

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

Route::get('/', [SkateboardController::class, 'index']);
Route::get('/add-form', [SkateboardController::class, 'skateboardForm']);
Route::post('/storeSkateboard', [SkateboardController::class, 'storeSkateboard']);
Route::get('/ProductShow/{skateboard}', [SkateboardController::class, 'showProduct']);
Route::get('/ProductEdit/{skateboard}', [SkateboardController::class, 'editProduct']);
Route::patch('/ProductEdit/edit/{skateboard}', [SkateboardController::class, 'updateProduct']);
Route::get('/Product/{skateboard}/delete/ask', [SkateboardController::class, 'showDeletion']);
Route::get('/Product/{skateboard}/delete/confirm', [SkateboardController::class, 'deleteProduct']);
Route::get('/edit-category/{category}', [SkateboardCategoryController::class, 'editCategory']);
Route::patch('/edit-category/edit/{category}', [SkateboardCategoryController::class, 'updateCategory']);

Route::get('/categories', [SkateboardCategoryController::class, 'index'])->name('categories');
Route::get('/add-category', [SkateboardCategoryController::class, 'viewForm']);
Route::post('/storeCategories', [SkateboardCategoryController::class, 'storeCategories']);
Route::get('/categories/{category}/delete/ask', [SkateboardCategoryController::class, 'categoryDeletion']);
Route::get('/category/{category}/delete/confirm', [SkateboardCategoryController::class, 'deleteCategory']);
Route::get('/category/{category}', [SkateboardCategoryController::class, 'viewSkateboardbyCategory']);


Route::get('/dashboard', [SkateboardController::class, 'viewUserSkateboard'])->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
