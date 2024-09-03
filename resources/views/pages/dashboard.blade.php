<x-layout-main pageName="{{$pageName}}">
    <x-layout-konten title="Rekomendasi">
        <x-slot:paginate>{{ $books->links() }}</x-slot:paginate>
        <x-slot:linkRedirect>{{ $link['redirect'] }}</x-slot:linkRedirect>
        <x-slot:linkText>{{ $link['text'] }}</x-slot:linkText>
        <x-slot:bukuCard>
            @forelse($books as $book)
                <x-card-buku title="{{ $book->title }}" idBuku="{{ $book->id }}" author="{{ $book->author->name }}"
                    genre="{{
                        $book->genres->pluck('name')->join(', ')
                    }}" createdAt="{{ $book->created_at->diffForHumans() }}"
                    deskripsi="{{ $book->deskripsi }}">
                    @if (!in_array($book->id, $favorit))
                        @if (in_array($book->id, $favoritBooks))
                            <form action="/favorit/{{ $book->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class='w-[5rem] flex items-center justify-center  h-[2rem] bg-sky-500 transition ease-in hover:bg-sky-300 hover:ring-[4px] hover:ring-sky-500 rounded-md text-slate-50'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        fill="currentColor" class="bi bi-bookmark-dash-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5M6 6a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z" />
                                    </svg></button>
                            </form>
                        @else
                            <form action="/favorit/{{ $book->id }}" method="POST">
                                @csrf
                                <button
                                    class='w-[5rem] flex items-center justify-center  h-[2rem] bg-sky-500 transition ease-in hover:bg-sky-300 hover:ring-[4px] hover:ring-sky-500 rounded-md text-slate-50'><svg
                                        xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
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
            {{ session('addFavorit') }}
        </x-flash-message-valid>
    @endif
    @if (session()->has('deleteFavorit'))
        <x-flash-message-failed>
            {{ session('deleteFavorit') }}
        </x-flash-message-failed>
    @endif
    @if (session()->has('errorFavorit'))
        <x-flash-message-failed>
            {{ session('errorFavorit') }}
        </x-flash-message-failed>
    @endif
</x-layout-main>
