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
            'favoritBooks'=>$favoritBooks
            ]);
        }
        public function kategori()
        {
            $favorit = buku::where('author_id', Auth::id())->pluck('id')->toArray();

            $favoritBooks = Favorit::where('user_id', Auth::id())->pluck('buku_id')->toArray();
            $filter = [
                'search'=>request('search'),
                'genre'=>request('genre')
            ];
            $books = Buku::filter(request($filter))
                ->latest()
                ->paginate(5)
                ->withQueryString();
            return view('pages.kategori', [
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
                'books'=>Buku::where('author_id', $user->id)->filter(request(['search']))->latest()->paginate(5)->withQueryString()

            ]);
        }
}

