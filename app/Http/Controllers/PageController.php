<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use Illuminate\Support\Facades\Auth;
use App\Models\buku;
use App\Models\Favorit;
class PageController extends Controller
{
    public function dashboard(){
        $favorit = buku::where('author_id', Auth::id())->pluck('id')->toArray();

        $favoritBooks = Favorit::where('user_id', Auth::id())->pluck('buku_id')->toArray();

        return view('pages.dashboard',[
            'link'=>[
                'addBukuFavorit' => '/addBukuFavorit',
                'redirect'=>'kategori',
                'text'=>'Lihat Semuanya'
            ],
            'books'=>Buku::filter(request(['search']))->latest()->paginate(5)->withQueryString(),
            'favorit'=>$favorit,
            'favoritBooks'=>$favoritBooks,
            'pageName'=>'Dashboard'
            ]);
        }
        public function kategori(Request $request)
        {
            // Ambil data favorit dan favoritBooks sesuai dengan kebutuhan
            $favorit = buku::where('author_id', Auth::id())->pluck('id')->toArray();
            $favoritBooks = Favorit::where('user_id', Auth::id())->pluck('buku_id')->toArray();

            // Ambil data filter dari request
            $filters = [
                'search' => $request->input('search'),
                'genres' => $request->input('genre', [])
            ];
            $request->session()->put('selected_genres', $filters['genres']);

            // Query untuk filter dan pencarian
            $books = Buku::query()
                ->when($filters['search'], function ($query, $search) {
                    return $query->where('title', 'like', '%' . $search . '%');
                })
                ->when($filters['genres'], function ($query, $genres) {
                    return $query->whereHas('genres', function ($query) use ($genres) {
                        $query->whereIn('name', $genres);
                    });
                })
                ->latest()
                ->paginate(5)
                ->withQueryString();

            return view('pages.kategori', [
                'pageName'=>'Kategori',
                'addBukuFavorit' => '/addBukuFavorit',
                'books' => $books,
                'favorit' => $favorit,
                'favoritBooks' => $favoritBooks
            ]);
        }




    public function tambahBuku()
    {
        return view('koleksi.tambahBuku', []);
    }


    public function pengaturan()
    {
        return view('pengaturan.index', []);
    }
    public function editPengaturan()
    {
        return view('pengaturan.edit', []);
    }
    public function koleksi()
    {
        $user = Auth::user();
            return view('koleksi.koleksi', [
                'link' => [
                    'redirect' => 'TambahBuku',
                    'text' => 'Tambahkan Buku',
                ],
                'deleteBuku' => true,
                'count'=>Buku::where('author_id', $user->id)->count(),
                'books'=>Buku::where('author_id', $user->id)->filter(request(['search']))->latest()->paginate(5)->withQueryString(),
                'pageName'=>'Koleksi'

            ]);
        }
}

