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
            'genre' => 'required',
            'deskripsi' => 'max:400',
            'file_buku' => 'required|mimes:pdf|unique:buku|max:20480',
            'sampul_buku' => 'required|mimes:jpg,jpeg,webp,png|max:2048|unique:buku'
            // 'author_id' => $user->id,
        ]);
        // $validated['fileBuku'];
        // $validated['sampul_buku'];
        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_id'] = $user->id;

        $validated['deskripsi'] = $validated['deskripsi'] == null ? 'author tidak memberikan deskripsi' : $validated['deskripsi'];

        if ($request->hasFile('sampul_buku')) {

            $sampulBukuName = Str::uuid()->toString() . '.' . $request->sampul_buku->extension();
            // $request->sampulBuku->storeAs('sampulBuku', $sampulBukuName, 'public');
            $validated['sampul_buku'] = $sampulBukuName;
        }
        if ($request->hasFile('file_buku')) {
            $fileName = Str::uuid()->toString() . '.' . $request->file_buku->extension();
            $validated['file_buku'] = $fileName;
        }
        $validated['genre'] = json_encode($validated['genre']);
        // $validated['genre'] = implode(',', $validated['genre']);

        if (Buku::create($validated)) {
            return redirect('/koleksi')->with('successBuku', 'Berhasil menambahkan buku ' . $validated['title'] . ' !');
        }
        return redirect('/TambahBuku')->with('failedBuku', 'Gagal Menambakan Buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        if ($buku->author_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $genre = explode(',', $buku->genre);
        $genreKey = array_fill_keys($genre, true);
        return view('koleksi.editBuku', [
            'buku' => $buku,
            'genre'=>$genreKey
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
        if ($buku->update($validated)) {
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
            return redirect('/koleksi')->with('successDeleteBuku', 'Buku ' . $buku->title . ' berhasil dihapus');
        }
        return redirect('/EditBuku' . '/' . $buku->id)->with('failedDeleteBuku', 'Buku ' . $buku->title . ' berhasil dihapus');
        // dd('gagal');

    }
}


