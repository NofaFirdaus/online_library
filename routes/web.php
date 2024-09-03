
<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('/', [LoginController::class,'authenticate']);
Route::get('/logout', [LoginController::class,'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);


//middleware auth
Route::get('/dashboard', [PageController::class,'dashboard'])->middleware('auth');
Route::get('/kategori', [PageController::class,'kategori'])->middleware('auth');
Route::get('/pengaturan',[PageController::class,'pengaturan'])->middleware('auth');

Route::get('/favorit', [FavoritController::class,'index'])->middleware('auth');

// Route::post('/dashboard/{buku:id}', [FavoritController::class,'store'])->middleware('auth');
// Route::post('/kategori/{buku:id}', [FavoritController::class,'store'])->middleware('auth');
Route::post('/favorit/{buku:id}', [FavoritController::class,'add'])->middleware('auth');
Route::delete('/favorit/{buku:id}', [FavoritController::class,'destroy'])->middleware('auth');

//put ==all update
//patch = single update

Route::get('/EditProfile',[PageController::class,'editPengaturan'])->middleware('auth');
Route::patch('/EditProfile',[RegisterController::class,'update'])->middleware('auth');

//Buku
Route::get('/koleksi', [PageController::class,'koleksi'])->middleware('auth');
Route::get('/TambahBuku', [PageController::class,'tambahBuku'])->middleware('auth');
Route::post('/TambahBuku', [BukuController::class,'store'])->middleware('auth');

Route::get('/EditBuku/{buku:slug}', [BukuController::class,'show'])->middleware('auth');
Route::patch('/EditBuku/{buku:slug}', [BukuController::class,'update'])->middleware('auth');

Route::delete('/DeleteBuku/{buku:slug}', [BukuController::class,'destroy'])->middleware('auth');

