<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Favorit;
use Auth;
use Illuminate\Http\Request;

class FavoritController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Dapatkan buku favorit pengguna
        $books = Auth::user()->favorites();

        // Tambahkan filter pencarian jika ada
        $search = request('search'); // Mengambil query pencarian dari request
        if ($search) {
            $books = $books->where('title', 'like', '%' . $search . '%');
        }

        $books = $books->get(); // Eksekusi query untuk mendapatkan hasil

        return view('pages.favorit', [
            'books' => $books,
            'count' => $books->count(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(buku $buku)
    {
        if ($buku->author_id === Auth::id()) {
            return redirect()->back();

        }
        // $favorite['user_id'] = Auth::id();
        auth()->user()->favorites()->attach($buku->id);
        return redirect()->back()->with('addFavorit',$buku->title . 'ditambahkan kefavorit' );
        // Favorit::create($favorite);
    }
    public function store(Request $request, buku $buku)
    {
        dd('j');

    }

    /**
     * Display the specified resource.
     */
    public function show(Favorit $favorit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorit $favorit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorit $favorit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
{
    $user = auth()->user();

    if ($user->favorites()->wherePivot('buku_id', $buku->id)->exists()) {
        $user->favorites()->detach($buku->id);
        return redirect()->back()->with('deleteFavorit', 'Buku telah dihapus dari favorit');
    } else {
        return redirect()->back()->with('errorFavorit', 'Buku tidak ditemukan di favorit');
    }
}

}
