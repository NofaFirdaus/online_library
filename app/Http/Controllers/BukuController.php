<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Illuminate\Validation\Rule;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        'title' => 'required|unique:buku|max:255|min:4',
        'deskripsi' => 'max:400',
        'file_buku' => 'required|mimes:pdf|max:20480',
        'sampul_buku' => 'required|mimes:jpg,jpeg,webp,png|max:2048',
        'genre_id' => 'array|required', // pastikan genre_id adalah array
    ]);

    $validated['slug'] = Str::slug($validated['title']);
    $validated['author_id'] = $user->id;
    $validated['deskripsi'] = $validated['deskripsi'] ?: 'author tidak memberikan deskripsi';

    if ($request->hasFile('sampul_buku')) {
        $sampulBukuName = Str::uuid()->toString() . '.' . $request->sampul_buku->extension();
        $request->sampul_buku->storeAs('sampulBuku', $sampulBukuName, 'public');
        $validated['sampul_buku'] = $sampulBukuName;
    }

    if ($request->hasFile('file_buku')) {
        $fileName = Str::uuid()->toString() . '.' . $request->file_buku->extension();
        $request->file_buku->storeAs('fileBuku', $fileName, 'public');
        $validated['file_buku'] = $fileName;
    }

    $buku = buku::create($validated);
    if ($buku) {
        // Sinkronkan genre menggunakan tabel pivot
        $buku->genres()->sync($request->input('genre_id', []));
        return redirect('/koleksi')->with('successBuku', 'Berhasil menambahkan buku ' . $validated['title'] . ' !');
    }

    return redirect('/TambahBuku')->with('failedBuku', 'Gagal Menambahkan Buku');
}



    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        if ($buku->author_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $genres = $buku->genres->pluck('name');
    $genreKey = array_fill_keys($genres->toArray(), true);
        return view('koleksi.editBuku', [
            'buku' => $buku,
            'genre' =>$genreKey
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $buku)
    {
        if ($buku->author_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'title' => ['max:255','min:4',Rule::unique('buku', 'title')->ignore($buku->id)],
            'deskripsi' => 'max:400',
            'file_buku' => 'mimes:pdf|unique:buku|max:20480',
            'sampul_buku' => 'mimes:jpg,jpeg,webp,png|max:2048|unique:buku'
        ]);

        $validated['genre'] = json_encode( $request['genre']);
    $validated['slug'] = Str::slug($validated['title']);
     // Perbarui data buku
     $buku->update($validated);

     if ($buku) {
            $buku->genres()->sync($request->input('genre_id', []));
            return redirect('/koleksi')->with('successUpdateBuku', 'Buku berhasil diperbarui ' . $validated['title']);
        }
        return redirect('/EditBuku' . '/' . $buku->id)->with('gagalUpdateBuku', 'Buku gagal diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
{
    if ($buku->author_id !== Auth::id()) {
        redirect('/koleksi');
    }
    if ($buku->delete()) {
        $buku->genres()->detach();
        return redirect('/koleksi')->with('successDeleteBuku', 'Buku ' . $buku->title . ' berhasil dihapus');
    }
    return redirect('/EditBuku' . '/' . $buku->id)->with('failedDeleteBuku', 'Buku ' . $buku->title . ' berhasil dihapus');
    // dd('gagal');

}
}


