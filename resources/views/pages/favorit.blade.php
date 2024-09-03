<x-layout-main>
    <x-layout-konten count="{{ $count ?? '' }}" title="Favorite">
        {{-- <x-slot:paginate>{{ $books->links() }}</x-slot:paginate> --}}
        <x-slot:bukuCard>

            @forelse($books as $book)
                <x-card-buku title="{{ $book->title }}" author="{{ $book->author->name }}"
                    genre="{{ $book->genres->pluck('name')->join(', ') }}"
                    createdAt="{{ $book->created_at->diffForHumans() }}" deskripsi="{{ $book->deskripsi }}">
                    <form action="/favorit/{{ $book->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class='w-[5rem] flex items-center justify-center  h-[2rem] bg-sky-500 transition ease-in hover:bg-sky-300 hover:ring-[4px] hover:ring-sky-500 rounded-md text-slate-50'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-bookmark-dash-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5M6 6a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z" />
                            </svg></button>
                    </form>
                </x-card-buku>
            @empty
                <h1 class="py-[1rem] font-semibold text-xl text-center">Hasil Tidak Ditemukan</h1>
            @endforelse

        </x-slot:bukuCard>

    </x-layout-konten>

    @if (session()->has('deleteFavorit'))
        <x-flash-message-failed>
            {{ session('deleteFavorit') }}
        </x-flash-message-failed>
    @endif

</x-layout-main>
