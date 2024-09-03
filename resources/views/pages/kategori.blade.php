<x-layout-main>
    <x-layout-konten title="Kategori">
        <x-slot:genre>
            <form action="">
                <div class="flex my-[0.6rem]   flex-wrap gap-[12px] items-center ">
                    <div>
                        <input hidden class="peer/aksi" id="aksi" type="checkbox" name="genre[]"
                            value="aksi"  {{ in_array('aksi', request('genre', [])) ? 'checked' : '' }}>
                        <label
                            class="select-none peer-checked/aksi:ring-sky-500 peer-checked/aksi:text-sky-500 peer-checked/aksi:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                            for="aksi">aksi</label>
                    </div>

                    <div>
                        <input hidden class="peer/fantasi" id="fantasi" type="checkbox" name="genre[]"
                            value="fantasi" {{ in_array('fantasi', request('genre', [])) ? 'checked' : '' }}>
                        <label
                            class="select-none peer-checked/fantasi:ring-sky-500 peer-checked/fantasi:text-sky-500 peer-checked/fantasi:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                            for="fantasi">fantasi</label>
                    </div>
                    <div>

                        <input hidden class="peer/romantis" id="romantis" type="checkbox" name="genre[]"
                            value="romantis" {{ in_array('romantis', request('genre', [])) ? 'checked' : '' }}>
                        <label
                            class="select-none peer-checked/romantis:ring-sky-500 peer-checked/romantis:text-sky-500 peer-checked/romantis:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                            for="romantis">romantis</label>
                    </div>
                    <div>

                        <input hidden class="peer/komedi" id="komedi" type="checkbox" name="genre[]"
                            value="komedi" {{ in_array('komedi', request('genre', [])) ? 'checked' : '' }}>
                        <label
                            class="select-none peer-checked/komedi:ring-sky-500 peer-checked/komedi:text-sky-500 peer-checked/komedi:ease-in ease-out transition ring-1  cursor-pointer   ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                            for="komedi">komedi</label>
                    </div>
                    <div>


                        <input hidden class="peer/drama" id="drama" type="checkbox" name="genre[]"
                            value="drama" {{ in_array('drama', request('genre', [])) ? 'checked' : '' }}>
                        <label
                            class=" peer-checked/drama:ring-sky-500 peer-checked/drama:text-sky-500 peer-checked/drama:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                            for="drama">drama</label>
                    </div>
                    <div>


                        <input hidden class="peer/horror" id="horror" type="checkbox" name="genre[]"
                            value="horror" {{ in_array('horror', request('genre', [])) ? 'checked' : '' }}>
                        <label
                            class=" peer-checked/horror:ring-sky-500 peer-checked/horror:text-sky-500 peer-checked/horror:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                            for="horror">horror</label>
                    </div>
                    <div>


                        <input hidden class="peer/misteri" id="misteri" type="checkbox" name="genre[]"
                            value="misteri" {{ in_array('misteri', request('genre', [])) ? 'checked' : '' }}>
                        <label
                            class=" peer-checked/misteri:ring-sky-500 peer-checked/misteri:text-sky-500 peer-checked/misteri:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                            for="misteri">misteri</label>
                    </div>
                    <div>


                        <input hidden class="peer/slice-of-life" id="slice-of-life" type="checkbox"
                            name="genre[]" value="slice of life" {{ in_array('slice of life', request('genre', [])) ? 'checked' : '' }}>
                        <label
                            class=" peer-checked/slice-of-life:ring-sky-500 peer-checked/slice-of-life:text-sky-500 peer-checked/slice-of-life:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                            for="slice-of-life">slice of life</label>
                    </div>
                </div>
                <button>tes</button>
            </form>
        </x-slot:genre>
        <x-slot:paginate>{{ $books->links() }}</x-slot:paginate>
            <x-slot:bukuCard>
            @forelse($books as $book)
                <x-card-buku
                title="{{$book->title}}"
                author="{{$book->author->name}}"
                idBuku="{{$book->id}}"
                genre="{{$book->genres->pluck('name')->join(', ')}}"                createdAt="{{$book->created_at->diffForHumans()}}"
                deskripsi="{{$book->deskripsi}}">
                @if (!in_array($book->id, $favorit))

                    @if (in_array($book->id, $favoritBooks))
                    <form action="/favorit/{{ $book->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class='w-[5rem] flex items-center justify-center  h-[2rem] bg-sky-500 transition ease-in hover:bg-sky-300 hover:ring-[4px] hover:ring-sky-500 rounded-md text-slate-50'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bookmark-dash-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5M6 6a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z"/>
                                  </svg></button>
                        </form>
                    @else
                        <form action="/favorit/{{ $book->id }}" method="POST">
                            @csrf
                            <button
                                class='w-[5rem] flex items-center justify-center  h-[2rem] bg-sky-500 transition ease-in hover:bg-sky-300 hover:ring-[4px] hover:ring-sky-500 rounded-md text-slate-50'><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-bookmark" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                                    </svg></button>
                                </form>
                                @endif
                                @endif
                </x-card-buku>
                @empty
                <h1 class="py-[1rem] font-semibold text-xl text-center">Hasil Tidak Ditemukan</h1>
                @endforelse

            </x-slot:bukuCard>
    </x-layout-konten>
    @if (session()->has('addFavorit'))
    <x-flash-message-valid>
        {{session('addFavorit')}}
    </x-flash-message-valid>
    @endif
    @if (session()->has('deleteFavorit'))
    <x-flash-message-failed>
        {{session('deleteFavorit')}}
    </x-flash-message-failed>
    @endif

</x-layout-main>
